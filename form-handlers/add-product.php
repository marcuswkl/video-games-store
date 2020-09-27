<?php 
    session_start();

    $gameId = $_SESSION["gameId"];

    if (isset($_SESSION["cart"])) {   
        if(in_array($gameId, $_SESSION["cart"])){
            echo '<script>alert("Item already exists in cart.");</script>';
            echo '<script>window.location = "../shopping-cart.php";</script>';
        } else {
            array_push($_SESSION["cart"], $gameId);
            echo '<script>alert("Item successfully added to cart.");</script>';
            echo '<script>window.location = "../shopping-cart.php";</script>';
        }

    } else {
        $_SESSION["cart"] = array(); 
        array_push($_SESSION["cart"], $gameId);
        echo '<script>window.location = "../shopping-cart.php";</script>';
    }
?>