<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lupa Password</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#0ea5e9,#2563eb);
    font-family:'Segoe UI';
}
.card{
    width:450px;
    border:none;
    border-radius:20px;
    box-shadow:0 20px 40px rgba(0,0,0,.2);
}
</style>
</head>
<body>

<div class="card">
<div class="card-body p-5">

<h3 class="text-center mb-4">
Lupa Password
</h3>

@if($errors->any())
<div class="alert alert-danger">
{{ $errors->first() }}
</div>
@endif

<form method="POST" action="{{ route('user.forgot.proses') }}">
@csrf

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Password Baru</label>
<input type="password" name="password" class="form-control" required>
</div>

<div class="mb-3">
<label>Konfirmasi Password</label>
<input type="password" name="password_confirmation" class="form-control" required>
</div>

<button class="btn btn-primary w-100">
Simpan Password Baru
</button>

<div class="text-center mt-3">
<a href="{{ route('user.login') }}">
Kembali ke Login
</a>
</div>

</form>

</div>
</div>

</body>
</html>