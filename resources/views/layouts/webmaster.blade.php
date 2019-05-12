<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin LandMark 98</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/jqvmap/dist/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/VH.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/VH.css')}}" rel='stylesheet' >

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{asset('images/logo.png')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{asset('images/logo2.png')}}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu ">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{url('admin')}}"> <i class="menu-icon fa fa-home"></i>admin</a>
                    </li>
                    <h3 class="menu-title">Bảng</h3><!-- /.menu-title -->
                    @if((session('admin')->role & 8) != 0)
                    <li>
                        <a href="{{ url('admin/topic') }}"> <i class="menu-icon fa fa-pencil"></i>Bài viết</a>
                    </li>
                    @endif
                    @if((session('admin')->role & 8) != 0)
                    <li>
                        <a href="{{ url('admin/comment') }}"> <i class="menu-icon fa fa-th-list"></i>Bình luận</a>
                    </li>
                    @endif
                    @if((session('admin')->role & 16) != 0)
                    <li>
                        <a href="{{ url('admin/advertise') }}" > <i class="menu-icon fa fa-camera"></i>Quảng Cáo</a>
                    </li>
                    @endif
                    @if((session('admin')->role & 32) != 0)
                    <li>
                        <a href="{{ url('admin/notification') }}"> <i class="menu-icon fa fa-bell"></i>Thông Báo</a>
                    </li>
                    @endif
                    @if((session('admin')->role & 64) != 0)
                    <li>
                        <a href="{{ url('admin/phanquyen') }}"> <i class="menu-icon fa fa-user"></i>Phân Quyền</a>
                    </li>
                    @endif
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{url(session('admin')->customer->image)}}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Trang cá nhân</a>

                            <a class="nav-link" href="{{url('admin/logout')}}"><i class="fa fa-power-off"></i> Đăng xuất</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dữ liệu</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dữ liệu</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @yield('Container')
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="{{ asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>


    <script src="{{ asset('vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/dashboard.js')}}"></script>
    <script src="{{ asset('assets/js/widgets.js')}}"></script>
    <script src="{{ asset('js/landmark.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/webmaster.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.js')}}" type="text/javascript"></script>
    <script src="{{ asset('vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{ asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('assets/js/init-scripts/data-table/datatables-init.js')}}"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
