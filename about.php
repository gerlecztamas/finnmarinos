<?php include "include/begin.php"; ?>
                <div class="about-container">
                    <div class="about">
                            <?php 
                                $file = "content/about.txt";
                                    $about = file_get_contents($file);
                                    $about = explode(";",$about);
                                    $img = $about[0];
                                    $name = $about[1];
                                    $description = $about[2];
                                    echo'<div class="finn">
                                    <img src="'.$img.'" alt="">
                                </div>
                                <div class="bio">
                                    <h1>'.$name.'</h1>
                                    <p>'.$description.'</p>';
                            ?>
                        </div>
                    </div>
                    <a href="events.php" id="events-link" class="button-inside">See upcoming events</a>
                </div>
            <div class="faqs-container" id="faq-anchor">
                <div class="faqs">
                    <h1>FAQ</h1>
                    <?php 
                        $faqs = file("content/faqs.txt");
                        foreach($faqs as $x => $faq){
                            $faq = explode(";", $faq);
                            $question = $faq[0];
                            $answer = $faq[1];
                            $i = $x + 1;
        
                            echo'<div class="faq" id="question'.$i.'">
                            <a class="faq-link" href="#question'.$i.'">
                                '.$question.'
                                <i class="fa-sharp fa-solid fa-chevron-down"></i>
                                <i class="fa-sharp fa-solid fa-chevron-up"></i>
                            </a>
                            <div class="answer">
                                <p>
                                    '.$answer.'
                                </p>
                            </div>
                        </div>';
                        }
                    ?>
                </div>
            </div>
        <?php include "include/footer.php"; ?>