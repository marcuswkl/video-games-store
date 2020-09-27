<?php 
    session_start();

    print_r($_COOKIE['gameIdList']);
    if(!empty($_COOKIE['gameIdList'])) {
        $newCart = explode(",", $_COOKIE['gameIdList']);
        $_SESSION["cart"] = $newCart;
    }
    else {
        unset($_SESSION["cart"]);
    }
    echo '<script>window.location = "../shopping-cart.php";</script>';

?>