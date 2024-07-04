document.addEventListener("DOMContentLoaded", function() {
    var mainImg = document.getElementById("mainImg");
    var smallImg = document.getElementsByClassName("small-img"); 

    for(let i = 0; i < smallImg.length; i++){
        smallImg[i].onclick = function(){
            mainImg.src = smallImg[i].src;
        }
    }

    document.getElementById("imageProduct").onclick = function () {
        window.location = "single_product.php";
    };
});