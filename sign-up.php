<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <script src="js/sign-up.js"></script>

</head>
<body>

    <?php include "navbar.php"; ?>

    <p id="title">SIGN UP</p>
   
   <br>

    <div id="form_box">
        <form action="form-handlers/sign-up-form.php" method="post">
            
            <label for="email">EMAIL</label><br>
            <input class="input_field" id="email" name="email" type="email" placeholder="hellocannot@gsc.com" onblur="validate()" required>
            
            <p id="emailValidation">Invalid email! Please type a valid email.</p>

            <br><br>

            <label for="password">PASSWORD</label><br>
            <input class="input_field" id="password" name="password" type="password" onblur="validate()" required>
    
            <br><br>

            <label for="confirm-password">CONFIRM PASSWORD</label><br>
            <input class="input_field" id="confirm-password" name="confirm-password" type="password" onblur="validate()" required>         
    
            <p id="passwordValidation">Password do not match! Please check your password.</p>

            <br><br>

            <label for="phone">PHONE NUMBER</label><br>
            <input class="input_field" id="phone" name="phone" type="tel" placeholder="012-3456789" pattern="01[0-9]-[0-9]{7,8}"
            onblur="validate()" required>
    
            <br><br>

            <label for="sec-question">SECURITY QUESTION</label><br>
            <textarea class="text_area" id="sec-question" name="sec-question" 
            placeholder="Please input a question only you know the answer to" cols="30" rows="5" required></textarea>
    
            <br><br>

            <label for="sec-answer">ANSWER</label><br>
            <textarea class="text_area" id="sec-answer" name="sec-answer" 
            placeholder="Please input the answer to your question and store it safely" cols="30" rows="5" required></textarea>
    
            <br><br>
            
            <p style="text-align: center;">
                <button id="RegisterBacon" type="submit" name="Register" disabled>
                    <img src="icons/RegisterBacon.png" width="230" height="110" alt="submit" />
                </button>
            </p>
        </form>  
    </div>
        
    <?php include "footer.php"; ?>
    
</body>
</html>