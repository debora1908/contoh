<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kamar</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:#f5f7fb;
            font-family:'Segoe UI',sans-serif;
        }

        /* ================= Sidebar ================= */

        .sidebar{
            position:fixed;
            top:0;
            left:0;
            width:250px;
            height:100vh;
            background:#1f2937;
            padding:25px 20px;
            color:white;
            overflow-y:auto;
            box-shadow:2px 0 15px rgba(0,0,0,.15);
        }

        .logo{
            font-size:28px;
            font-weight:bold;
            margin-bottom:20px;
        }

        .sidebar hr{
            border-color:#374151;
            margin:20px 0;
        }

        .menu{
            list-style:none;
            padding:0;
            margin:0;
        }

        .menu li{
            margin-bottom:15px;
        }

        .menu a{
            display:flex;
            align-items:center;
            gap:12px;
            padding:14px 18px;
            border-radius:12px;
            color:#cbd5e1;
            text-decoration:none;
            transition:.3s;
            font-size:16px;
        }

        .menu a:hover{
            background:#2563eb;
            color:white;
        }

        .menu a.active{
            background:#2563eb;
            color:white;
            font-weight:600;
        }

        .menu i{
            width:20px;
            text-align:center;
            font-size:18px;
        }

        /* ================= Main ================= */

        .main-content{
            margin-left:250px;
            padding:30px;
        }

        /* ================= Card ================= */

        .room-card{
            width:120px;
            min-height:170px;
            border-radius:15px;
            cursor:pointer;
            transition:.3s;
        }

        .room-card:hover{
            transform:translateY(-5px);
            box-shadow:0 8px 20px rgba(0,0,0,.15);
        }

        .status-tersedia{
            border-left:6px solid #16a34a;
        }

        .status-kotor{
            border-left:6px solid #dc2626;
        }

        .status-terisi{
            border-left:6px solid #2563eb;
        }

        .status-perbaikan{
            border-left:6px solid #f59e0b;
        }

        .badge-status{
            font-size:12px;
            padding:6px 10px;
            border-radius:20px;
        }

        .card-header h5{
            font-weight:bold;
        }

        .inventory-card{
            max-width:250px;
            border-radius:15px;
        }
    </style>

</head>

<body>

<!-- ================= Sidebar ================= -->

<div class="sidebar">

    <div class="logo">
        🏨 E-Hotel Mgt
    </div>

    <hr>

    <ul class="menu">

        <li>
            <a href="/admin/dashboard"
               class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>
        </li>

        <li>
            <a href="/admin/manajemen"
               class="{{ request()->is('admin/manajemen') ? 'active' : '' }}">
                <i class="bi bi-door-open-fill"></i>
                Manajemen Kamar
            </a>
        </li>

        <li>
            <a href="/admin/reservasi">
                <i class="bi bi-journal-bookmark-fill"></i>
                Reservasi Tamu
            </a>
        </li>

        <li>
            <a href="/admin/pengguna">
                <i class="bi bi-people-fill"></i>
                Pengguna
            </a>
        </li>

        <li>
            <a href="/logout">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </a>
        </li>

    </ul>

</div>

<!-- ================= Main ================= -->

<div class="main-content">
    <div class="container-fluid">

    <!-- Card Inventory -->
    <div class="card shadow-sm border-0 inventory-card mb-4">
        <div class="card-body">
            <small class="text-muted">TOTAL INVENTORY</small>
            <h2 class="fw-bold">{{ $totalKamar }}</h2>
            <span class="text-secondary">Kamar</span>
        </div>
    </div>

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-4"
            data-bs-toggle="modal"
            data-bs-target="#modalTambah">

        <i class="bi bi-plus-circle"></i>
        Tambah Kamar

    </button>

    <!-- ================= LIST KAMAR ================= -->

    @foreach(['Standard','Deluxe Room','Executive Suite'] as $tipe)

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-white">

            <h5 class="mb-0">

                {{ $tipe }}

                <span class="badge bg-success ms-2">

                    Sisa :
                    {{ $kamars->where('tipe_kamar',$tipe)->where('status','Tersedia')->count() }}

                </span>

            </h5>

        </div>

        <div class="card-body">

            <div class="row g-3">

                @foreach($kamars->where('tipe_kamar',$tipe) as $kamar)

                <div class="col-lg-2 col-md-3 col-sm-4 col-6">

                    <div

                    class="card room-card shadow-sm text-center p-3

                    @if($kamar->status=='Tersedia')
                        status-tersedia
                    @elseif($kamar->status=='Kotor')
                        status-kotor
                    @elseif($kamar->status=='Terisi')
                        status-terisi
                    @else
                        status-perbaikan
                    @endif

                    "

                    data-bs-toggle="modal"
                    data-bs-target="#edit{{ $kamar->id }}">

                        <div class="mt-2">
                            <i class="bi bi-door-open-fill fs-1"></i>
                        </div>

                        <h3 class="mt-3">
                            {{ $kamar->nomor_kamar }}
                        </h3>

                        <div class="mt-3">

                            @if($kamar->status=="Tersedia")

                                <span class="badge bg-success badge-status">
                                    Tersedia
                                </span>

                            @elseif($kamar->status=="Kotor")

                                <span class="badge bg-danger badge-status">
                                    Kotor
                                </span>

                            @elseif($kamar->status=="Terisi")

                                <span class="badge bg-primary badge-status">
                                    Terisi
                                </span>

                            @else

                                <span class="badge bg-warning text-dark badge-status">
                                    Sedang Diperbaiki
                                </span>

                            @endif

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

    </div>

    @endforeach

