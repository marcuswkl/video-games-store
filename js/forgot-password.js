function revealHidden(){
    var email = document.getElementById("email").value;
    var hidden = document.getElementsByClassName("hidden");
    
    //Reveal hidden
    hidden.className.replace("hidden" , "");

}

function hideHidden(){
    var email = document.getElementById("email").value;
    var hidden = document.getElementsByClassName("hidden");
    
    //To hide hidden 
    hidden.className += "hidden";
}

revealHidden();

function validateEmail(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("sec-question").innerHTML = this.responseText;
        
      }
    };
    xmlhttp.open("POST","../emailValidation.php?q="+str,true);
    xmlhttp.send();
}













