<?php
    require '../connect.php';
    
    $lang_data_id = $_POST['genre'];
    $genre_data_id = $_POST['language'];
    $sort_by_id = $_POST['sortBy'];   // 1 length ,. 2 release date

    // sort data
    if ( $sort_by_id == 1 ) {
        $data = $conn->prepare("SELECT * FROM movies ORDER BY length ASC ");
    } else if ( $sort_by_id == 2 ) {
        $data = $conn->prepare("SELECT * FROM movies ORDER BY release_date DESC ");
    } else if ( $sort_by_id == 3 ) {
        $data = $conn->prepare("SELECT * FROM movies ORDER BY release_date ASC ");
    } else {
        $data = $conn->prepare("SELECT * FROM movies ");
    }
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    if($data->rowCount()>0){
        // image preview
        foreach (($data->fetchAll()) as $key => $row) {
            $movie_id = $row['id'];

            $string = strip_tags($row['description']);
            if (strlen($string) > 40) {
                $stringCut = substr($string, 0, 40);
                $endPoint = strrpos($stringCut, ' ');
                //if the string doesn't contain any space then it will cut without word basis.
                $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                $string .= '... ';// '<a href="/this/story">Read More</a>';
            }

            if ( $genre_data_id || $lang_data_id ) {
                $cat = $genre_data_id ? $genre_data_id : $lang_data_id;
                
                $movie_rel = $conn->prepare("SELECT * FROM movies_to_category WHERE movie_id='".$movie_id."' AND category_id='".$cat."' ");
                $movie_rel->execute();
                $movie_rel->setFetchMode(PDO::FETCH_ASSOC);
                if($movie_rel->rowCount()>0){
                    foreach (($movie_rel->fetchAll()) as $key => $rel) {
                        echo '<a class="view-item" href="details?kkdfgrtw='.$movie_id.'">
                            <div class="img_wrap">
                                <img src="'.$row['image'].'" class="image_view">
                                <p class="img_desc">
                                    <span class="title" >'.$row['title'].'</span></br>
                                '.$string.'</p>
                            </div>
                        </a>';
                    }
                }
            } else {
                echo '<a class="view-item" href="details?kkdfgrtw='.$movie_id.'">
                    <div class="img_wrap">
                        <img src="'.$row['image'].'" class="image_view">
                        <p class="img_desc">
                            <span class="title" >'.$row['title'].'</span></br>
                        '.$string.'</p>
                    </div>
                </a>';
            }

        }
    }
?>