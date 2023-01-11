<?php include "include/begin.php"; ?>
            <div class="upcoming">
                <div class="events">
                    <?php 
                        $dbName = "gtamas";
                        $dbUser = "root";
                        $dbPass = "mysql";
        
                        $dsn = "mysql:host=localhost;dbname=". $dbName .";charset=utf8mb4";
                        $pdo = new PDO($dsn, $dbUser, $dbPass);
                        
                        $sql = "SELECT * FROM `events` ORDER BY id DESC LIMIT 1";
                        $query = $pdo -> query($sql);
                        $events = $query -> fetchAll(PDO::FETCH_ASSOC);

                        echo'<img src="'.$events[0]["path"].'" alt="" width="100%">
                        <h2>'.$events[0]["title"].'</h2>
                        <p>'.$events[0]["description"].'</p>';
                    ?>
                    <div class="sign-up">
                        <h3>Don't miss any upcoming event!</h3>
                        <span onclick="showForm()" class="button-inside" id="subutton">Sign up</span>
                    </div>
                    <form method="post" id="sign-up-form">
                        <div>
                            <input type="text" name="suname" id="suname" maxlength="50" placeholder="Enter your name..." class="input-inside">
                        </div>
                        <div>
                            <input type="email" name="suemail" id="suemail" maxlength="255" placeholder="Enter your email address..." class="input-inside">
                        </div>
                        <div>
                            <input type="tel" name="suphone" id="suphone" maxlength="15" placeholder="Enter your phone number..." class="input-inside">
                        </div>
                        <div>
                            <button name="susubmit" id="susubmit" class="button-inside">Submit</button>
                        </div>
                    </form>
                </div>
                <?php 
                $dbName = "gtamas";
                $dbUser = "root";
                $dbPass = "mysql";
                
                $dsn = "mysql:host=localhost;dbname=". $dbName .";charset=utf8mb4";
                $pdo = new PDO($dsn, $dbUser, $dbPass);
                
                if(isset($_POST["susubmit"]))
                {
                    $name = trim($_POST["suname"]);
                    $email = trim($_POST["suemail"]);
                    $phone = trim($_POST["suphone"]);
                
                    if(strlen($name) > 2 && strlen($email) > 5 && strlen($phone) > 6)
                    {
                        $sql = "INSERT INTO signedup VALUES (NULL, :name, :email, :phone)";
                        $query = $pdo -> prepare($sql);
                        $query -> execute([
                            'name'=> $name,
                            'email'=> $email,
                            'phone'=>$phone,
                        ]);
                    }
                }
            ?>
                <aside>
                    <?php 
                        $dbName = "gtamas";
                        $dbUser = "root";
                        $dbPass = "mysql";
        
                        $dsn = "mysql:host=localhost;dbname=". $dbName .";charset=utf8mb4";
                        $pdo = new PDO($dsn, $dbUser, $dbPass);
                        
                        $sql = "SELECT * FROM exhibitions ORDER BY e_date ASC";
                        $query = $pdo -> query($sql);
                        $exhibitions = $query -> fetchAll(PDO::FETCH_ASSOC);

                        foreach($exhibitions as $exhibition){
                            if(strtotime($exhibition["e_date"]) > strtotime('now')){
                                $month = date('M', strtotime($exhibition["e_date"]));
                                $day = date('d', strtotime($exhibition["e_date"]));
                                echo '<div class="exhibition"> 
                                <div>
                                    <h4>'.$exhibition["city"].'</h4>
                                    <span>'.$day.'<br>'.$month.'</span>
                                </div>
                                <p>'.$exhibition["description"].'</p>
                                </div>';
                            }
                        }
                    ?>
                </aside>
            </div>
        <?php include "include/footer.php"; ?>