<?php include "include/begin.php"; ?>
<div class="gallery">
<?php 
    $dbName = "gtamas";
    $dbUser = "root";
    $dbPass = "mysql";

    $dsn = "mysql:host=localhost;dbname=". $dbName .";charset=utf8mb4";
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    
    $sql = "SELECT * FROM gallery ORDER BY RAND()";
    $query = $pdo -> query($sql);
    $gallery = $query -> fetchAll(PDO::FETCH_ASSOC);
    if(count($gallery) == 0){
        echo '<h1>Gallery is not loaded because it is empty!</h1>';
    }
    $counter = 0;
    for ($i = 0; $i < 3; $i++) {
        echo '<div class="column">';
            for ($j = 0; $j < 6; $j++, $counter++){
                echo '<div class="unit">
                <img src="'.$gallery[$counter]["path"].'" alt="">
                <div class="overlay">
                    <div class="text"><h3>'.$gallery[$counter]["title"].'</h3>
                        <p>'.$gallery[$counter]["description"].'</p>
                        <p>- '.$gallery[$counter]["year"].' -</p>
                    </div>
                </div>
            </div>';
            }
        echo '</div>';
    }
?>
            </div>
        <?php include "include/footer.php"; ?>
