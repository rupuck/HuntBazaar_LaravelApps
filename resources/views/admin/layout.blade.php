<!DOCTYPE html>


<html class="no-js " lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>Huntstreet | Admin</title>
    <link rel="manifest" href="/pub/admin/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/pub/admin/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" href="/pub/admin/favicon.ico" type="image/x-icon">
    <!-- Favicon-->
    <link rel="stylesheet" href="/pub/admin/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Custom Css -->
    <link rel="stylesheet" href="/pub/admin/css/main.css">
    <link rel="stylesheet" href="/pub/admin/css/color_skins.css">
    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="/pub/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css">


</head>
<body class="theme-orange">
<div class="page-loader-wrapper">
    <div class="loader">        
        <div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
        <p>Please wait...</p>
        <div class="m-t-30"><img src="/pub/admin/images/logo.svg" width="48" height="48" alt="HuntStreet"></div>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div><!-- Search  -->
<div class="search-bar">
    <div class="search-icon"> <i class="material-icons">search</i> </div>
    <input type="text" placeholder="Explore HuntStreet...">
    <div class="close-search"> <i class="material-icons">close</i> </div>
</div>

<!-- Top Bar -->
<nav class="navbar">
    <div class="col-12">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="index.html">HuntStreet</a>
        </div>

        <ul class="nav navbar-nav navbar-left">
            <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a></li>
            

        </ul>
        <ul class="nav navbar-nav navbar-right">            
            <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="zmdi zmdi-search"></i></a></li>
          
         
            <li><a href="/admin/logout" class="mega-menu xs-hide" data-close="true"><i class="zmdi zmdi-power"></i></a></li>
        </ul>
    </div>
</nav>
<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar"> 
    <!-- User Info -->
    <div class="user-info">
        <div class="image"> <img src="/pub/admin/images/xs/huntstreet.jpg" width="48" height="48" alt="User" /> </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">{{ Session::get('adminName') }}</div>
            <div class="email">Administrator</div>
           
        </div>
    </div>
    <!-- #User Info --> 
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="/admin/"><i class="zmdi zmdi-assignment"></i><span>Invitations</span> </a></li>
            <li><a href="/admin/response"><i class="zmdi zmdi-assignment"></i><span>Responses</span> </a></li>

            <!-- <li><a href="/admin/riwayat"><i class="zmdi zmdi-email"></i><span>Riwayat Approval</span> </a></li>
            -->
        </ul>
    </div>
    <!-- #Menu --> 
</aside>

<!-- Right Sidebar -->


<section class="content">
   <div class="block-header">
   @yield('content') 
    </div>   
</section>


@yield("footer")
<input type="hidden" id="csrf_token" value="{{ csrf_token() }}">


<!-- Jquery Core Js --> 
<script src="/pub/admin/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="/pub/admin/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 


<!-- Jquery DataTable Plugin Js --> 
<script src="/pub/admin/bundles/datatablescripts.bundle.js"></script>
<script src="/pub/admin/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="/pub/admin/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="/pub/admin/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="/pub/admin/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
<script src="/pub/admin/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="/pub/admin/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>



<script src="/pub/admin/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 
<script src="/pub/admin/js/pages/tables/jquery-datatable.js"></script>
<script>
    function includeCSRF() {
        var send = XMLHttpRequest.prototype.send,
            token = $('#csrf_token').val();
        XMLHttpRequest.prototype.send = function(data) {
            this.setRequestHeader('X-CSRF-Token', token);
            return send.apply(this, arguments);
        };
    }

    includeCSRF()
</script>

@yield('scripts')
</body>
</html>
