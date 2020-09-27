var slideIndex = -1;
var slides = document.getElementsByClassName("images");
var bar = document.getElementsByClassName("bar");
autoSlides();

// Bar controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

//When user clicks on bar
function showSlides(n) {
    var i;
    //Make slides invisible
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    //Make bars inactive
    for (i = 0; i < bar.length; i++) {
        bar[i].className = bar[i].className.replace(" active", "");
    }

    //Show picture and set active bar
    slides.item(n).style.display = "block";
    bar.item(n).className += " active";
} 

//Auto slideshow controls
function autoSlides(){
    //Increment slideIndex & Wrap around when slideIndex exceeds length
    slideIndex++;
    if(slideIndex >= slides.length){
        slideIndex = 0;
    }
    //Show picture and set active bar
    showSlides(slideIndex);
    //Change image every 7 seconds
    setTimeout(autoSlides,7000); 
}

