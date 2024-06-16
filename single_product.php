<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="StyleSheet" href="assets/css/footer.css" />


    <link rel="icon" href="assets/images/icon/ico-new.png" />

</head>

<body>

    <?php include('includes/navbar-view.php'); ?>

    <!--  Single Product -->
    <section class="container single-product my-5 pt-5">

        <div class="row mt-5 ">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <img src="assets/images/items/s1-itm.jpg" class="image-fluid w-100 pb-1" id="mainImg" />
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="assets\images\clothes\cloth_1.jpg" width="100%" class="small-img" />
                    </div>
                    <div class="small-img-col">
                        <img src="assets\images\clothes\cloth_1.jpg" width="100%" class="small-img" />
                    </div>
                    <div class="small-img-col">
                        <img src="assets\images\clothes\cloth_1.jpg" width="100%" class="small-img" />
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
                <h6>Men/Shoes</h6>
                <h3 class="py-4"> Mens Fashion</h3>
                <h2> RS.3500.00 </h2>
                <input type="number" value="1" />
                <button class="btn btn-success">Add to Cart</button>
                <h4 class="mt-5 mb-5 ">Product Details</h4>
                <span>The details of this product wii be displayed shortyly.
                    The details of this product wii be displayed shortyly
                    The details of this product wii be displayed shortyly
                    The details of this product wii be displayed shortyly
                </span>
            </div>

        </div>

    </section>



    <!--  Related Products -->

    <section id="related-products">

        <div class="container text-center py-5">
            <h3>Related Products</h3>
            <hr class="hr mx-auto ">
        </div>
        <div class="row mx-auto container-fluid">

            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <div class="image" style="background-image: url('assets/images/clothes/cloth_1.jpg');"></div>
                <div class="star">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h5 class="p-name"> Adidas T-Shirt</h5>
                <h4 class="p-price">RS.1200.00</h4>
                <button class="buy-btn btn btn-warning">Buy Now</button>
            </div>

            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <div class="image" style="background-image: url('assets/images/clothes/cloth_1.jpg');"></div>
                <div class="star">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h5 class="p-name"> Adidas T-Shirt</h5>
                <h4 class="p-price">RS.1200.00</h4>
                <button class="buy-btn btn btn-warning">Buy Now</button>
            </div>

            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <div class="image" style="background-image: url('assets/images/clothes/cloth_1.jpg');"></div>
                <div class="star">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h5 class="p-name"> Adidas T-Shirt</h5>
                <h4 class="p-price">RS.1200.00</h4>
                <button class="buy-btn btn btn-warning">Buy Now</button>
            </div>

            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <div class="image" style="background-image: url('assets/images/clothes/cloth_1.jpg');"></div>
                <div class="star">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h5 class="p-name"> Adidas T-Shirt</h5>
                <h4 class="p-price">RS.1200.00</h4>
                <button class="buy-btn btn btn-warning">Buy Now</button>
            </div>
        </div>

        </div>

    </section>





    <!-- Footer -->
    <?php include('includes/footer-view.php'); ?>

    <script src="assets\js\script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- including FontAwesome -->
    <script src="https://kit.fontawesome.com/451b2ce250.js" crossorigin="anonymous"></script>


</body>

</html>