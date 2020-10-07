<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Baycon & E.GG</title>
        <link rel="stylesheet" type="text/css" href="css/forgot-password.css">
        <link rel="stylesheet" type="text/css" href="css/navbar.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
    </head>

    <body>
        <?php include "navbar.php"; ?>
        
        <div id="form_box">

            <form action="validate-email.php" method="post" id="email-form">
                <label for="email" id="title">Please enter your email:</label><br>
                <input id="email" class="input_field" name="email" type="email" size="31" required>
                <p style="text-align: center;">
                    <button id="SubmitBacon" type="submit" name="Submit">
                        <img src="icons/SubmitBacon.png" width="230" height="110" alt="submit" />
                    </button>
                </p>
            </form>
        </div>

        <?php include "footer.php"; ?>
    </body>
</html>