<?php
session_start();

    $email = $_POST["email"];
    $userPassword = $_POST["password"];

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

    $sql="SELECT * FROM user WHERE email = '$email';";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {                                  //Email exists                            
        $row = mysqli_fetch_assoc($res);    
        if($email==$row['email'] && $userPassword==$row['passwd'])    //Email exists in database AND password matches
        {
            $valid = true;
            if($row['isAdmin'] == 1){
                $admin = true;
            }
        } else {                                                      //Email exists BUT password mismatched
            echo '
            <script type="text/javascript">
                alert("The email or password is incorrect.");
                window.location = "../login.php";
            </script>
            ';
            $valid = false;
        }
    } else {                                                          //Email does not exist
        echo '
        <script type="text/javascript">
            alert("The email or password is incorrect.");
            window.location = "../login.php";
        </script>
        ';
        $valid = false;
    }
    

    // After everything is validated
    if($valid == true) {

        if($admin == true){
            // Redirect admin to admin.php
            echo'
            <script type="text/javascript">
                alert("Welcome Admin");
                window.location = "../admin.php";
            </script>';
            $_SESSION["username"] = strstr($email, '@', true);
            $_SESSION["email"] = $email;
        }     
        else {
            //Redirect user to index.php
            echo '
            <script type="text/javascript">
                alert("You have successfully logged in.");
                window.location = "../index.php";
            </script>
            ';
            $_SESSION["username"] = strstr($email, '@', true);
            $_SESSION["email"] = $email;
        }
        
    }

    $conn->close();
?>