<?php
    require '../connect.php';
    
    $lang_data_id = $_POST['genre'];
    $genre_data_id = $_POST['language'];
    $sort_by_id = $_POST['sortBy'];   // 1 length ,. 2 release date

    // sort data
    if ( $sort_by_id == 1 ) {
        $data = $conn->prepare("SELECT * FROM movies ORDER BY length ASC");
    } else if ( $sort_by_id == 2 ) {
        $data = $conn->prepare("SELECT * FROM movies ORDER BY release_date ASC");
    } else {
        $data = $conn->prepare("SELECT * FROM movies");
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


            // if ( $genre_data_id && $lang_data_id ) {
                // $lang_id = "";
                // $genre_id = "";
                // // is language
                // if ( $lang_data_id ) {
                //     $lang = $conn->prepare("SELECT * FROM movies_to_category WHERE movie_id='".$movie_id."' AND category_id = '".$lang_data_id."' ");
                //     $lang->execute();
                //     $lang->setFetchMode(PDO::FETCH_ASSOC);
                //     if($lang->rowCount()>0){
                //         $langs = $lang->fetch();
                //         $lang_id = $langs['movie_id'];
                //     }
                // }
                // // is Genre
                // if ( $genre_data_id ) {
                //     $genre = $conn->prepare("SELECT * FROM movies_to_category WHERE movie_id='".$movie_id."' AND category_id = '".$genre_data_id."' ");
                //     $genre->execute();
                //     $genre->setFetchMode(PDO::FETCH_ASSOC);
                //     if($genre->rowCount()>0){
                //         $genres = $genre->fetch();
                //         $genre_id = $genres['movie_id'];
                //     }
                // }
                // echo  ' $lang_id '.$lang_id .', $genre_id---'. $genre_id ;
                // // get reletion
                // // if ( $lang_id == $genre_id ) {

                //     $movie_rel = $genre;
                // // } else {                                        
                    // $movie_rel = $conn->prepare("SELECT * FROM movies_to_category WHERE movie_id='".$movie_id."' AND category_id IN ( '".$lang_data_id."','".$genre_data_id."' )");
                // }
            // } else
            if ( $genre_data_id || $lang_data_id ) {
                $cat = $genre_data_id ? $genre_data_id : $lang_data_id;
                
                $movie_rel = $conn->prepare("SELECT * FROM movies_to_category WHERE movie_id='".$movie_id."' AND category_id='".$cat."' ");
                $movie_rel->execute();
                $movie_rel->setFetchMode(PDO::FETCH_ASSOC);
                if($movie_rel->rowCount()>0){
                    foreach (($movie_rel->fetchAll()) as $key => $rel) {
                        echo '<a href="#" onclick="viewDetailsOnclick('.$movie_id.')">
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
                echo '<a href="#" onclick="viewDetailsOnclick('.$movie_id.')">
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