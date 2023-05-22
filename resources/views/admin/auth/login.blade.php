
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMI-UNM | Admin</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/dist/css/ktcstyle.css">
</head>
<body class="hold-transition login-page" style="background-color:white">

  {{-- Coba tambahkan sesuatu --}}
  <style>
    .container-fluid {
    height: 100vh;
    }

    .row {
        height: 100%;
    }

    .col-md-8 {
        padding: 0;
    }

    .img-fluid {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.6);
    }

    .text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        text-align: center;
        font-size: 3rem;
    }

    .col-md-4 {
        background-color: #fff;
        padding: 3rem;
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
    }

    .btn-primary:focus, .btn-primary.focus {
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
    }

    .btn-primary.disabled, .btn-primary:disabled {
        background-color: #007bff;
        border-color: #007bff;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
    }

    .form-control::placeholder {
        color: #ccc;
    }

    .form-control:focus::placeholder {
        color: #bfbfbf;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateX(-20px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .form-group:nth-child(1) {
        animation: fadeIn 1s ease;
        animation-delay: 0.2s;
    }

    .form-group:nth-child(2) {
        animation: fadeIn 1s ease;
        animation-delay: 0.4s;
    }

    .btn-primary {
        animation: fadeIn 1s ease;
        animation-delay: 0.6s;
    }
  </style>

<div class="container-fluid">
  <div class="row">
      <div class="col-md-8 p-0">
          <img src="/img/cover_phinisi.jpeg" class="img-fluid">
          <div class="overlay"></div>
          <div class="text">
              <h2>Sistem Informasi Minimarket</h2>
          </div>
      </div>
      <div class="col-md-4 my-auto">

        <div class="login-logo">
          <a href="#"><b>ADMIN</b> SIMI</a>
        </div> 
        {{-- adakah --}}
        {{-- adakah --}}

        <p class="login-box-msg">Masuk untuk mengelola data</p>

        @if (session()->has('loginError'))      
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{session('loginError')}}
                 </div>
        @endif

          <form action="/admin/auth/login" method="post">
           @csrf
              <div class="form-group">
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror " placeholder="Email" required>
                  @error('email')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
              </div>
              <div class="form-group">
                  <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password" required>
                  @error('password')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                  @enderror
              </div>
              <button type="submit" class="btn btn-primary btn-block">Login</button>
          </form>
      </div>
  </div>
</div>


<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
