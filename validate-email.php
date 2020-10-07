<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Baycon & E.GG</title>
        <link rel="stylesheet" type="text/css" href="css/validate-email.css">
        <link rel="stylesheet" type="text/css" href="css/navbar.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
    </head>

    <body>
        <?php include "navbar.php"; ?>

        <div id="form_box">
            <p id="title">SECURITY QUESTION:</p>
            
            <!-- printing the question  -->
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

                $emailDirty = $_POST["email"];
                $email = mysqli_real_escape_string($conn, $_POST["email"]);

                $sql= "SELECT * FROM user WHERE email = '$email';";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) { 
                    $row = mysqli_fetch_assoc($res);    
                    if($emailDirty==$row['email']) 
                    {
                        //SQL query for security question
                        $sql = "SELECT s.question
                                FROM user u, security_question s
                                WHERE s.userId = u.userId
                                AND u.email = '$email';";
                        $res = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($res) > 0) { 
                            $row = mysqli_fetch_assoc($res);
                            echo '<div id="question-css">'. $row['question']. '</div>';
                        }
                    }
                } else {
                    echo '
                    <script type="text/javascript">
                        alert("Invalid email!");
                        window.location = "forgot-password.php";
                    </script>
                    ';
                }

                $conn->close();
            ?>

            <!-- Textarea for input answer -->
            <form action="validate-answer.php" method="post" id="answer-form">
                <label for="sec-answer">Answer:</label><br>
                <textarea class="text_area" id="sec-answer" name="sec-answer" placeholder="Please input the answer to your question" 
                cols="30" rows="5" required></textarea>
                <p style="text-align: center;">
                    <button id="SubmitBacon" type="submit" name="Submit">
                        <img src="icons/SubmitBacon.png" width="230" height="110" alt="submit"/>
                    </button>
                </p>
                <input id="email" class="input_field" name="email" type="text" value="<?php echo "$emailDirty"; ?>">
            </form>
            
        </div>

        <?php include "footer.php"; ?>
    </body>
</html>

