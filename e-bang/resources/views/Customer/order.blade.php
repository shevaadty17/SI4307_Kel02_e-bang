<!DOCTYPE html>
<html class="bootstrap-layout">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>E - Bang | Produk </title>

  <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
  <meta name="robots" content="noindex">

  <!-- Material Design Icons  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Roboto Web Font -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">

  <!-- App CSS -->
  <link type="text/css" href="{{ asset('css/style.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
  <!-- jQuery -->
  <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
  <script src="{{ asset('/vendor/jquery.min.js') }}"></script>
  <!-- Charts CSS -->
  {{-- <link rel="stylesheet" href="examples/css/morris.min.css"> --}}
</head>

<body class="layout-container ls-top-navbar si-l3-md-up">
    @php
        $user = \App\Models\Auth::where('id_user', session('auth')['id'])->first();
    @endphp
  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-primary navbar-full navbar-fixed-top">

    <!-- Toggle sidebar -->
    <button class="navbar-toggler pull-xs-left hidden-md-up" type="button" data-toggle="sidebar" data-target="#sidebarLeft"><span class="material-icons">menu</span></button>

    <!-- Brand -->
    <a href="/dashboard-admin" class="navbar-brand first-child-md"><i class="fa fa-home"></i> E - Bang</a>

    <!-- Menu -->
    <!-- // END Menu -->

    <!-- Menu -->
    <ul class="nav navbar-nav pull-xs-right hidden-sm-down nav-strip-right">
      <!-- // END Notifications dropdown -->

      <!-- User dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle p-a-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false">
            <span>{{ $user->nm_user }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-list" aria-labelledby="Preview">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit-user"><i class="material-icons md-18">person</i> <span class="icon-text">Edit Account</span></a>
          <a class="dropdown-item" href="/do-logout">Logout</a>
        </div>
      </li>
      <!-- // END User dropdown -->

    </ul>
    <!-- // END Menu -->

  </nav>
  <!-- // END Navbar -->
  <!-- Sidebar -->
  <div class="sidebar sidebar-left si-si-3 sidebar-visible-md-up sidebar-light ls-top-navbar-xs-up sidebar-transparent-md" id="sidebarLeft" data-scrollable>
    <ul class="sidebar-menu">
      @include('Customer.sidebar')
    </ul>
  </div>
  <!-- // END Sidebar -->

  <!-- Content -->
  <div class="layout-content" data-scrollable>
    <div class="container-fluid">
        @if (session()->get('success-add'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success-add') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
              <h5 class="card-title">Order</h5>
              <div class="right">
                    @if(count($buffer) > 0)
                        <a href="/checkout-product" class="btn btn-sm btn-success"><i class="fa fa-shopping-cart"></i> Checkout ({{ count($buffer) }})</a>
                    @endif
              </div>
            </div>
            <table id="data-product" class="table table-striped table-hover table-sm">
              <thead>
                <tr>
                    <th align="right">#</th>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Jenis Produk</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($product as $keys => $prod)
                      <tr>
                        <td>{{ $keys+1 }}</td>
                        <td><img src="public/images/produk/{{ $prod->product_img }}" width="100" alt=""></td>
                        <td>{{ $prod->product_nm }}</td>
                        <td>{{ $prod->product_jns }}</td>
                        <td>{{ $prod->product_price }}</td>
                        <td><a href="javascript:void(0)" class="btn btn-sm btn-success" onclick="addToCart({{ $prod->product_id }})"><i class="fa fa-plus"></i> Add To Cart</a></td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
            <div class="clearfix"></div>
          </div>
    </div>
  </div>

  <div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" id="edit-user">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          <h5 class="modal-title">Edit Produk</h5>
        </div>
        <form action="/edit-profile" method="post">
            <div class="modal-body">
                <div class="card">
                    <div class="card-block">
                        @csrf
                        <input type="hidden" value="{{ $user->id_user }}" name="id_user">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nm" value="{{ $user->nm_user }}" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="jk" id="">
                                <option value="">---- Pilih Jenis Kelamin ----</option>
                                <option value="1" {{ $user->jk_user == '1' ? 'selected' : '' }}>Laki - laki</option>
                                <option value="2" {{ $user->jk_user == '2' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" value="{{ $user->username }}" placeholder="Username" required>
                        </div>
                        <input type="hidden" value="{{ $user->password }}" name="pw_old">
                        <div class="form-group">
                            <input type="password" class="form-control" name="pw1" placeholder="Password">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Edit</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="{{ asset('/vendor/tether.min.js') }}"></script>
  <script src="{{ asset('/vendor/bootstrap.min.js') }}"></script>

  <!-- AdminPlus -->
  <script src="{{ asset('/vendor/adminplus.js') }}"></script>

  <!-- App JS -->
  <script src="{{ asset('/js/main.min.js') }}"></script>

  <!-- Theme Colors -->
  <script src="{{ asset('/js/colors.js') }}"></script>

  <!-- Charts JS -->
  <script src="{{ asset('/vendor/raphael.min.js') }}"></script>
  <script src="{{ asset('/vendor/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('/vendor/dataTables.bootstrap.js') }}"></script>
  <script>
    var CSRF_TOKEN = '{{ csrf_token() }}';
    $(document).ready( function () {
        $('#data-product').DataTable();
    } );

    addToCart = (prod_id) => {
        $.ajax({
            url : '/add-to-cart',
            type : 'POST',
            dataType : 'json',
            data : {
                _token : CSRF_TOKEN,
                prod_id : prod_id
            },
            success : function (result){
                if(result.status == 'success'){
                    window.location.reload();
                }
            }
        });
    }
  </script>

</body>

</html>
