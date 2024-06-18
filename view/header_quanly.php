<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--STYLESHEET-->
    <!--=================================================-->
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="assets/backend/css/bootstrap.min.css" rel="stylesheet">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <title><?php echo isset($title) ? $title : 'Quản Lý - Thiên Trường PC'; ?></title>


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="assets/backend/css/nifty.min.css" rel="stylesheet">
    <!--Nifty Ocean Stylesheet [ REQUIRED ]-->
    <link href="assets/backend/css/themes/nifty.min.css" rel="stylesheet">

    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="assets/backend/css/demo/nifty-demo-icons.min.css" rel="stylesheet">
    
    <!--Morris.js [ OPTIONAL ]-->
    <link href="assets/backend/plugins/morris-js/morris.min.css" rel="stylesheet">


    <!--Magic Checkbox [ OPTIONAL ]-->
    <link href="assets/backend/plugins/magic-check/css/magic-check.min.css" rel="stylesheet">

    <!--Summernote [ OPTIONAL ]-->
    <link href="assets/backend/plugins/summernote/summernote.min.css" rel="stylesheet">

    <!--DataTables [ OPTIONAL ]-->
    <link href="assets/backend/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="assets/backend/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css" rel="stylesheet">
    <!--Select2 [ OPTIONAL ]-->
    <link href="assets/backend/plugins/select2/css/select2.min.css" rel="stylesheet">
    <style>
        body {
            color: #000;
        }

        .imgwrap {
            position: relative;
        }

        .imgwrap a {
            position: absolute;
            right: 5%;
            color: red;
            font-size: 20px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.css">

    
    <!--JAVASCRIPT-->
    <!--=================================================-->


    <!--jQuery [ REQUIRED ]-->
    <script src="assets/backend/js/jquery.min.js"></script>

    <!--Select2 [ OPTIONAL ]-->
    <script src="assets/backend/plugins/select2/js/select2.min.js"></script>
    
    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="assets/backend/js/bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="assets/backend/js/nifty.min.js"></script>


     <!--FooTable [ OPTIONAL ]-->
    <link href="assets/backend/plugins/fooTable/css/footable.core.css" rel="stylesheet">

    <!--FooTable [ OPTIONAL ]-->
    <script src="assets/backend/plugins/fooTable/dist/footable.all.min.js"></script>



    <!--=================================================-->

    
    <!--Morris.js [ OPTIONAL ]-->
    <script src="assets/backend/plugins/morris-js/morris.min.js"></script>
    <script src="assets/backend/plugins/morris-js/raphael-js/raphael.min.js"></script>


    <!--Sparkline [ OPTIONAL ]-->
    <script src="assets/backend/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!--Summernote [ OPTIONAL ]-->
    <script src="assets/backend/plugins/summernote/summernote.min.js"></script>

    <!--DataTables [ OPTIONAL ]-->
    <script src="assets/backend/plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script src="assets/backend/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
    <script src="assets/backend/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>

    <!-- Custom Javascript -->
    <script src="assets/backend/js/custom.js"></script>    

</head>

<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        
        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">
                        <div class="brand-title">
                            <span class="brand-text">QUẢN LÝ</span>
                        </div>
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->


                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content clearfix">
                    <ul class="nav navbar-top-links pull-left">

                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="fas fa-bars"></i>
                            </a>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Navigation toogle button-->
                        
                    </ul>
                    <ul class="nav navbar-top-links pull-right">
                        <!--User dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li id="dropdown-user" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="ic-user pull-right">
                                    <img class="img-circle img-user media-object" src="assets/img/avatar2.png" alt="Ảnh Đại Diện">
                                </span>
                                <div class="username hidden-xs"><?php echo $_SESSION['nmb_userdata']['username'] ?></div>
                            </a>


                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">


                                <!-- User dropdown menu -->
                                <ul class="head-list">
                                    <li>
                                        <a href="user.php?task=setting"><i class="fas fa-users-cog"></i> Thiết lập cá nhân</a>
                                    </li>
                                </ul>

                                <!-- Dropdown footer -->
                                <div class="pad-all text-right">
                                    <a onsubmit="return confirm('Bạn có thực sự muốn đăng xuất?')" href="user.php?task=logout" class="btn btn-primary">
                                        <i class="fas fa-sign-out-alt"></i> Đăng xuất
                                    </a>
                                </div>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End user dropdown-->
                    </ul>
                </div>
                <!--================================-->
                <!--End Navbar Dropdown-->

            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->