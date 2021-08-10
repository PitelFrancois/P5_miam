<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title><?= $title; ?></title>
        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <!-- Bootstrap Core Css -->
        <link href="/Backend/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- Waves Effect Css -->
        <link href="/Backend/plugins/node-waves/waves.css" rel="stylesheet" />
        <!-- Animation Css -->
        <link href="/Backend/plugins/animate-css/animate.css" rel="stylesheet" />
        <!-- Morris Chart Css-->
        <link href="/Backend/plugins/morrisjs/morris.css" rel="stylesheet" />
        <!-- Custom Css -->
        <link href="/Backend/css/style.css" rel="stylesheet">
        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="/Backend/css/themes/all-themes.css" rel="stylesheet" />
        <!-- Style -->
        <link rel="stylesheet" href="/Frontend/css/font-awesome.min.css" type="text/css">
    </head>
    <body class="theme-red">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- Search Bar -->
        <div class="search-bar">
            <div class="search-icon">
                <i class="material-icons">search</i>
            </div>
            <input type="text" placeholder="START TYPING...">
            <div class="close-search">
                <i class="material-icons">close</i>
            </div>
        </div>
        <!-- Top Bar -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand" href="/dashboard">Miam dashboard</a>
                </div>
            </div>
        </nav>
        <section>
            <!-- Left Sidebar -->
            <aside id="leftsidebar" class="sidebar">
                <!-- Menu -->
                <div class="menu">
                    <ul class="list">
                        <li class="active">
                            <a href="/">
                                <i class="material-icons">home</i>
                                <span>Home</span>
                            </a>
                            <a href="/dashboard">
                                <i class="material-icons">widgets</i>
                                <span>Dashboard</span>
                            </a>
                            <a href="/dashboard/user">
                                <i class="material-icons">person_add</i>
                                <span>Utilisateurs</span>
                            </a>
                            <a href="/dashboard/recipe">
                                <i class="material-icons">playlist_add_check</i>
                                <span>Recettes</span>
                            </a>
                            <a href="/dashboard/comment">
                                <i class="material-icons">forum</i>
                                <span>Commentaires</span>
                            </a>
                            <a href="/dashboard/ingredient">
                                <i class="material-icons">view_list</i>
                                <span>Ingrédients</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Footer -->
                <div class="legal">
                    <div class="copyright">
                        <p>Miam</p>
                    </div>
                </div>
            </aside>
        </section>

        <section class="content">
            <div class="container-fluid">
                <?= $content;?>
            </div>
        </section>

        <!-- Jquery Core Js -->
        <script src="/Backend/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap Core Js -->
        <script src="/Backend/plugins/bootstrap/js/bootstrap.js"></script>
        <!-- Select Plugin Js -->
        <script src="/Backend/plugins/bootstrap-select/js/bootstrap-select.js"></script>
        <!-- Slimscroll Plugin Js -->
        <script src="/Backend/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
        <!-- Waves Effect Plugin Js -->
        <script src="/Backend/plugins/node-waves/waves.js"></script>
        <!-- Jquery CountTo Plugin Js -->
        <script src="/Backend/plugins/jquery-countto/jquery.countTo.js"></script>
        <!-- Morris Plugin Js -->
        <script src="/Backend/plugins/raphael/raphael.min.js"></script>
        <script src="/Backend/plugins/morrisjs/morris.js"></script>
        <!-- ChartJs -->
        <script src="/Backend/plugins/chartjs/Chart.bundle.js"></script>
        <!-- Custom Js -->
        <script src="/Backend/js/admin.js"></script>
        <!-- Font awesome -->
        <script src="https://kit.fontawesome.com/0d1298be20.js" crossorigin="anonymous"></script>
    </body>
</html>