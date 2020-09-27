<?php
    $servername = "localhost";
    $username = "root";
    $dbPassword = "";
    $dbname = "bayconegg";
    $valid = false;

    // Create connection
    $conn = new mysqli($servername, $username, $dbPassword, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $phone = $_POST["phone"];
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $userPassword = mysqli_real_escape_string($conn, $_POST["password"]);
    $securityQuestion = mysqli_real_escape_string($conn, $_POST["sec-question"]);
    $securityAns = mysqli_real_escape_string($conn, $_POST["sec-answer"]);

    $sql="SELECT * FROM user WHERE email = '$email';";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) { 
        $row = mysqli_fetch_assoc($res);    
        if($email==$row['email']) 
        {
            echo '
            <script type="text/javascript">
                alert("Email has been taken! Please use another email or click \"Forget Password\"");
                window.location = "../sign-up.php";
            </script>
            ';
        }
    }
    else{
        echo '
        <script type="text/javascript">
            alert("Account registration successful!");
            window.location = "../login.php";
        </script>
        ';
        $valid = true;
    }

    // After everything is validated
    if($valid == true){
        $sql = "INSERT INTO user (email, passwd, phone)
        VALUES ('$email', '$userPassword', '$phone')";
    
        if ($conn->query($sql) === TRUE) {
            echo "User account created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $sql = "INSERT INTO security_question (question, answer)
        VALUES ('$securityQuestion', '$securityAns')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Security question saved successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>