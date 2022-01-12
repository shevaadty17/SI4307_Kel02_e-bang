<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>E - Bang | Login </title>

  <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
  <meta name="robots" content="noindex">

  <!-- Material Design Icons  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Roboto Web Font -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">

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
        <div class="card bg-transparent">
          <div class="card-block">
            <div class="center">
              <h4 class="m-b-0"><span class="icon-text">Login</span></h4>
              <p class="text-muted">Access your account</p>
            </div>
            <form action="/do-login" method="post">
                @csrf
                @if (session()->get('err-pw'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('err-pw') }}
                    </div>
                @endif
                @if (session()->get('success-reg'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success-reg') }}
                    </div>
                @endif
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="clearfix"></div>
                </div>
                <div class="float-right pull-xs-right">
                    <small>Not have account?</small>
                    <a href="/register">
                        <small>Create Account</small>
                    </a>
                </div>
                <br>
                <div class="center">
                    <button type="submit" class="btn btn-primary-outline btn-circle-large">
                        <i class="material-icons">lock</i>
                    </button>
                </div>
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
