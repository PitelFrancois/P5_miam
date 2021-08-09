<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Foodeiblog Template">
        <meta name="keywords" content="Foodeiblog, unica, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.tiny.cloud/1/0kjpsklubif6q97uhvtdavbb4630ngeps4gc82f4o2q46iom/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <title><?= $title; ?></title>

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900&display=swap"
            rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Unna:400,700&display=swap" rel="stylesheet">

        <!-- Css Styles -->
        <link rel="stylesheet" href="/Public/Frontend/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="/Public/Frontend/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="/Public/Frontend/css/elegant-icons.css" type="text/css">
        <link rel="stylesheet" href="/Public/Frontend/css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="/Public/Frontend/css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="/Public/Frontend/css/style.css" type="text/css">
    </head>
    <body>
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>
        <?php require_once "header.php"; ?>
        <?= $content; ?>
        <?php if(isset($_COOKIE['accept_cookie'])) {
        $showcookie = false;
        } else {
        $showcookie = true;
        } ?>
        <?php require_once "footer.php"; ?>
        <script>tinymce.init({
            selector: '#mytextarea',
            toolbar_mode: 'floating'
        });
        </script>
        <script src="https://kit.fontawesome.com/0d1298be20.js" crossorigin="anonymous"></script>
        <!-- Ajax -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Js Plugins -->
        <script src="/Public/Frontend/js/jquery-3.3.1.min.js"></script>
        <script src="/Public/Frontend/js/bootstrap.min.js"></script>
        <script src="/Public/Frontend/js/jquery.slicknav.js"></script>
        <script src="/Public/Frontend/js/owl.carousel.min.js"></script>
        <script src="/Public/Frontend/js/main.js"></script>
        <script src="/Public/Frontend/js/inputValidation.js"></script>
        <script src="/Public/Frontend/js/Close.js"></script>
    </body>
</html>