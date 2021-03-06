@if(Session::get('login')!=true)
  <script>window.location = "/admin/login";</script>
@endif
<!doctype html>

 <html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adimn Panel</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{asset('bhind/assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('bhind/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bhind/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('bhind/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('bhind/assets/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('bhind/assets/css/cs-skin-elastic.css')}}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{asset('bhind/assets/scss/style.css')}}">
    <link rel="stylesheet" href="{{asset('bhind/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
    <link href="{{asset('bhind/assets/css/lib/vector-map/jqvmap.min.css')}}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->


</head>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a> -->
               <!--  <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a> -->
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Sidebar</h3><!-- /.menu-title -->
                    <!-- <li class="menu-item-has-children"><a class="nav-link" href="union.php"><i class="fa fa-id-badge"></i> Union</a></li> -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user"></i> <span> Category </span></a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-id-badge"></i><a href="{{route('addcategory')}}">Add Category</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{route('categorylist')}}">Category List</a></li>
                            
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user"></i> <span> Brand </span></a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-id-badge"></i><a href="{{route('addbrand')}}">Add brand</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{route('brandlist')}}">Brand List</a></li>
                            
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user"></i> <span> Product </span></a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-id-badge"></i><a href="{{route('productlist')}}">Add product</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{route('productlist')}}">Product List</a></li>
                            
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user"></i> <span> Slider </span></a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-id-badge"></i><a href="{{route('addslider')}}">Add slider</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{route('sliderlist')}}">Slider List</a></li>
                            
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user"></i> <span> Admin </span></a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-id-badge"></i><a href="{{route('addadmin')}}">Add admin</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{route('adminlist')}}">Admin list</a></li>
                            
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('manage_order')}}" class="nav-link" > <i class="fa fa-user"></i> <span> Manage Order </span></a>
                    </li>
                    
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
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{URL::to('uploads/'.Session::get('image'))}}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                                <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                                <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                                <a class="nav-link" href="{{route('logout')}}"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->
       
        @yield('content')
        
    <script src="{{asset('bhind/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{asset('bhind/assets/js/plugins.js')}}"></script>
    <script src="{{asset('bhind/assets/js/main.js')}}"></script>
    <script src="{{asset('bhind/assets/js/lib/chart-js/Chart.bundle.js')}}"></script>
    <script src="{{asset('bhind/assets/js/dashboard.js')}}"></script>
    <script src="{{asset('bhind/assets/js/widgets.js')}}"></script>
    <script src="{{asset('bhind/assets/js/lib/vector-map/jquery.vmap.js')}}"></script>
    <script src="{{asset('bhind/assets/js/lib/vector-map/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('bhind/assets/js/lib/vector-map/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('bhind/assets/js/lib/vector-map/country/jquery.vmap.world.js')}}"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>
    <script src="{{asset('bhind/assets/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('bhind/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('bhind/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('bhind/assets/js/lib/data-table/datatables-init.js')}}"></script>
    <script src="{{asset('bhind/assets/js/jquery.printPage.js')}}"></script>
    


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table').DataTable();
        } );
    </script>

    <script type="text/javascript">

         $(document).ready(function(){

                  $('.btnprn').printPage();

         });

    </script>
    
</body>
</html>
