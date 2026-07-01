<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Register User</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
width:460px;
border:none;
border-radius:20px;
box-shadow:0 20px 40px rgba(0,0,0,.2);
}

.btn-register{
background:#16a34a;
color:white;
}

.btn-register:hover{
background:#15803d;
color:white;
}

</style>

</head>

<body>

<div class="card">

<div class="card-body p-5">

<div class="text-center mb-4">

<i class="bi bi-person-plus-fill display-2 text-success"></i>

<h3 class="fw-bold mt-3">
Register User
</h3>

<p class="text-muted">
Silakan buat akun baru terlebih dahulu.
</p>

</div>

@if ($errors->any())
<div class="alert alert-danger">
{{ $errors->first() }}
</div>
@endif

<form method="POST" action="{{ route('user.register.proses') }}">

@csrf

<div class="mb-3">
<label>Nama Lengkap</label>
<input
type="text"
name="name"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Email</label>
<input
type="email"
name="email"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Password</label>
<input
type="password"
name="password"
class="form-control"
required>
</div>

<div class="mb-4">
<label>Konfirmasi Password</label>
<input
type="password"
name="password_confirmation"
class="form-control"
required>
</div>

<button class="btn btn-register w-100">

<i class="bi bi-person-plus-fill"></i>

Daftar

</button>

<div class="text-center mt-3">

Sudah punya akun?

<a href="{{ route('user.login') }}">

Login

</a>

</div>

</form>

</div>

</div>

</body>
</html>