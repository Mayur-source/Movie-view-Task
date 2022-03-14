<?php
session_start();

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
            position: relative;
            height: 209px;
            width: 350px;
            display: inline-flex;
            margin: 10px;
        }
        .image_view {
            vertical-align: super;
            width: 100%;
            object-fit: fill;
            height: -webkit-fill-available;
        }
        .img_desc {
            position: absolute;
            top: auto;
            bottom: 0;
            left: auto;
            right: 0;
            text-align: end;
            background: rgb(0 0 0 / 52%);
            color: #fff;
            padding-right: 5px;
            transition: opacity .2s, visibility .2s;
        }
        .title {
            font-size: large;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header id="masthead" class="site-header">
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
                        <li class="page-scroll"><a href="#about">Movies</a></li>
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
        <section class="site-section section-about text-center" id="about">
            <div class="container">
                <h2>Explore Movies</h2>
                <!-- <h4 class="heading-style">Filter</h4> -->
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group form_margin">
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <label class="label-control" for="genre">Genre : </label>
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-9">
                                <select name="genre" id="genre" onchange="getGenreOnchange(this)" class="form-control">
                                    <?php
                                        require 'connect.php';

                                        $data = $conn->prepare("SELECT * FROM category where type='genre' ");
                                        $data->execute();
                                        $data->setFetchMode(PDO::FETCH_ASSOC);
                                        if($data->rowCount()>0){
                                            echo '<option value="">All</option>';
                                            foreach (($data->fetchAll()) as $key => $row) {
                                                echo '<option value="'.$row['id'].'">'.$row['value'].'</option>';
                                            }
                                        }else{
                                            echo '<option value=""> No option Avaiable </option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form_margin">
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <label class="label-control" for="language">Language : </label>
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-9">
                                <select name="language" id="language" onchange="getLanguageOnchange(this)" class="form-control">
                                    <?php
                                        $data = $conn->prepare("SELECT * FROM category where type='language' ");
                                        $data->execute();
                                        $data->setFetchMode(PDO::FETCH_ASSOC);
                                        if($data->rowCount()>0){
                                            echo '<option value="">All</option>';
                                            foreach (($data->fetchAll()) as $key => $row) {
                                                echo '<option value="'.$row['id'].'">'.$row['value'].'</option>';
                                            }
                                        }else{
                                            echo '<option value=""> No option Avaiable </option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group form_margin">
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <label class="label-control" for="sort">Sort By : </label>
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-9">
                                <select name="" id="sort" onchange="getSortByOnchange(this)"  class="form-control">
                                    <option value="1">Length </option>
                                    <option value="2">Release Date(New First)</option>
                                    <option value="3">Release Date(Old First)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                   <div class="preview_data"></div>
                </div>
            </div>
        </section><!-- /.section-about -->
        <!-- End Movie section -->

    </main><!-- /#main -->
    <!-- End Main content -->

    <!-- Footer --> 
    <footer id="colophon" class="site-footer">
        <div class="container-fluid">
            <div class="page-scroll">
                <a href="#top" class="rectangle">
                    <i class="fa fa-angle-double-up"></i>
                </a>
            </div>
        </div>
        <div class="container text-center">
            <p class="copyright">&copy; <a href="#" target="_blank">Movie</a> - 2022</p>
        </div>
    </footer>

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
        var sortBy = 1;

        sessionStorage.setItem("genre","");
        sessionStorage.setItem("language","");
        sessionStorage.setItem("sortBy",sortBy);

        getMovies();

        function getGenreOnchange(e) {
            genre = e.value;
            sessionStorage.setItem("genre",genre);

            $("#language").val("");
            language = "";

            getMovies();
        }
        function getLanguageOnchange(e) {
            language = e.value;
            sessionStorage.setItem("language",language);
            
            $("#genre").val("");
            genre = "";
            
            getMovies();
        }
        function getSortByOnchange(e) {
            sortBy = e.value;
            sessionStorage.setItem("sortBy",sortBy);
            getMovies();
        }
        function getMovies(){
            $.ajax({
                type:'POST',
                url:'data/movie_data',
                data: "genre="+genre+"&language="+language+"&sortBy="+sortBy,
                success:function (e) {
                    $('.preview_data').html(e);
                },
                error: function(err){
                    console.log(err);
                },
            });
        }

        $(function(){
            genre = sessionStorage.genre;
            language = sessionStorage.language;
            sortBy = sessionStorage.sortBy;

            $("#genre").val(genre);
            $("#language").val(language);
            $("#sortBy").val(sortBy);

            getMovies();

        });

    </script>
</body>
</html>