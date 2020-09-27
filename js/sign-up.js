function validate(){

    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm-password").value;
    var emailValid, passwordValid = false;
    const emailRegex = RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);

    if(!email.match(emailRegex)){
        document.getElementById("emailValidation").style.display = "block";
        document.getElementById("RegisterBacon").disabled = true;
        emailValid = false;
    } 
    else{
        document.getElementById("emailValidation").style.display = "none";
        emailValid = true;
    }
    if(!password.match(confirmPassword)){
        document.getElementById("passwordValidation").style.display = "block";
        document.getElementById("RegisterBacon").disabled = true;
        passwordValid = false;
    }
    else{
        document.getElementById("passwordValidation").style.display = "none";
        passwordValid = true;
    }
    if(emailValid == true && passwordValid == true){
        document.getElementById("RegisterBacon").disabled = false;
    }

}