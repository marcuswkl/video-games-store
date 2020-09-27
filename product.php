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

	$_SESSION["gameId"] = $_GET["gameId"];
	$gameId = $_SESSION["gameId"];
	
	if (empty($gameId)) {
		echo'
		<script>
			alert("The product is not found.");
			window.location = "index.php";
		</script>
		';
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
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/product.css">
		<link rel="stylesheet" type="text/css" href="css/navbar.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
		<link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
		<script src="js/product.js"></script>
	</head>
	<body>

		<?php include "navbar.php"; ?>

		<div class="p_info_top">
			<div class="p_info_pic">
				<img src ="<?php echo $gamePic; ?>" style="width:65%; height:auto;" alt="logo">
			</div>
			<div class="p_info_top_content">
				<h1><?php echo $gameName; ?></h1>
				<p><?php echo $gameDesc; ?></p>
				
				<div class="p_info_price">
					<h3>TOTAL PRICE:</h3>
					<h2>RM <?php echo $gamePrice_RM; ?></h2>
				</div>
				<img src="icons/addToCartC.png" onclick="addToCart()" style="width:18%; height:auto;">
			</div>
		</div>
		
		<div class="divider"></div>
		
		<div class="p_info_bottom">
			<div class="p_info_bottom_content">
				<h2>YOU MIGHT ALSO LIKE: </h2>
			</div>
			<br>

			<div class="row">
				<?php
				
					$sql="SELECT MAX(gameId) AS 'noOfGames' FROM games;";
					$res = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($res);
					$gameIdArray = range(1, $row["noOfGames"]);
					
					//Removing the gameId of this current page
					unset($gameIdArray[$gameId - 1]);
					$gameIdArrayNew = array_values($gameIdArray);
					
					$sql="SELECT a.gameId+1 AS 'start', MIN(b.gameId) - 1 AS 'end'
					FROM games a, games b
					WHERE a.gameId < b.gameId
					GROUP BY a.gameId
					HAVING start < MIN(b.gameId);";
					$res = mysqli_query($conn, $sql);
					$missingIdArray = array();
					
					while ($row = mysqli_fetch_assoc($res)) {
						array_push($missingIdArray, $row["start"]);
						array_push($missingIdArray, $row["end"]);
					};

					// Remove duplicates from misingIdArray and rearrange its index
					$missingIdArrayUnique = array_unique($missingIdArray);
					$missingIdArrayUniqueNew = array_values($missingIdArrayUnique);

					// Subtract missingIdArrayUniqueNew from gameIdArrayNew and rearrange its index
					$gameIdArrayMinusMissing = array_diff($gameIdArrayNew, $missingIdArrayUniqueNew);
					$gameIdArrayMinusMissingNew = array_values($gameIdArrayMinusMissing);
					
					// Shuffle $gameIdArrayMinusMissing for randomness
					shuffle($gameIdArrayMinusMissingNew);

					// Print it out :D
					$i = 0;
					//Getting you might also like game information
					foreach ($gameIdArrayMinusMissingNew as $randomId) {
						if ($i > 2) {
							break;
						}
						
						$sql="SELECT gameName, gamePic FROM games WHERE gameId = $randomId;";
						$res = mysqli_query($conn, $sql);
						$row = mysqli_fetch_assoc($res);
						$gameName = $row['gameName'];
						$gamePic = $row['gamePic'];

						echo '
						<div class="column">
						
						<a href="product.php?gameId=' . $randomId . '"><img src="' . $gamePic . '" style="width:50%; height:auto; cursor:pointer;" alt="logo"></a>
						<a href="product.php?gameId=' . $randomId . '"><h2 style="cursor:pointer;">' . $gameName . '</h2></a>
						</div>
						';
						$i++;
					}

				?>
			</div>
		</div>

		<br>
		
		<?php include "footer.php"; ?>

	</body>
</html>

<?php

$conn->close();

?>
