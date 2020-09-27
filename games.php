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
        die("Connection failed: " . $conn->connect_error);
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" type="text/css" href="css/games.css">
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">

</head>

<body>
    <?php include "navbar.php"; ?>

    <div id="games-body">
        <p id="games-title">Games List</p>

        <?php
            //Getting game information
            $sql="SELECT * FROM games ORDER BY gameId ASC;";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($res);
            do {
                $gameId = $row['gameId'];
                $gameName = $row['gameName'];
                $gamePic = $row['gamePic'];
                $gameDesc = $row['gameDesc'];
                $gamePrice_RM = $row['gamePrice_RM'];

                echo '<a href="product.php?gameId=' . $gameId . '">';
                echo '<div class="games-item" id="game-' . $gameId . '">';
                echo '<img src="'. $gamePic . '" alt="'. $gameName . '">';
                echo '<div class="games-item-info">';
                echo '<p>' . $gameName . '</p>';
                echo '<p style="text-align: justify;">' . $gameDesc . '</p>';
                echo '<span>RM</span><p class="games-item-price">' . $gamePrice_RM .'</p>';
                echo '
                </div>
                </div>
                </a>
                <hr class="games-horizontal-rule">
                ';

            } while($row = mysqli_fetch_assoc($res)); ?>
    </div>

    <script>
        for(var i = 0; i < 5; i++){ 
            document.write("<br>");
        }
    </script>

    <?php include "footer.php"; ?>
</body>


</html>