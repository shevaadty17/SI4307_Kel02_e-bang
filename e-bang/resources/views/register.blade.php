<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>E - Bang | Register</title>

  <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
  <meta name="robots" content="noindex">

  <!-- Material Design Icons  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Roboto Web Font -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">

  <!-- App CSS -->
  <!-- App CSS -->
  <link type="text/css" href="{{ asset('css/style.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <!-- jQuery -->
<script src="{{ asset('vendor/jquery.min.js') }}"></script>

</head>

<body class="login">

  <div class="row">
    <div class="col-sm-10 col-sm-push-1 col-md-6 col-md-push-3 col-lg-6 col-lg-push-3">
    <h2 class="text-primary center m-a-2">
        <i class="fa fa-home"></i> <span class="icon-text">E - Bang</span>
        </h2>
      <div class="card-group">
        <div class="card">
          <div class="card-block center">
            <h4 class="m-b-0">
              <i class="material-icons">person_add</i> <span class="icon-text">Sign Up</span>
            </h4>
            <p class="text-muted">Create a new account</p>
            <form action="/register-customer" method="post">
                @csrf
                @if (session()->get('err-pw'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('err-pw') }}
                    </div>
                @endif
                <div class="form-group">
                    <input type="text" class="form-control" name="nm" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <select class="form-control" name="jk" id="exampleSelect1">
                        <option value="">---- Pilih Jenis Kelamin ----</option>
                        <option value="1">Laki - laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pw1" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="password" name="pw2" class="form-control" placeholder="Confirm Password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-rounded">Register</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="{{ asset('vendor/tether.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap.min.js') }}"></script>

  <!-- AdminPlus -->
  <script src="{{ asset('vendor/adminplus.js') }}"></script>

  <!-- App JS -->
  <script src="{{ asset('js/main.min.js') }}"></script>

</body>

</html>
