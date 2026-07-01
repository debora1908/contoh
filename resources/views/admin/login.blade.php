<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Admin | Hotel Management</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;

    background:
    linear-gradient(135deg,#4f46e5,#6d28d9,#60a5fa);

    overflow:hidden;
}

body::before{

content:"";

position:absolute;

width:450px;
height:450px;

background:#fff;

opacity:.08;

border-radius:50%;

top:-150px;
left:-120px;

}

body::after{

content:"";

position:absolute;

width:500px;
height:500px;

background:#fff;

opacity:.08;

border-radius:50%;

bottom:-220px;
right:-180px;

}

.login-box{

position:relative;

z-index:10;

width:430px;

background:rgba(255,255,255,.95);

backdrop-filter:blur(15px);

border-radius:25px;

overflow:hidden;

box-shadow:0 20px 50px rgba(0,0,0,.25);

}

.top-header{

background:linear-gradient(135deg,#5b5cf0,#2563eb);

padding:45px;

text-align:center;

color:white;

}

.top-header i{

font-size:55px;

margin-bottom:10px;

}

.top-header h2{

font-weight:bold;

margin-bottom:5px;

}

.top-header p{

opacity:.9;

font-size:15px;

}

.login-body{

padding:35px;

}

.form-label{

font-weight:600;

color:#555;

margin-bottom:8px;

}

.input-group{

margin-bottom:22px;

}

.input-group-text{

background:#f5f7ff;

border:none;

border-radius:12px 0 0 12px;

}

.form-control{

border:none;

background:#f5f7ff;

padding:14px;

border-radius:0 12px 12px 0;

}

.form-control:focus{

box-shadow:0 0 0 .2rem rgba(91,92,240,.2);

background:white;

}

.btn-login{

width:100%;

padding:14px;

border:none;

border-radius:14px;

background:linear-gradient(135deg,#5b5cf0,#2563eb);

color:white;

font-weight:bold;

font-size:17px;

transition:.3s;

}

.btn-login:hover{

transform:translateY(-3px);

box-shadow:0 12px 30px rgba(37,99,235,.35);

}

.bottom-text{

text-align:center;

margin-top:20px;

color:#777;

font-size:14px;

}

.alert{

border-radius:12px;

}

.password-toggle{

cursor:pointer;

}

</style>

</head>

<body>

<div class="login-box">

<div class="top-header">

<i class="bi bi-building"></i>

<h2>Login Admin</h2>

<p>Hotel Management System</p>

</div>

<div class="login-body">

@if($errors->any())

<div class="alert alert-danger">

{{ $errors->first() }}

</div>

@endif

<form method="POST" action="{{ route('login.proses') }}">

@csrf

<div class="mb-3">

<label class="form-label">

Email

</label>

<div class="input-group">

<span class="input-group-text">

<i class="bi bi-envelope-fill"></i>

</span>

<input

type="email"

name="email"

class="form-control"

placeholder="Masukkan Email"

required>

</div>

</div>

<div class="mb-4">

<label class="form-label">

Password

</label>

<div class="input-group">

<span class="input-group-text">

<i class="bi bi-lock-fill"></i>

</span>

<input

type="password"

id="password"

name="password"

class="form-control"

placeholder="Masukkan Password"

required>

<span class="input-group-text password-toggle" onclick="togglePassword()">

<i id="eye" class="bi bi-eye"></i>

</span>

</div>

</div>

<button class="btn-login">

<i class="bi bi-box-arrow-in-right"></i>

Login Admin

</button>

</form>

<div class="bottom-text">

© {{ date('Y') }} Hotel Management System

</div>

</div>

</div>
<script>

function togglePassword(){

const password=document.getElementById("password");
const eye=document.getElementById("eye");

if(password.type==="password"){

password.type="text";

eye.classList.remove("bi-eye");

eye.classList.add("bi-eye-slash");

}else{

password.type="password";

eye.classList.remove("bi-eye-slash");

eye.classList.add("bi-eye");

}

}

// Animasi muncul card
window.onload=function(){

const card=document.querySelector(".login-box");

card.style.opacity="0";
card.style.transform="translateY(40px)";

setTimeout(function(){

card.style.transition=".8s";

card.style.opacity="1";
card.style.transform="translateY(0px)";

},200);

};

// Efek saat fokus input
const inputs=document.querySelectorAll(".form-control");

inputs.forEach(input=>{

input.addEventListener("focus",function(){

this.parentElement.style.transform="scale(1.02)";
this.parentElement.style.transition=".3s";

});

input.addEventListener("blur",function(){

this.parentElement.style.transform="scale(1)";

});

});

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>