</div>

<!-- ================= MODAL TAMBAH ================= -->

<div class="modal fade"
     id="modalTambah"
     tabindex="-1">

<div class="modal-dialog">

<form action="{{ route('admin.manajemen.store') }}"
      method="POST"
      class="modal-content">

@csrf

<div class="modal-header">

<h4 class="modal-title">

Tambah Kamar Baru

</h4>

<button type="button"
        class="btn-close"
        data-bs-dismiss="modal">
</button>

</div>

<div class="modal-body">

<div class="mb-3">

<label class="form-label">

Nomor Kamar

</label>

<input
type="text"
name="nomor_kamar"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">

Tipe Kamar

</label>

<select
id="tipe_kamar_select"
name="tipe_kamar"
class="form-select"
onchange="updateHarga()">

<option value="Standard">
Standard
</option>

<option value="Deluxe Room">
Deluxe Room
</option>

<option value="Executive Suite">
Executive Suite
</option>

</select>

</div>

<div class="mb-3">

<label class="form-label">

Harga Per Malam

</label>

<input
type="number"
id="harga_input"
name="harga_per_malam"
class="form-control"
readonly>

</div>

</div>

<div class="modal-footer">

<button
type="button"
class="btn btn-secondary"
data-bs-dismiss="modal">

Batal

</button>

<button
type="submit"
class="btn btn-success">

<i class="bi bi-check-circle"></i>

Simpan

</button>

</div>

</form>

</div>

</div>
<!-- ================= MODAL EDIT ================= -->

@foreach($kamars as $kamar)

<div class="modal fade" id="edit{{ $kamar->id }}" tabindex="-1">

    <div class="modal-dialog">

        <form action="{{ route('admin.manajemen.update',$kamar->id) }}"
              method="POST"
              class="modal-content">

            @csrf
            @method('PUT')

            <div class="modal-header">

                <h4 class="modal-title">
                    Edit Kamar {{ $kamar->nomor_kamar }}
                </h4>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <div class="mb-3">

                    <label class="form-label">
                        Nomor Kamar
                    </label>

                    <input type="text"
                           class="form-control"
                           value="{{ $kamar->nomor_kamar }}"
                           readonly>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Tipe Kamar
                    </label>

                    <input type="text"
                           class="form-control"
                           value="{{ $kamar->tipe_kamar }}"
                           readonly>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Harga Per Malam
                    </label>

                    <input type="text"
                           class="form-control"
                           value="Rp {{ number_format($kamar->harga_per_malam,0,',','.') }}"
                           readonly>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Status Kamar
                    </label>

                    <select name="status" class="form-select">

                        <option value="Tersedia"
                        {{ $kamar->status=='Tersedia' ? 'selected' : '' }}>
                            Tersedia
                        </option>

                        <option value="Terisi"
                        {{ $kamar->status=='Terisi' ? 'selected' : '' }}>
                            Terisi
                        </option>

                        <option value="Kotor"
                        {{ $kamar->status=='Kotor' ? 'selected' : '' }}>
                            Kotor
                        </option>

                        <option value="Sedang Diperbaiki"
                        {{ $kamar->status=='Sedang Diperbaiki' ? 'selected' : '' }}>
                            Sedang Diperbaiki
                        </option>

                    </select>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Batal
                </button>

                <button type="submit"
                        class="btn btn-primary">

                    <i class="bi bi-save"></i>

                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>

@endforeach

</div>
<!-- End Main Content -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>

const daftarHarga = {
    "Standard":500000,
    "Deluxe Room":750000,
    "Executive Suite":1200000
};

function updateHarga(){

    let tipe=document.getElementById("tipe_kamar_select");
    let harga=document.getElementById("harga_input");

    if(tipe && harga){

        harga.value=daftarHarga[tipe.value];

    }

}

document.addEventListener("DOMContentLoaded",function(){

    updateHarga();

});

const modalTambah=document.getElementById("modalTambah");

if(modalTambah){

    modalTambah.addEventListener("shown.bs.modal",function(){

        updateHarga();

    });

}

</script>

</body>
</html>