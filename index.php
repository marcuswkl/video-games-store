<?php
    session_start();
    
    $servername = "localhost";
    $username = "root";
    $dbPassword = "";
    $dbname = "bayconegg";

    // Create connection
    $conn = new mysqli($servername, $username, $dbPassword, $dbname);
    // Check connection
    if ($conn->connect_error) {
        echo '<script>alert("First time around? Welcome to 🥓🥚!");</script>';
        include('database.php');
        echo '<script>window.location = "index.php";</script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Baycon & E.GG</title>
        <link rel="stylesheet" type="text/css" href="css/navbar.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet"> 
    </head>

    <body>
        <?php 
            include "navbar.php";
        ?>

        <p style="text-align: center; margin: 8vh 0;"><a href="games.php" id="index_title" class="links">Looking for more games? Click me!</a></p>


        <div class="slideshow-container">
            <div class="images fade">
                <a href="product.php?gameId=1"><img class="image-links slideshow" src="images/index/atri-slideshow.png" style="width:100%;"></a>
            </div>

            <div class="images fade">
                <a href="product.php?gameId=2"><img class="image-links slideshow" src="images/index/nekopara-slideshow.png" style="width:100%;"></a>
            </div>

            <div class="images fade">
                <a href="product.php?gameId=3"><img class="image-links slideshow" src="images/index/sao-slideshow.png" style="width:100%;"></a>
            </div>
            <br>

            <div style="text-align: center;">
                <span class="bar" onclick="currentSlide(0)"></span>
                <span class="bar" onclick="currentSlide(1)"></span>
                <span class="bar" onclick="currentSlide(2)"></span>
            </div>

        </div>
        <br><br>
        
        <p id="title"><b>BEST SELLERS</b></p>
        <div class="catalogue" id="best-seller">
            <div class="game">
                <a href="product.php?gameId=4"><img class="image-links" src="images/products/dead-by-daylight.png" alt="Dead by Daylight"></a><br>
                <a href="product.php?gameId=4" class="links">Dead by Daylight</a>
            </div>
            <div class="game">
                <a href="product.php?gameId=5"><img class="image-links" src="images/products/minecraft.png" alt="Minecraft"></a><br>
                <a href="product.php?gameId=5" class="links">Minecraft</a>
            </div>
            <div class="game">
                <a href="product.php?gameId=6"><img class="image-links" src="images/products/fall-guys.png" alt="Fall Guys"></a><br>
                <a href="product.php?gameId=6" class="links">Fall Guys: Ultimate Knockout</a>
            </div>
        </div>

        <p id="title"><b>UPCOMING GAMES</b></p>
        <div class="catalogue" id="upcoming-games">
            <div class="game">
                <div class="upcoming">
                    <img src="images/index/gta-vatican-city.png" alt="GTA V: Vatician City">
                    <div class="date-overlay">
                        <div class="release-date">Coming Spring 2021</div>
                    </div>
                </div>
                <p class="links">GTA V: Vatican City</p>
            </div>
            <div class="game">
                <div href="#"  class="upcoming">
                    <img src="images/index/half-life-3.png" alt="Half-Life 3">
                    <div class="date-overlay">
                        <div class="release-date">Coming... Maybe never?</div>
                    </div>
                </div>
                <p class="links">Half-Life 3</p>
            </div>
            <div class="game">
                <div href="#"  class="upcoming">
                    <img src="images/index/kirby.png" alt="Kirby">
                    <div class="date-overlay">
                        <div class="release-date">Coming 20.12.2020</div>
                    </div>
                </div>
                <p class="links">Kirby</p>
            </div>
        </div>

        <?php include "footer.php"; ?>
        <!--This script requires body to be loaded before it runs, or else it will not run correctly-->
        <script src="js/index.js"></script>
    </body>
</html>