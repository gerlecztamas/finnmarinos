<?php include "include/begin.php"; ?>
<div class="reviews">
            <?php 
                $dbName = "gtamas";
                $dbUser = "root";
                $dbPass = "mysql";

                $dsn = "mysql:host=localhost;dbname=". $dbName .";charset=utf8mb4";
                $pdo = new PDO($dsn, $dbUser, $dbPass);
                
                $sql = "SELECT * FROM reviews ORDER BY RAND()";
                $query = $pdo -> query($sql);
                $reviews = $query -> fetchAll(PDO::FETCH_ASSOC);

                foreach($reviews as $review)
                    {
                        echo '<div class="review">
                        <p>'.$review["review"].'</p>
                        <div class="author"><h4><i class="fa-sharp fa-solid fa-circle-user"></i>'.$review["author"].'</h4></div>
                        </div>';
                    }
            ?>
                <div class="review">
                    <h3>Leave us a review!</h3>
                    <form method="post" action="">
                        <div>
                            <input type="text" name="name" id="inputName" maxlength="50" placeholder="Enter your name..." class="input-inside">
                        </div>
                        <div>
                            <textarea name="youropinion" id="inputOpinion" maxlength="1000" placeholder="Your opinion..." class="input-inside"></textarea>
                        </div>
                        <div>
                            <button name="sendOpinion" class="button-inside">Send review</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php 
                $dbName = "gtamas";
                $dbUser = "root";
                $dbPass = "mysql";
                
                $dsn = "mysql:host=localhost;dbname=". $dbName .";charset=utf8mb4";
                $pdo = new PDO($dsn, $dbUser, $dbPass);
                
                if(isset($_POST["sendOpinion"]))
                {
                    $name = trim($_POST["name"]);
                    $review = trim($_POST["youropinion"]);
                
                    if(strlen($name) > 2 && strlen($review) > 5)
                    {
                    $sql = "INSERT INTO reviews VALUES (NULL, :name, :review)";
                    $query = $pdo -> prepare($sql);
                    $query -> execute([
                        'name'=> $name,
                        'review'=> $review,
                    ]);
                }
                }
            ?>
        </main>
        <?php include "include/footer.php"; ?>
        <script type="text/javascript" src="script.js"></script>
    </body>
</html>