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

    if ($_SESSION["email"] != "admin@bayconeggs.com" ) {
        echo '
        <script>
            alert("You do not have access to this page! ⊂(⊙д⊙)つ");
            window.location = "index.php";
        </script>';
    }

	//Getting game information
	//Game Name
	$sql="SELECT gameName, gameDesc, gamePic, gamePrice_RM FROM games WHERE gameId = $gameId;";
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($res);
	$gameName = $row['gameName'];
	$gameDesc = $row['gameDesc'];
	$gamePic = $row['gamePic'];
	$gamePrice_RM = $row['gamePrice_RM'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baycon & E.GG</title>
    <link rel="stylesheet" type="text/css" href="css/edit.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
</head>

<body>
    <?php include "navbar.php"; ?>

    <?php

    if(isset($_POST['update']) && $_POST['update']==1) {
        $gameNameUpdate = $_POST['game-name'];
        $gameDescUpdate = $_POST['game-desc'];
        $gamePicUpdate = $_POST['game-pic'];
        $gamePrice_RMUpdate = $_POST['game-price'];
        echo "Name: " . $gameNameUpdate . "<br>";
        echo "Description: " . $gameDescUpdate . "<br>";
        echo "Picture: " . $gamePicUpdate . "<br>";
        echo "Price : " . $gamePrice_RMUpdate . "<br>";
        $sql="UPDATE Games
            SET gameName = '$gameNameUpdate',
            gameDesc= '$gameDescUpdate',
            gamePic= '$gamePicUpdate',
            gamePrice_RM= '$gamePrice_RMUpdate'
            WHERE gameId = '$gameId';";
            if (mysqli_query($conn, $sql)) {
                echo '
                <script>
                    alert("You have updated the data successfully. \( ﾟヮﾟ)/");
                    window.location = "admin.php";
                </script>
                 ';
            } else {
                echo '  
                <script>
                    alert("Error when modifying data. ┏༼ ◉ ╭╮ ◉༽┓ \n The error was: "'. $conn->error . '");
                    window.location = "admin.php";
                </script>
                 ';
            }

    }
    else { ?>
    <table id="edit-game-table">
        <caption>Edit Game</caption>
        <form method="POST" action="">
            <tr>
                <td id="table-column-label"><label for="game-name">Game Name</label></td>
                <td id="table-column-input"><input id="game-name" type="text" name="game-name" required value="<?php echo $row['gameName']; ?>"></td>
            </tr>
            <tr>
                <td><label for="game-desc">Game Description</label></td>
                <td><textarea id="game-desc" name="game-desc" required cols="50" rows="10" ><?php echo $row['gameDesc']; ?></textarea></td>
            </tr>
            <tr>
                <td><label for="game-pic">Game Picture</label></td>
                <td><input id="game-pic" type="text" name="game-pic" required value="<?php echo $row['gamePic']; ?>"></td>
            </tr>
            <tr>
                <td><label for="game-price">Game Price</label></td>
                <td><input id="game-price" type="text" name="game-price" required value="<?php echo $row['gamePrice_RM']; ?>"></td>
            </tr>
            <tr>
                <td id="table-row-update" colspan="2"><input type="submit" value="Update"></td>
            </tr>
            <input type="hidden" name="update" value="1" />
        </form>
    </table>
    <?php };?>

    <?php include "footer.php"; ?>
    <script src="js/edit.js"></script>
</body>
</html>