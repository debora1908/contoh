<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Menampilkan Dashboard beserta data terpisah per tipe kamar
    public function index()
    {// 1. MENGAMBIL DATA LOG TRANSAKSI PER TIPE KAMAR (KODE LAMA ANDA)
        $standardBookings = Booking::where('pilihan_kamar', 'standard')->get();
        $deluxeBookings   = Booking::where('pilihan_kamar', 'deluxe')->get();
        $suiteBookings    = Booking::where('pilihan_kamar', 'suite')->get();

        // 2. LOGIKA MENGHITUNG STATISTIK OKUPANSI SECARA DINAMIS
        $totalInventory = 150; // Kapasitas maksimal hotel
        
        // Menghitung jumlah baris data di database untuk tahu kamar yang terisi
        $kamarTerisi    = Booking::count(); 
        
        // Sisa kamar tersedia adalah total inventory dikurangi yang terisi
        $kamarTersedia  = $totalInventory - $kamarTerisi;

        // 3. LOGIKA MENGHITUNG ESTIMASI PENDAPATAN DARI BOOKING YANG LUNAS
        $totalPendapatan = 0;
        $semuaBookingLunas = Booking::where('status_bayar', 'Lunas')->get();

        foreach ($semuaBookingLunas as $booking) {
            // Hitung durasi malam menginap
            $checkIn = \Carbon\Carbon::parse($booking->check_in);
            $checkOut = \Carbon\Carbon::parse($booking->check_out);
            $durasiMalam = $checkIn->diffInDays($checkOut);
            
            if ($durasiMalam == 0) { $durasiMalam = 1; } // Minimal hitung 1 malam

            // Simulasi harga kamar per malam
            $hargaPerMalam = match($booking->pilihan_kamar) {
                'standard' => 300000,
                'deluxe'   => 500000,
                'suite'    => 1000000,
                default    => 0
            };

            // Akumulasikan (Harga Kamar x Durasi) + Kode Unik Transfer
            $totalPendapatan += ($hargaPerMalam * $durasiMalam) + ($booking->kode_unik ?? 0);
        }

        // Format tampilan rupiah ringkas (Contoh: IDR 42.5M)
        $pendapatanFormatted = 'IDR ' . number_format($totalPendapatan / 1000000, 1, ',', '.') . 'M';
        if ($totalPendapatan < 1000000) {
            $pendapatanFormatted = 'IDR ' . number_format($totalPendapatan, 0, ',', '.');
        }

        // 4. MENGIRIM DATA LAMA DAN DATA STATISTIK BARU KE VIEW DASHBOARD
        return view('admin.dashboard', compact(
            'standardBookings', 
            'deluxeBookings', 
            'suiteBookings',
            'totalInventory',
            'kamarTerisi',
            'kamarTersedia',
            'pendapatanFormatted'
        ));
    }

    // Memproses input manual dari Form Check-In
    public function store(Request $request)
    {
        // 1. Validasi Input Data
        $request->validate([
            'nama_tamu' => 'required|string|max:255',
            'email_tamu' => 'required|email',
            'pilihan_kamar' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);


        // 2. Logika acak nomor kamar otomatis sebagai contoh simulasi HMS
        $randomRoom = match($request->pilihan_kamar) {
            'standard' => 'Room #' . rand(101, 199),
            'deluxe'   => 'Room #' . rand(201, 299),
            'suite'    => 'Suite #' . rand(1, 50),
        };
        // Kode ini nanti otomatis ditambahkan jika tamu memilih metode "Transfer"
        
       $kodeUnik = match($request->pilihan_kamar) {
            'standard' => 50,   // Menghasilkan akhiran 050
            'deluxe'   => 100,  // Menghasilkan akhiran 100
            'suite'    => 150,  // Menghasilkan akhiran 150
            default    => 0
       };
        // 3. Simpan data baru ke database table bookings
        $booking = Booking::create([
            'nama_tamu' => $request->nama_tamu,
            'email_tamu' => $request->email_tamu,
            'pilihan_kamar' => $request->pilihan_kamar,
            'nomor_kamar' => $randomRoom,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'status_bayar' => 'Pending' ,
            'kode_unik' => $kodeUnik,      
            'metode_bayar' => null
        ]);
        
        /* ❌ HAPUS BAGIAN INI KARENA MEMBUAT CODINGAN DOUBLE / DUPLIKAT:
           
           // 1. Ganti bagian akhir fungsi store Anda yang lama
           public function store(Request $request)
           {
               $booking = Booking::create([ ... ]);
        */

        //  PERBAIKI DI SINI: Cukup panggil return redirect langsung ke halaman pembayaran
        return redirect()->route('booking.pembayaran', $booking->id);
    }

    //  TAMBAHKAN FUNGSI BARU INI (Halaman Pembayaran)
    public function pembayaran($id)
    {
        $booking = Booking::findOrFail($id);
        return view('reservasi.pembayaran', compact('booking'));
    }

    //  TAMBAHKAN FUNGSI BARU INI (Tombol "Saya Sudah Transfer")
    public function konfirmasi(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        
        // Validasi input untuk memastikan metode pembayaran dipilih
        $request->validate([
            'metode_bayar' => 'required|in:Cash,Transfer'
        ]);

        // Update status menjadi Lunas dan simpan metode pembayaran yang dipilih tamu
        $booking->update([
            'status_bayar' => 'Lunas',
            'metode_bayar' => $request->metode_bayar
        ]);

    // 2. Alihkan kembali ke halaman yang sama (pembayaran) dengan membawa pesan sukses/kuitansi
    return redirect()->route('booking.pembayaran', $id)->with('success', 'Pembayaran Berhasil! Kuitansi Anda telah diterbitkan.');
    }
    public function edit($id)
    {
        // MENCARI DATA BOOKING BERDASARKAN ID, JIKA TIDAK ADA MAKA ERROR 404
        $booking = Booking::findOrFail($id);
        
        // MENGARAHKAN KE FILE VIEW 'admin/edit.blade.php' SAMBIL MEMBAWA DATA
        return view('admin.edit', compact('booking')); 
    }

    // FUNGSI BARU 2: MEMPROSES PERUBAHAN DATA YANG DIKIRIM DARI FORM EDIT
    public function update(Request $request, $id)
    {
        // MENCARI DATA BOOKING YANG AKAN DIUBAH
        $booking = Booking::findOrFail($id);

        // MELAKUKAN VALIDASI DATA TERHADAP INPUTAN BARU DARI ADMIN
        $request->validate([
            'nama_tamu' => 'required|string|max:255',
            'email_tamu' => 'required|email',
            'pilihan_kamar' => 'required|in:standard,deluxe,suite',
            'nomor_kamar' => 'required|string',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'status_bayar' => 'required|in:Pending,Lunas',
        ]);

        // MENYIMPAN PERUBAHAN DATA TERBARU KE DATABASE
        $booking->update([
            'nama_tamu' => $request->nama_tamu,
            'email_tamu' => $request->email_tamu,
            'pilihan_kamar' => $request->pilihan_kamar,
            'nomor_kamar' => $request->nomor_kamar,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'status_bayar' => $request->status_bayar,
        ]);

        // MENGALIHKAN KEMBALI KEDAHSBOARD ADMIN DENGAN NOTIFIKASI SUKSES
        return redirect()->route('admin.dashboard')->with('success', 'Data transaksi tamu berhasil diperbarui.');
    }

    // FUNGSI BARU 3: MENGHAPUS LOG DATA TRANSAKSI TAMU BERDASARKAN ID
    public function destroy($id)
    {
        // MENCARI DATA YANG AKAN DIHAPUS
        $booking = Booking::findOrFail($id);
        
        // MENGEKSEKUSI PERINTAH HAPUS DATA
        $booking->delete();

        // KEMBALI KE HALAMAN SEBELUMNYA DENGAN PESAN SUKSES HAPUS
        return redirect()->back()->with('success', 'Data log transaksi tamu berhasil dihapus.');
    }

    // =========================================================================
    // AKHIRAN BAGIAN BARU: SELESAI
    // =========================================================================

}