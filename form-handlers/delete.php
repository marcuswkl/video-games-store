<?php 
    session_start();
    $gameId = $_GET["gameid"];
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
    
    $sql = "DELETE FROM games WHERE gameId = $gameId"; 
    if (mysqli_query($conn, $sql)){
        echo '
        <script>
            alert("The game has been successfully deleted. (/•-•)/" );
            window.location = "../admin.php";
        </script>';
    } else {
        echo "false";
        echo '  
        <script>
            alert("Error when deleting data. ┏༼ ◉ ╭╮ ◉༽┓ \n The error was: "'. $conn->error . '");
            window.location = "../admin.php";
        </script>';
    }
?>