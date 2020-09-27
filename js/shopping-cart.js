decreaseButtons = document.getElementsByClassName("shopping-cart-decrease-button");
increaseButtons = document.getElementsByClassName("shopping-cart-increase-button");
deleteButtons = document.getElementsByClassName("shopping-cart-delete-button");
shoppingCartItems = document.getElementsByClassName("shopping-cart-item");
horizontalRules = document.getElementsByClassName("shopping-cart-horizontal-rule");
priceArray = document.getElementsByClassName("shopping-cart-item-price");
quantityArray = document.getElementsByClassName("shopping-cart-quantity-value");
totalPrice = parseFloat(document.getElementById("shopping-cart-total-value").innerHTML);

updateElements();
updateTotal();

function decrement(i) {
    let quantity = decreaseButtons[i].nextElementSibling.innerHTML;
    if (quantity > 1) {
        quantity--;
        decreaseButtons[i].nextElementSibling.innerHTML = quantity;
        updateTotal();
    }
}

function increment(i) {
    let quantity = increaseButtons[i].previousElementSibling.innerHTML;
    if (quantity < 69) {
        quantity++;
        increaseButtons[i].previousElementSibling.innerHTML = quantity;
        updateTotal();
    }
}

function remove(i) {
    let confirmRemove = confirm("Are you sure you want to remove this item from the cart?");
    if(confirmRemove){
        shoppingCartItems[i].remove();
        horizontalRules[i].remove();
        cart.splice(i, 1);
        updateElements();
        updateCart();
    }
    updateTotal();
}

function updateTotal() {
    totalPrice = 0;
    for (let i = 0; i < priceArray.length ; i++) {
        totalPrice += parseFloat(priceArray[i].innerHTML) * parseInt(quantityArray[i].innerHTML);
    }
    document.getElementById("shopping-cart-total-value").innerHTML = totalPrice.toFixed(2);
}

function updateElements() {
    if(shoppingCartItems.length != 0 ){
        // Remove event listener to all buttons for each individual cart item
        // Use element.outerHTML = element.outerHTML;
        for (let i = 0; i < decreaseButtons.length ; i++) {
            decreaseButtons[i].outerHTML = decreaseButtons[i].outerHTML;
            increaseButtons[i].outerHTML = increaseButtons[i].outerHTML;
            deleteButtons[i].outerHTML = deleteButtons[i].outerHTML;
        }
    }   

    if(shoppingCartItems.length != 0 ){
        // Assign event listener to all buttons for each individual cart item
        for (let i = 0; i < decreaseButtons.length ; i++) {
            decreaseButtons[i].addEventListener("click", function() { decrement(i); });
            increaseButtons[i].addEventListener("click", function() { increment(i); });
            deleteButtons[i].addEventListener("click", function() { remove(i); });
        }
    }   
}

function updateCart() {
    document.cookie = "gameIdList = " + cart;
    window.location = "form-handlers/check-cart.php";
}

function proceedPayment() {
    document.cookie = "gameIdList = ";
    alert("Thank you for your purchase! You can find your game code(s) in your email within 69 hours.");
    window.location = "form-handlers/check-cart.php";
}