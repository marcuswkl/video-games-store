<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Baycon & E.GG</title>
        <link rel="stylesheet" type="text/css" href="css/validate-answer.css">
        <link rel="stylesheet" type="text/css" href="css/navbar.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
    </head>

    <body>
        <?php include "navbar.php"; ?>

        <div id="form_box">
            <p id="title">Identity verified successfully. <br>YOUR PASSWORD IS :</p>
            
            <!-- printing the ans  -->
            <p style="text-align: center;">
                <?php
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
                    
                    $email = mysqli_real_escape_string($conn, $_POST["email"]);
                    $answerDirty = $_POST["sec-answer"];
                    $answer = mysqli_real_escape_string($conn, $_POST["sec-answer"]);

                    //Getting userId
                    $sql="SELECT userId FROM user WHERE email = '$email';";
                    $res = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($res);
                    $id = $row['userId'];
                        
                    $sql="SELECT answer FROM security_question WHERE userId = '$id';";
                    $res = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($res) > 0) {  
                        $res = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($res);                       
                        if($answerDirty == $row['answer']) {                   
                        
                            $sql="SELECT passwd FROM user WHERE userId = '$id';";
                            $res = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($res); 
                            echo $row['passwd'];
                        }
                        else {
                            echo '
                                <script type="text/javascript">
                                    alert("Invalid answer!");
                                    window.location = "forgot-password.php";
                                </script>
                                ';
                        }
                    }
                    $conn->close();
                ?>
            </p>
            <br><br>
            <p class="back-to-login" style="text-align: center; font-family: 'Abel', sans-serif; font-size: 25px;">
                <a class="back-to-login" href="login.php">Back to Login</a>
            </p>
            
        </div>

        <?php include "footer.php"; ?>
    </body>
</html>

