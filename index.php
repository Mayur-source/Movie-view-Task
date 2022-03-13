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
    <script src=
    "https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" />
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
                        <li class="page-scroll"><a href="#intro">Home</a></li>
                        <li class="page-scroll"><a href="movies.php">Movies</a></li>
                    </ul><!-- /.navbar-nav -->
                </div><!-- /.navbar-collapse -->
            </div>
        </nav><!-- /.primary-navigation -->
    </header><!-- /#header -->
    <div id="top"></div>

    <!-- End Header -->

    <!-- Main content -->
    <main id="main" class="site-main">


        
        <!-- Hello section -->
		<section class="site-section section-hello" id="intro">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
                        <table id="moviesTable" class="table table-bordered table-striped dt-responsive nowrap w-100 table_css" style="text-align:center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Language</th>
                                    <th>Genre</th>
                                    <th>Description</th>
                                    <th>Release Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    require 'connect.php';

                                    $data = $conn->prepare("SELECT * FROM movies ORDER BY id DESC");
                                    $data->execute();
                                    // set the resulting array to associative
                                    $data->setFetchMode(PDO::FETCH_ASSOC);
                                    if($data->rowCount()>0){
                                        foreach (($data->fetchAll()) as $keycount => $row) {
                                            $string = strip_tags($row['description']);
                                            if (strlen($string) > 70) {
                                                $stringCut = substr($string, 0, 70);
                                                $endPoint = strrpos($stringCut, ' ');
                                                //if the string doesn't contain any space then it will cut without word basis.
                                                $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                $string .= '... ';// '<a href="/this/story">Read More</a>';
                                            }

                                            $lang = '';
                                            $genre = '';

                                            // Get relation
                                            $movie_rel = $conn->prepare("SELECT * FROM movies_to_category WHERE movie_id='".$row['id']."' ");
                                            $movie_rel->execute();
                                            $movie_rel->setFetchMode(PDO::FETCH_ASSOC);
                                            if($movie_rel->rowCount()>0){
                                                foreach (($movie_rel->fetchAll()) as $key => $rel) {
                                                    // get Categories
                                                    $categories = $conn->prepare("SELECT * FROM category WHERE id='".$rel['category_id']."' ");
                                                    $categories->execute();
                                                    $categories->setFetchMode(PDO::FETCH_ASSOC);
                                                    if($categories->rowCount()>0){
                                                        $cat = $categories->fetch();
                                                        if ( $cat['type'] == 'language' ) {
                                                            $lang = $cat['value'];
                                                        } else if ( $cat['type'] == 'genre' ) {
                                                            $genre = $cat['value'];
                                                        }
                                                    }
                                                }
                                            }

                                            echo '<tr>
                                                <td>'.++$keycount.'</td>
                                                <td>'.$row['title'].'</td>
                                                <td>'.$lang.'</td>
                                                <td>'.$genre.'</td>
                                                <td>'.$string.'</td>
                                                <td>'.date("d-M-Y", strtotime($row['release_date'])).'</td>
                                            </tr>';
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
					</div>
				</div>
			</div>
		</section>
        <!-- End Hello section -->






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
    </footer><!-- /#footer -->
    <!-- End Footer --> 

    <!-- Bootstrap core JavaScript
    ================================================== -->
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


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script> -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#moviesTable").DataTable();
        });
    </script>
</body>
</html>