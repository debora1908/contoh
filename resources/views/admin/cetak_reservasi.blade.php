<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Reservasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            font-family:Arial,sans-serif;
            margin:40px;
        }

        h2{
            text-align:center;
            margin-bottom:30px;
        }

        table{
            width:100%;
        }

        td{
            padding:8px;
        }

    </style>

</head>

<body onload="window.print()">

<h2>INVOICE RESERVASI HOTEL</h2>

<table class="table table-bordered">

<tr>
    <td width="35%">Nama Tamu</td>
    <td>{{ $booking->nama_tamu }}</td>
</tr>

<tr>
    <td>Email</td>
    <td>{{ $booking->email_tamu }}</td>
</tr>

<tr>
    <td>Tipe Kamar</td>
    <td>{{ ucfirst($booking->pilihan_kamar) }}</td>
</tr>

<tr>
    <td>Nomor Kamar</td>
    <td>{{ $booking->nomor_kamar }}</td>
</tr>

<tr>
    <td>Check In</td>
    <td>{{ $booking->check_in }}</td>
</tr>

<tr>
    <td>Check Out</td>
    <td>{{ $booking->check_out }}</td>
</tr>

<tr>
    <td>Status Pembayaran</td>
    <td>{{ $booking->status_bayar }}</td>
</tr>

<tr>
    <td>Status Menginap</td>
    <td>{{ $booking->status_menginap }}</td>
</tr>

</table>

</body>
</html>