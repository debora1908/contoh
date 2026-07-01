<x-app-layout>

<x-slot name="header">
<h2 class="fw-bold">
Dashboard Manager
</h2>
</x-slot>

<div class="container mt-4">

<div class="row">

<div class="col-md-3">
<div class="card bg-primary text-white mb-3">
<div class="card-body">
<h5>Total Pendapatan</h5>
<h3>Rp {{ number_format($pendapatan,0,',','.') }}</h3>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-success text-white mb-3">
<div class="card-body">
<h5>Total Reservasi</h5>
<h3>{{ $totalReservasi }}</h3>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-warning text-dark mb-3">
<div class="card-body">
<h5>Total Kamar</h5>
<h3>{{ $totalKamar }}</h3>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-info text-white mb-3">
<div class="card-body">
<h5>Kamar Tersedia</h5>
<h3>{{ $kamarTersedia }}</h3>
</div>
</div>
</div>

</div>

<div class="card mt-4">

<div class="card-header">
Reservasi Terbaru
</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Nama</th>

<th>Check In</th>

<th>Check Out</th>

<th>Status</th>

<th>Total</th>

</tr>

</thead>

<tbody>

@forelse($reservasiTerbaru as $r)

<tr>

<td>{{ $r->id }}</td>

<td>{{ $r->nama_tamu }}</td>

<td>{{ $r->tanggal_checkin }}</td>

<td>{{ $r->tanggal_checkout }}</td>

<td>

@if($r->status_pembayaran=="Lunas")

<span class="badge bg-success">

Lunas

</span>

@else

<span class="badge bg-danger">

Belum Bayar

</span>

@endif

</td>

<td>

Rp {{ number_format($r->total_bayar,0,',','.') }}

</td>

</tr>

@empty

<tr>

<td colspan="6" class="text-center">

Belum ada data reservasi

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</div>

</x-app-layout>