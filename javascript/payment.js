document.getElementById("proceed-button").addEventListener("click", function() {
    document.getElementById("checkout-form").submit();
});
document.getElementById("back-button").addEventListener("click", function() {
    window.history.back();
});