<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ url("img/favicon.ico") }}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{ url("img/favicon.ico") }}" type="image/x-icon"/>
    <link href="{{ url("css/logreg.css") }}" rel="stylesheet">
    <title>Posiana - Register Posyandu</title>
</head>
<body>
<div class="full-page" style="background: #f98cff">
    <div class="login-form">
        <form action="{{ url("posyandu/register") }}" method="post">
            <h3>Pendaftaran Posyandu</h3>
            <div class="form-group ">
                <input type="username" name="username" id="username" class="form-control form-logres"
                       placeholder="Username">
                <i class="fa fa-user"></i>
            </div>
            <div class="form-group ">
                <input type="nama" name="nama" id="nama" class="form-control form-logres"
                       placeholder="nama posyandu">
                <i class="fa fa-user"></i>
            </div>
            <div class="form-group ">
                <input type="email" name="email" id="email" class="form-control form-logres" placeholder="Email">
                <i class="fa fa-envelope"></i>
            </div>
            <div class="form-group log-status">
                <input type="password" name="password" id="password" class="form-control form-logres"
                       placeholder="Kata Sandi">
                <i class="fa fa-lock"></i>
            </div>
            <span class="alert">Invalid Credentials</span>
            <input type="submit" class="log-btn" value="Daftar">
        </form>
        <p>
            Sudah terdaftar?<br>
            <a class="link" href="{{ url("posyandu/login") }}"> Masuk disini </a>
        </p>

    </div>
</div>
</body>
</html>