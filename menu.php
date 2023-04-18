<?php
require "Database.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tasty foods always can make your moments unforgettable.">
    <meta name="author" content="Kanishka medankara">
    <meta name="keywords" content="cafe,kandy,cafe the vibe,food">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="icon" href="Resources/Images/headerlogo.png">
    <title>Menu - Cafe The Vibe</title>
</head>

<body>
    <div class="morebutton" id="more" onclick="showMenu()">
    </div>
    <div class="main-body">
        <div class="left-menu" id="left-menu">
            <div class="left-menu-parent">
                <img class="logo" src="Resources/Images/logo-png-150x81.png" />
                <div class="menu-items-parent">
                    <span class="menu-items" onclick="window.location='index.html'">Home</span>
                    <span class="menu-items" onclick="window.location='menu.html'" style=" --i: 1;
                    color: whitesmoke;">Menu</span>
                    <span class="menu-items" onclick="window.location='About Us.html'">About Us</span>
                    <span class="menu-items" onclick="window.location='Contact Us.html'">Contact Us</span>
                </div>

            </div>
        </div>

        <div class="sub-body">
            <div class="slider" style="height: 50vh;background-image: url('Resources/Images/5.svg');">

                <div class="right-menu" style="height: 100%;padding: 10px;box-sizing: border-box;text-align: center;">

                    <div class="right-menu-parent" style="height: 100%;text-align: center;">
                        <img src="Resources/Images/divider-free-img-1.png" />
                        <span style="font-family: 'special';font-size: 60px;">Our Menu</span>
                        <span style="font-family: 'special';">Loved by Thousands​</span>


                    </div>
                </div>

            </div>


            <div class="body" id="main-body">
                <div class="reviews" id="review3">
                    <span style="font-size: 20px;display: block;margin-top: 20px;font-family: 'special';">All prices are subjected to change without prior notice due to suppliers price changes.</span>
                    <span style="font-size: 15px;display: block;margin-top: 20px;">
                        please contact us on 077 042 5291 for any clarifications

                    </span>
                    <img src="Resources/Images/divider-free-img-1.png" />

                    <div class="review-div">

                    </div>
                </div>

                <div class="reviews" id="review4">
                    <!-- <span style="font-size: 60px;display: block;margin-top: 20px;font-family: 'special';">They All Love Our Food</span> -->
                    <!-- <img src="Resources/Images/divider-free-img-1.png" /> -->
                    <!-- <span style="display: block;">Some reviews from our lovely customers</span> -->
                    <div class="review-div">
                        <div class="review-description" style="background-image: url('Resources/Images/sha.jpg');background-size: cover;border-radius: 10px;">
                            <div class="itt">
                                <p style="font-size: 30px;font-family: 'special';">Freak Shake
                                </p>
                                <span style="font-size: 20px;">700 LKR</span>
                            </div>
                        </div>
                        <div class="review-description" style="background-image: url('Resources/Images/sha2.jpg');background-size: cover;border-radius: 10px;">
                            <div class="itt">
                                <p style="font-size: 30px;font-family: 'special';">Vibe Special
                                </p>
                                <span style="font-size: 20px;">2100 LKR - Regular</span>
                                <span style="font-size: 20px;">3560 LKR - Large</span>

                            </div>
                        </div>
                        <div class="review-description" style="background-image: url('Resources/Images/sha3.jpg');background-size: cover;border-radius: 10px;">
                            <div class="itt">
                                <div class="itt">
                                    <p style="font-size: 30px;font-family: 'special';">Ice Coffee
                                    </p>
                                    <span style="font-size: 20px;">400 LKR</span>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="reviews" id="review">
                    <span style="font-size: 60px;display: block;margin-top: 20px;font-family: 'special';">Are You Hungry</span>
                    <img src="Resources/Images/divider-free-img-1.png" />
                    <span style="font-size: 20px;display: block;margin-top: 20px;">
                        Come, Dine With Us!<br />
                        Tasty foods always can make your moments unforgettable.

                    </span>
                    <div class="review-div">

                    </div>
                </div>
                <div id="aboutmain" class="about-main">
                    <?php
                    $q = "SELECT * FROM `category`;";
                    $pre = Database::getPrepareStatement($q);
                    $pre->execute();
                    $res = $pre->get_result();
                    $items = $res->num_rows;
                    $items_per_section = 2;
                    $sections = ceil($items / $items_per_section);
                    for ($i = 0; $i < $sections; $i++) {
                        $offset = $i * 2;
                        $q2 = "SELECT * FROM `category` LIMIT $items_per_section OFFSET $offset";
                        $pre2 = Database::getPrepareStatement($q2);
                        $pre2->execute();
                        $res2 = $pre2->get_result();
                        $items2 = $res2->num_rows;

                    ?>
                        <div class="about" style="display: flexbox;align-items: center;background-image: url('Resources/Images/food.avif');background-repeat: repeat;background-attachment: fixed;margin-left: 0;opacity: 1;">


                            <?php
                            for ($j = 0; $j < $items2; $j++) {
                                $row = $res2->fetch_assoc();
                            ?>
                                <div class="about-in" style="width: 100% !important;">
                                    <h1 style="font-size: 40px;text-align: center;font-family:'special'; "><?= $row["category"] ?>
                                        <p style="text-align:center;font-weight: bold;font-family: 'default';font-size: 20px;padding: 15px;box-sizing: border-box;">
                                        <table style="width: 100%;font-size: 20px;font-weight: lighter;">
                                            <?php
                                            $q3 = "SELECT `category_option`.`id`,`category_option`.`category_id`,`category_option`.`price`,`option`.`option` 
                                            FROM `category_option` 
                                            INNER JOIN `option` 
                                            ON `option`.`id`=`category_option`.`option_id` 
                                            WHERE `category_option`.`category_id`=?;";
                                            $pre3 = Database::getPrepareStatement($q3);
                                            $pre3->bind_param('s', $row["id"]);
                                            $pre3->execute();
                                            $res3 = $pre3->get_result();
                                            $items3 = $res3->num_rows;
                                            for ($k = 0; $k < $items3; $k++) {
                                                $row2 = $res3->fetch_assoc();
                                            ?>
                                                <tr>
                                                    <td style="text-align: left;"><?= $row2["option"] ?></td>
                                                    <td style="text-align: right;"><?= $row2["price"] . " LKR" ?></td>

                                                </tr>
                                            <?php
                                            }
                                            




                                            $q5 = "SELECT * FROM `special` WHERE `category_id`=?;";
                                            $pre5 = Database::getPrepareStatement($q5);
                                            $pre5->bind_param('s', $row["id"]);
                                            $pre5->execute();
                                            $res5 = $pre5->get_result();
                                            $items5 = $res5->num_rows;
                                        
                                            if ($items5 != 0) {
                                                ?>
                                                <tr>
                                                    <td style="text-align:center;font-weight: bold;" colspan="2">Vibe Special</td>
                                                </tr>
                                                <?php
                                                for ($m = 0; $m < $items5; $m++) {
                                                    $row5 = $res5->fetch_assoc();
                                            ?>
                                                    <tr>
                                                        <td style="text-align: left;"><?= $row5["special"] ?></td>
                                                        <td style="text-align: right;"><?= $row5["price"] . " LKR" ?></td>

                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>



                                        </table>

                                        </p>
                                    </h1>
                                    <?php


                                    $q4 = "SELECT * FROM `massage` WHERE `category_id`=?;";
                                    $pre4 = Database::getPrepareStatement($q4);
                                    $pre4->bind_param('s', $row["id"]);
                                    $pre4->execute();
                                    $res4 = $pre4->get_result();
                                    $items4 = $res4->num_rows;
                                    for ($l = 0; $l < $items4; $l++) {
                                        $row3 = $res4->fetch_assoc();
                                    ?>
                                        <p style="font-weight: bold;margin: 0;font-size: 20px;"><?= $row3["massage"] ?>
                                        </p>

                                    <?php
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>




                        </div>

                    <?php
                    }
                    ?>













                </div>


                <div class="reviews" id="review2">
                    <img src="Resources/Images/divider-free-img-1.png" />
                    <span style="font-size: 60px;display: block;margin-top: 20px;font-family: 'special';">Open Hours</span>

                    <span style="font-size: 20px;display: block;margin-top: 20px;">
                        Mon - Fri <br />09 AM --- 10 PM<br /><br />
                        Sat - Sun <br />09 AM --- 10 PM

                    </span>
                    <div class="review-div">

                    </div>
                </div>
                <div class="footer" id="footer">
                    <span style="font-family: 'special';">Let's Eat.</span>
                    <img src="Resources/Images/divider-free-img-1.png" />

                    <span> </span> <span> </span>
                    <span style="font-size: 20px;"><a style="text-decoration: none;color: white;" href="tel:077 042 5291">Call Us : 077 042 5291</a></span>
                    <span> </span>
                    <span style="font-size: 20px;margin-top: 20px;">258/4/1, </span>
                    <span style="font-size: 20px;">DS Senanayake Veediya,</span>
                    <span style="font-size: 20px;">Kandy</span>

                    <div style="display:flex;justify-content: center;align-items: center;margin:20px;box-sizing: border-box;">
                        <a href="https://www.facebook.com/cafethevibe/" target="_blank">
                            <button class="mb-2" style="background-image: url('Resources/Images/5279111_network_fb_social media_facebook_facebook logo_icon.png');"></button>
                        </a>
                        <a href="https://www.instagram.com/cafethevibe/?hl=en" target="_blank">
                            <button class="mb-2" style="background-image: url('Resources/Images/5279112_camera_instagram_social media_instagram logo_icon.png')"></button>
                        </a>
                        <a href="https://www.tripadvisor.com/Restaurant_Review-g304138-d12957014-Reviews-Cafe_the_Vibe-Kandy_Kandy_District_Central_Province.html" target="_blank">
                            <button class="mb-2" style="background-image: url('Resources/Images/4691228_tripadvisor_icon.png')"></button>
                        </a>
                    </div>

                </div>
                <div class="fot">
                    <div class="fot1">Copyright © 2023 Cafe The Vibe</div>
                    <div class="fot2">Powered by DynamicBiz</div>

                </div>
            </div>
        </div>


    </div>

    <script src="JavaScript/script.js"></script>
    <script>
        document.getElementById("review3").className = "reviews-animation";
        document.getElementById("review").className = "reviews-animation";

        window.addEventListener('scroll', (event) => {
            const rect = document.getElementById("aboutmain").getBoundingClientRect();



            const rect5 = document.getElementById("review").getBoundingClientRect();
            const rect7 = document.getElementById("review2").getBoundingClientRect();
            const rect8 = document.getElementById("review3").getBoundingClientRect();
            const rect10 = document.getElementById("review3").getBoundingClientRect();


            const rect6 = document.getElementById("footer").getBoundingClientRect();

            if (rect.top <= window.innerHeight) {
                document.getElementById("aboutmain").className = "about-main-animation";
            }


            if (rect5.top <= window.innerHeight) {
                document.getElementById("review").className = "reviews-animation";
            }
            if (rect7.top <= window.innerHeight) {
                document.getElementById("review2").className = "reviews-animation";
            }
            if (rect8.top <= window.innerHeight) {
                document.getElementById("review3").className = "reviews-animation";
            }
            if (rect10.top <= window.innerHeight) {
                document.getElementById("review4").className = "reviews-animation";
            }

            if (rect6.top <= window.innerHeight) {
                let ele = (document.getElementById("footer"));
                let span = ele.getElementsByTagName("span");
                for (i = 0; i < span.length; i++) {
                    span[i].className = "span-ani";
                }
            }
        });
    </script>
</body>

</html>