<?php
    session_start();

    session_unset();
    session_destroy();

    echo '<script>alert("You have successfully logged out.");</script>';
    echo '<script>window.location = "index.php";</script>';
?>