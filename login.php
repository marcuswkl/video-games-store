<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    
</head>
<body>
    
    <?php include "navbar.php"; ?>
    
    <p id="title">LOGIN</p>
    
    <br><br>

    <div id="form_box">
        <form action="form-handlers/login-form.php" method="POST">
            
            <label for="email">EMAIL</label><br>
            <input id="email" class="input_field" name="email" type="email" size="31" required>

            <br><br>

            <label for="password">PASSWORD</label><br>
            <input id="password" class="input_field" name="password" type="password" size="31" required>
        
            <a href="forgot-password.php" id="forget-password-link">Forgot password?</a>

            <p style="text-align: center;">
                <button id="LoginBacon" type="submit">
                    <img src="Icons/LoginBacon.png" width="230" height="110" alt="submit" />
                </button>
            </p>
        </form>  
    </div>

    <br>
        
    <p style="text-align: center; font-family: 'Abel', sans-serif; font-size: 25px; 
    ">Don't have an account?<br>
    Sign up <a href="sign-up.php" id="here" >here</a>.</p>

    <?php include "footer.php"; ?>

</body>
</html>