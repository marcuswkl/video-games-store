<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" type="text/css" href="css/faq.css">
</head>
<body>

    <?php include "navbar.php"; ?>
    
    <p id="faq-title">F A Q</p>
    <div id="faq-box">
        
        <div class="question-box">
            <p class="question">1. Do crabs think that fishes are flying?</p>
            <p class="answer">A good question... Admin could not ignore the fact that fishes walk just like how Mr. Krabs walks on the seabed, therefore it is a big NO from the admin.</p>
        </div>

        <br>

        <div class="question-box">
            <p class="question">2. Do we sell every game on the market?</p>
            <p class="answer">Yes... game will be updated from time to time, so stay tuned for our upcoming games :D</p>
        </div>

        <br>

        <div class="question-box">
            <p class="question">3. Can you guys have more sales? I'm poor but I wanted to play good games :(</p>
            <p class="answer">No money ah? Go goreng pisang and sell coconut wotah 🥵</p>
        </div>

        <br>

        <div class="question-box">
            <p class="question">4. What is the admin's favourite number?</p>
            <p class="answer"> 6..... iykyk :3</p>
        </div>
        
    </div>

    <script>
        var coll = document.getElementsByClassName("question");
        var i;

        for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
            content.style.display = "none";
            } else {
            content.style.display = "block";
            }
        });
        }
        </script>

        <script>
            for(var i = 0; i < 5; i++) { 
                document.write("<br>");
            }
        </script>

    <?php include "footer.php"; ?>

</body>
</html>