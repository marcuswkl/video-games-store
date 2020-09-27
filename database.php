<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

// Create database
$sql = "CREATE DATABASE bayconegg";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully<br>";
} else {
  echo "Error creating database: " . $conn->error;
}

$dbname = "bayconegg";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create user table
$sql = "CREATE TABLE user (
    userId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    passwd VARCHAR(50) NOT NULL,
    phone VARCHAR(12) NOT NULL,
    isAdmin BOOLEAN NOT NULL DEFAULT 0
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table 'user' created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

//Insert admin into user table
$sql = "INSERT INTO user (email, passwd, phone, isAdmin)
        VALUES ('admin@bayconeggs.com', 'admin', '019-6969691', true)";

if ($conn->query($sql) === TRUE) {
  echo "Admin account created successfully<br>";
} else {
  echo "Error when creating admin account: " . $conn->error;
}

// Create security_question table
$sql = "CREATE TABLE security_question (
  userId INT(6) UNSIGNED AUTO_INCREMENT,
  question VARCHAR(255) NOT NULL,
  answer VARCHAR(255) NOT NULL,
  CONSTRAINT
  FOREIGN KEY (userId) REFERENCES user(userId)
  ON UPDATE CASCADE
  ON DELETE CASCADE
  )";

if ($conn->query($sql) === TRUE) {
  echo "Table 'security_question' created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}

//Insert admin questions into security_question table
$sql = "INSERT INTO security_question (question, answer)
        VALUES ('What is the admin\'s favourite number?', '69')";

if ($conn->query($sql) === TRUE) {
  echo "Admin questions added successfully<br>";
} else {
  echo "Error when creating admin questions: " . $conn->error;
}

// Create games table
$sql = "CREATE TABLE games (
gameId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
gameName VARCHAR(255) NOT NULL,
gameDesc TEXT NOT NULL,
gamePic VARCHAR(255) NOT NULL,
gamePrice_RM DECIMAL(7,2) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
echo "Table 'games' created successfully<br>";
} else {
echo "Error creating table: " . $conn->error;
}

// Insert games data
$sql = "INSERT INTO games (gameName, gameDesc, gamePic, gamePrice_RM) VALUES 
('ATRI -My Dear Moments-', '\"As the world sank, I found you.\" In the near future, a sudden and unexplained sea rise has left much of human civilization underwater.
In a little town slowly being enveloped by the ocean, an unforgettable summer is about to begin for a boy and a mysterious robot girl...','images/products/atri.png', 36.85),

('Nekopara','Patisserie \"La Soleil\", run by Kashou Minaduki, is flourishing thanks to the help of two catgirls: Maple, full of pride and a little on the haughty side, and Cinnamon, an impulsive daydreamer.','images/products/nekopara.png', 23.00),

('Sword Art Online: AL','Kirito awakens in a completely unknown virtual world, but something about it feels a bit familiar...
Set in Underworld, an expansive world introduced in the SWORD ART ONLINE anime, Kirito sets out on adventure in the series\' latest RPG!','images/products/sword-art-online.png', 159.00),

('Dead by Daylight','Dead by Daylight is a multiplayer (4vs1) horror game where one player takes on the role of the savage Killer, and the 
other four players play as Survivors, trying to escape the Killer and avoid being caught and killed.','images/products/dead-by-daylight.png', 38.00),

('Minecraft','Minecraft is a sandbox video game developed by Mojang Studios... In Minecraft, players explore a blocky, procedurally-generated 3D world with infinite 
terrain, and may discover and extract raw materials, craft tools and items, and build structures or earthworks.','images/products/minecraft.png', 111.83),

('Fall Guys: Ultimate Knockout','Fall Guys is a massively multiplayer party game with up to 60 players online in a free-for-all struggle
 through round after round of escalating chaos until one victor remains!','images/products/fall-guys.png', 39.00)
";
  
  if ($conn->query($sql) === TRUE) {
  echo "Game information inserted successfully<br>";
  } else {
  echo "Error inserting game information: " . $conn->error;
  }

  $conn->close();
?>