document.addEventListener("DOMContentLoaded", function() {
    var mainImg = document.getElementById("mainImg");
    var smallImg = document.getElementsByClassName("small-img"); 

    if (mainImg && smallImg.length > 0) {
        for (let i = 0; i < smallImg.length; i++) {
            smallImg[i].onclick = function() {
                mainImg.src = smallImg[i].src;
            }
        }
    }

    var imageProduct = document.getElementById("imageProduct");
    if (imageProduct) {
        imageProduct.onclick = function() {
            window.location = "single_product.php";
        };
    }
});