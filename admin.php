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

    if ($_SESSION["email"] != "admin@bayconeggs.com" ) {
        echo '
        <script>
            alert("You do not have access to this page! ⊂(⊙д⊙)つ");
            window.location = "index.php";
        </script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Baycon & E.GG</title>
        <link rel="stylesheet" type="text/css" href="css/admin.css">
        <link rel="stylesheet" type="text/css" href="css/navbar.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
    </head>

    <body>
        <?php include "navbar.php"; ?>

        <!-- READ -->
        <table id="gamesTable">
            <caption>Games</caption>
            <thead>
                <tr>
                    <th id="table-column-id">ID</th>
                    <th id="table-column-name">Name</th>
                    <th id="table-column-desc">Description</th>
                    <th id="table-column-pic">Picture Directory</th>
                    <th id="table-column-price">Price</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql="SELECT * FROM games ORDER BY gameId ASC;";
                    $res = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($res);
                    do { ?>
                        <tr>
                            <td><?php echo $row["gameId"]; ?></td>
                            <td><?php echo $row["gameName"]; ?></td>
                            <td><?php echo $row["gameDesc"]; ?></td>
                            <td><?php echo $row["gamePic"]; ?></td>
                            <td>RM <?php echo $row["gamePrice_RM"]; ?></td>
                            <td><a href="edit.php?gameid=<?php echo $row["gameId"]; ?>">Edit</a></td>
                            <td><a href="form-handlers/delete.php?gameid=<?php echo $row["gameId"]; ?>">Delete</a></td>
                        </tr>
                    <?php } while ($row = mysqli_fetch_assoc($res)); ?>
            </tbody>
        </table>

        <p style="text-align: center;"><a id="admin-add-button" href="add.php">Add Game</a></p>
            
        <script>
            for(var i = 0; i < 5; i++) { 
                document.write("<br>");
            }
        </script>

        <?php include "footer.php"; ?>
        
    </body>
</html>

