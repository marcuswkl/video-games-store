<?php
    session_start();

    //Check if logged in
    if (!isset( $_SESSION["username"])) {
		// Grab user data from the database using the user_id
        // Let them access the "logged in only" pages
        echo '<script>alert("Login is required to view your cart.");</script>';
        echo '<script>window.location = "login.php";</script>';
    }

    if (empty($_SESSION["cart"])) {
        echo '<script>alert("Your cart is empty!\nGo shop now!");</script>';
        echo '<script>window.location = "index.php";</script>';
    }

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
    <link rel="stylesheet" type="text/css" href="css/shopping-cart.css">
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">

    <script>
        var cart = <?php echo '["' . implode('", "', $_SESSION["cart"]) . '"]'; ?>;
    </script>
</head>

<body>
    <?php include "navbar.php"; ?>

    <div id="shopping-cart-body">
        <p id="shopping-cart-title">YOUR CART</p>

        <?php
            foreach($_SESSION["cart"] as $value){
                $gameId = $value;
            
                //Getting game information
                $sql="SELECT gameName, gamePic, gamePrice_RM FROM games WHERE gameId = $gameId;";
                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($res);
                $gameName = $row['gameName'];
                $gamePic = $row['gamePic'];
                $gamePrice_RM = $row['gamePrice_RM'];

                echo '<div class="shopping-cart-item" id="game-' . $gameId . '">';
                echo '<img src="'. $gamePic . '" alt="'. $gameName . '">';
                echo '<div class="shopping-cart-item-info">';
                echo '<p>' . $gameName . '</p>';
                echo '<span>RM</span><p class="shopping-cart-item-price">' . $gamePrice_RM .'</p>';
                echo '
                </div>
                <div class="shopping-cart-item-quantity">
                    <button class="shopping-cart-decrease-button">-</button>
                    <p class="shopping-cart-quantity-value">1</p>
                    <button class="shopping-cart-increase-button">+</button>
                </div>
                <button class="shopping-cart-delete-button">X</button>
                </div>
                <hr class="shopping-cart-horizontal-rule">
                ';

            }
        ?>


        <div id="shopping-cart-total">
            <p>TOTAL PRICE</p>
            <span>RM </span><p id="shopping-cart-total-value"></p><br>
            <img src="buttons/proceed.png" alt="proceed" onclick="proceedPayment()" style="cursor: pointer;">
        </div>
    </div>

    <br><br><br><br><br><br><br><br><br>

    <?php include "footer.php"; ?>
</body>

<script src="js/shopping-cart.js"></script>

</html>