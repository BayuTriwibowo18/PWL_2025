<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Register Pengguna</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Custom Styles -->
  <style>
    body {
      background-image: url('{{ asset('img/background.png') }}');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      height:100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Source Sans Pro', sans-serif;
    }
    .register-box {
      width: 400px;
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      padding: 30px;
      text-align: center;
    }
    .register-logo {
      margin-bottom: 20px;
    }
    .register-logo a {
      font-size: 24px;
      font-weight: bold;
      color: #333;
      text-decoration: none;
    }
    .register-box-msg {
      font-size: 18px;
      color: #666;
      margin-bottom: 20px;
    }
    .form-control {
      border-radius: 25px;
      padding: 10px 15px;
      border: 1px solid #ddd;
      margin-bottom: 15px;
      width: 100%;
      box-sizing: border-box;
    }
    .form-control::placeholder {
      color: #aaa;
    }
    .btn-primary {
      background: #1dc495;
      border: none;
      border-radius: 25px;
      padding: 10px;
      width: 100%;
      font-size: 16px;
      font-weight: bold;
      margin-bottom: 15px;
    }
    .signin-link {
      font-size: 14px;
      color: #666;
    }
    .signin-link a {
      color: #1dc495;
      text-decoration: none;
    }
  </style>
</head>
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="{{ url('/') }}"><b>Register POS</b></a>
    </div>
    <div class="card-body">
      <p class="register-box-msg">Create an account to continue</p>
      <form action="{{ url('register') }}" method="POST" id="form-register">
        @csrf
        <div class="input-group mb-3">
            <select name="level_id" id="level_id" class="form-control" required>
                <option value="">- Pilih Level -</option>
                @foreach($level as $l)
                    <option value="{{ $l->level_id }}">{{ $l->level_nama }}</option>
                @endforeach
            </select>
            <small id="error-level_id" class="error-text form-text text-danger"></small>
        </div>
        <div class="input-group mb-3">
            <input type="text" name="username" id="username" class="form-control" required minlength="4" 
                maxlength="20" placeholder="Masukkan Username">
            <small id="error-username" class="error-text text-danger"></small>
        </div>
        <div class="input-group mb-3">
            <input type="text" name="nama" id="nama" class="form-control" required maxlength="100" placeholder="Masukkan Nama">
            <small id="error-nama" class="error-text form-text text-danger"></small>
        </div>
        <div class="input-group mb-3">
            <input type="password" name="password" id="password" class="form-control" required minlength="5"
                maxlength="20" placeholder="Masukkan Password">
            <small id="error-password" class="error-text form-text text-danger"></small>
        </div>
        <div class="row justify-content-end">
            <div class="col-auto">
                <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
            </div>
        </div>
      </form>
      <p class="signin-link">Already have an account? <a href="{{ url('login') }}">Sign in</a></p>
    </div>
  </div>

  <!-- jQuery -->
  <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- jquery-validation -->
  <script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
  <!-- SweetAlert2 -->
  <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

  <script>
    $(document).ready(function () {
        $("#form-register").validate({
            rules: {
                username: { required: true, minlength: 4, maxlength: 20 },
                nama: { required: true, maxlength: 100 },
                password: { required: true, minlength: 5, maxlength: 20 },
                password_confirmation: { equalTo: "[name='password']" },
                level_id: { required: true, number: true }
            },
            submitHandler: function (form) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function (response) {
                        if (response.status) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Registrasi Berhasil',
                                text: response.message,
                            }).then(() => {
                                if (response.redirect) {
                                    window.location = response.redirect;
                                }
                            });
                        } else {
                            $('.text-danger').text('');
                            $.each(response.errors, function (key, val) {
                                $('#error-' + key).text(val[0]);
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: response.message
                            });
                        }
                    }
                });
                return false;
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.input-group').append(error);
            },
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
</body>
</html>