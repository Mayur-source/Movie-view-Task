<?php
session_start();

$id = $_GET['kkdfgrtw'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Watch Movies</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Varela" rel="stylesheet">

    <!-- Favicon
    ================================================== -->
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="icon" sizes="16x16" href="assets/img/favicon.ico">
    <link rel="manifest" href="assets/img/manifest.json">
    <link rel="mask-icon" href="assets/img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <!-- Stylesheets
    ================================================== -->
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <!-- Font Awesome core CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        /* Image view */
        .img_wrap {
            position: initial;
        }
        .image_view {
            width: 78%;
        }
        .img_desc {
            position: absolute;
            top: auto;
            bottom: 0;
            left: auto;
            right: 0;
            text-align: end;
            font-size: 18px;
            background: rgb(0 0 0 / 52%);
            color: #fff;
            padding-right: 5px;
            transition: opacity .2s, visibility .2s;
        }
        .title {
            font-size: 25px;
        }
        .bg {
            background-color: black;
        }
        .icon_button {
            position: absolute;
            top: 250px;
            bottom: auto;
            color: #fff;
            font-size: 55px;
        }
        .left {
            left: 25px;
            right: auto;
        }
        .right {
            left: auto;
            right: 5px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header id="masthead" class="">
        <nav id="primary-navigation" class="site-navigation" data-spy="affix">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#portfolio-perfect-collapse" aria-expanded="false" >
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Name -->
                    <div class="page-scroll site-logo">
                        <a href="">Movie</a>
                    </div>
                </div><!-- /.navbar-header -->
                <div class="main-menu collapse navbar-collapse" id="portfolio-perfect-collapse">
                    <!-- Navigation -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="page-scroll"><a href="index">Home</a></li>
                        <li class="page-scroll"><a href="movies">Movies</a></li>
                    </ul><!-- /.navbar-nav -->
                </div><!-- /.navbar-collapse -->
            </div>
        </nav><!-- /.primary-navigation -->
    </header><!-- /#header -->
    <div id="top"></div>
    <!-- End Header -->

    <!-- Main content -->
    <main id="main" class="site-main">
        <!-- Movie section -->
        <section class="text-center" id="about">
            <div class="">
                <div class="row bg">
                    <?php
                        require 'connect.php';;
                        $data = $conn->prepare("SELECT * FROM movies WHERE id='".$id."' ");
                        $data->execute();
                        $data->setFetchMode(PDO::FETCH_ASSOC);
                        $row = $data->fetch();

                        echo '<div class="img_wrap">
                                <img src="'.$row['image'].'" class="image_view">
                                <p class="img_desc">
                                    <span class="title" >'.$row['title'].'</span></br>
                                '.$row['description'].'</p>
                                <a onclick="gotoNext(false)" class="icon_button left"> < </a>
                                <a onclick="gotoNext(true)" class="icon_button right"> > </a>
                            </div>';

                    ?>
                </div>
            </div>
        </section><!-- /.section-about -->
        <!-- End Movie section -->

    </main><!-- /#main -->
    <!-- End Main content -->


    <!-- Bootstrap core JavaScript================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery core js | Do not Delete -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap core js | Do not Delete -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Bootstrap progressbar JS -->
    <script src="assets/js/bootstrap-progressbar.min.js"></script>
    <!-- Count To JS -->
    <script src="assets/js/jquery.countTo.min.js"></script>
    <!-- Easing JS -->
    <script src="assets/js/jquery.easing.min.js"></script>
    <!-- Shuffle JS -->
    <script src="assets/js/jquery.shuffle.min.js"></script>
    <!-- Slick Carousel JS -->
    <script src="assets/js/slick.min.js"></script>
    <!-- Touchswipe JS -->
    <script src="assets/js/touchswipe.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

    <script>
        var genre = "";
        var language = "";
        var sortBy = "";

        function getMovies(){
            $.ajax({
                type:'POST',
                url:'data/movie_details_data',
                data: "genre="+genre+"&language="+language+"&sortBy="+sortBy,
                success:function (e) {
                    $('.preview_data').html(e);
                },
                error: function(err){
                    console.log(err);
                },
            });
        }

        $(function() {
            var id = <?php echo $id; ?>;
            console.log('value'+value);
            console.log('id'+id);
        });

        // movie detials
        function gotoNext(value) {
            var id = <?php echo $id; ?>;
            var movie_id;
            if ( value ) {                
                if ( id == 11 ) {
                    movie_id = id + 2;
                } else {
                    movie_id = id + 1;
                }
            } else {
                if ( id == 13 ) {
                    movie_id = id - 2;
                } else {
                    movie_id = id - 1;                
                }
            }
            location.href = "details?kkdfgrtw="+movie_id;
        }
            
    </script>
</body>
</html>