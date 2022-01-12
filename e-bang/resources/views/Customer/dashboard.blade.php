<!DOCTYPE html>
<html class="bootstrap-layout">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>E - Bang | Dashboard </title>

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

      <!-- Card Group -->
      <div class="card-group">

        <!-- Card -->
        <div class="card">
            <small class="text-muted">
              <strong>Dashboard Customer</strong>
            </small>

            <section>
    <img class="card-img-top" style="text-align: center;" src="images/Logo E-Bang.png" align="left" width="350px" height="300px">
    <p style="text-align: center;"><b>E-Bang (Electronic Bangunan) adalah website marketplace khusus barang bangunan untuk memudahkan customer berbelanja dan memudahkan toko bangunan untuk memasarkan produk.</b></p>
    <p style="text-align: center;"><b><br>Business Hours From Monday to Sunday 09:00AM – 11:00PM.</b></p>
    <p style="text-align: center;"><b>For More Information :</b></p>
    <p style="text-align: center;"><b>+6282134759227 (Business Requirement)</b></p>
    <p style="text-align: center;"><b>ebang.official@gmail.com (Business Requirement)</b></p>

    <h1 style="text-align: center;"><br>Servis dan Layanan kami</h1>
    <br>
    <div class="container">
        <div class="title"></div>
        <div class="row">
            <div class="col-md-4">
                <div class="card text">
                    <div class="card-body">
                        <img class="card-img-top" src="https://indoforwarding.com/wp-content/uploads/2018/05/jasa-pengiriman-barang-sangat-dibutuhkan.jpeg" width="350px" height="300px">
                        <h5 class="card-title"><b>Pengiriman barang</b></h5>
                        <p class="card-text" align="justify">Layanan ini untuk mempermudah sistem pengiriman barang Customer. Selain itu layanan ini juga diberikan untuk membantu pengiriman belanja secara online, atau yang kerap disebut dengan jasa pengiriman barang online.</p>
                    </div>
                </div>
            </div>
  
            <div class="col-md-4">
                <div class="card text">
                    <div class="card-body">
                            <img class="card-img-top" src="https://superyou.co.id/blog/wp-content/uploads/2021/05/cek-resi-jne.jpg" width="350px" height="300px">
                            <h5 class="card-title"><b>Pelacakan barang</b></h5>
                        <p class="card-text" align="justify">Layanan ini berguna bagi customer untuk melacak barang yang telah dipesan. Layanan ini hanya tersedia secara offline, customer memberikan nomor resi kepada karyawan ekspedisi masing-masing, nomor resi ini berfungsi sebagai nomor unik yang bisa digunakan untuk melacak proses pengiriman. Selain melacak posisi barang terkini, nomor resi juga akan memberikan estimasi waktu barang akan sampai di tempat tujuan.</p>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</section>
          </div>
        </div>

        <!-- Card -->
        <div class="card">
            <section>
              
  <h1 style="text-align: center;"><br><br>Berita terkini</h1>
        <h5 class="mb-1"><a href="#"><a href="https://ekbis.sindonews.com/read/625221/34/pasar-lantai-vinyl-dibanjiri-banyak-merek-produk-bersertifikat-juaranya-1639199541"><br>Pasar Lantai Vinyl Dibanjiri Banyak Merek, Produk Bersertifikat Juaranya.</a></h5>
        <p>IsiBangunan.com sebagai suplier dan distributor resmi JT Vinyl menghadirkan beberapa varian produk berkualitas, yakni lantai vinyl plank, lantai vinyl roll, lantai SPC, lantai vinyl rumah sakit (anti bacterial), dan lantai vinyl stiker.</p>
      
        <h5 class="mb-1"><a href="#"><a href="https://www.kompas.com/wiken/read/2021/12/26/193700881/bata-merah-dan-bata-ringan-mana-yang-lebih-baik-dijadikan-bahan-bangunan-"><br>Bata Merah dan Bata Ringan, Mana yang Lebih Baik Dijadikan Bahan Bangunan?</a></h5>
        <p>Batu bata merupakan material konstruksi yang sering digunakan sebagai bahan bangunan untuk membangun rumah. Karena itu, pemilihan jenis batu bata haruslah tepat agar rumah dapat berdiri kokoh. Terdapat banyak jenis batu bata, yang paling umum dan sering digunakan adalah batu bata merah yang terbuat dari tanah liat.</p>

        <h5 class="mb-1"><a href="#"><a href="https://www.kompas.com/homey/read/2021/10/11/165600176/simak-panduan-dan-tips-memilih-semen-berkualitas"><br>Simak, Panduan dan Tips Memilih Semen Berkualitas</a></h5>
        <p>Semen merupakan salah satu material penting yang digunakan untuk merekatkan batu, bata, batako, keramik, dan bahan bangunan lainnya. Agar bangunan yang dibuat bisa kokoh, pastikan untuk menggunakan semen yang berkualitas.</p>

        <h5 class="mb-1"><a href="#"><a href="https://www.kompas.com/properti/read/2021/09/25/080000321/peran-material-bangunan-pada-era-arsitektur-digital-i-"><br>Peran Material Bangunan pada Era Arsitektur Digital (I)</a></h5>
        <p>Desain arsitektur berkembang seiring dengan kemajuan teknologi yang semakin canggih. Software komputer sangat berperan dalam penyelesaian desain bangunan. Bentuk yang semakin dinamis dari hasil olah digital ini perlu diimbangi teknologi bahan bangunan yang adaptif terhadap tuntutan desain modern.</p>
        
        <h5 class="mb-1"><a href="#"><a href="https://www.kompas.com/properti/read/2021/09/13/190000821/cermati-harga-bahan-bangunan-terbaru"><br>Cermati Harga Bahan Bangunan Terbaru</a></h5>
        <p>Sebelum membangun atau merenovasi rumah, Anda harus tahu harga bahan bangunan terbaru. Jangan sampai, biaya yang keluar terlampau besar dan tak sesuai dengan anggaran. Perencanaan yang matang dalam menentukan anggaran untuk membangun rumah sangat penting dilakukan. Penting diketahui harga bahan bangunan terbaru mulai dari pasir, cat, paralon maupun semen. Terlebih, jika Anda tak menggunakan jasa kontraktor atau mandor bangunan.</p>
    </div>
          </div>
          <div class="card-block">
            <div id="donut2" style="height:200px"></div>
          </div>
        </div>
        </section>
      </div>
      <!-- // END Card Group -->
    </div>
  </div>
  <div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" id="edit-user">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title">Edit Profile</h5>
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
  {{-- <script src="{{ asset('/vendor/morris.min.js"></script> --}}

  <!-- Initialize Charts -->
  {{-- <script src="{{ examp('es/js/chart.js"></script> --}}

</body>

</html>
