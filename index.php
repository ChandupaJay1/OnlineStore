<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="StyleSheet" href="assets/css/footer.css" />

    <link rel="icon" href="assets/images/icon/ico-white.png" />
</head>

<body>

    <?php include('includes/navbar-view.php'); ?>


    <!-- home -->

    <section>
        <div class="container" id="home">
            <h5>NEW ARRIVALS</h5>
            <h1><span>Best Prices</span> this Season</h1>
            <p>D26 Clothing offer the best products for the most affrodable price</p>
            <button class="btn btn-primary">Shop Now</button>
        </div>
    </section>

    <!-- brandings -->
    <section>
        <div class="container" id="brand">

            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/brand/brand_1.png" />
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/brand/brand_2.jpg" />
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/brand/brand_6.jpg" />
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/brand/brand_4.png" />
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/images/brand/brand_5.jpg" />

        </div>
    </section>



    <!--Offers-->

    <div class="container text-center mt-5 py-5">
        <h3>Seasonal Offers</h3>
        <hr class="hr">
        <p>Here you can check out our Seasonal offers and discounts.</p>
    </div>

    <section id="offid" class="container">

        <div class="row p-0 m-0">

            <!--One-->
            <div class="off col-lg-4 col-sm-12 p-0">
                <img class="img-fluid" src="assets/images/items/s1-itm.jpg">
                <div class="details">
                    <h2> xxxxxxxx </h2>
                    <button class="text-uppercase btn btn-danger">Shop Now</button>
                </div>
            </div>

            <!--Two-->
            <div class="off col-lg-4 col-sm-12 p-0">
                <img class="img-fluid" src="assets/images/items/s1-itm.jpg">
                <div class="details">
                    <h2>xxxxxxxx</h2>
                    <button class="text-uppercase btn btn-danger">Shop Now</button>
                </div>
            </div>

            <!--Three-->
            <div class="off col-lg-4 col-sm-12 p-0">
                <img class="img-fluid" src="assets/images/items/s1-itm.jpg">
                <div class="details">
                    <h2>xxxxxxxx</h2>
                    <button class="text-uppercase btn btn-danger">Shop Now</button>
                </div>
            </div>

        </div>
    </section>


    <!-- Clothes -->

    <section>

        <div class="container text-center py-5">
            <h3>Our Featured</h3>
            <hr class="hr mx-auto ">
            <p>Here you can check out our featured items</p>
        </div>

        <div class="row mx-auto container-fluid">
            <?php include('connection/get_featured_product.php'); ?>

            <?php while ($row = $featured_product->fetch_assocC()){?>

            <div class="product text-center col-lg-3 col-md-4 col-sm-12" id="singleProduct">
                <div class="image" style="background-image: url('assets/images/<?php echo $row['product_image'] ?>');"></div>
                <div class="star">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name']?></h5>
                <h4 class="p-price"><?php echo $row['product_price']?></h4>
                <button class="buy-btn btn btn-warning">Buy Now</button>

            </div>

            <?php }  ?>

        </div>

    </section>


    <!-- banner -->
    <section>
        <div id="banner" class="container mt-5">
            <div id="banner-card">
                <h4>YEAR FIRST SEASON'S SALE</h4>
                <h1>Aurudu Collection <br> UP to 30% OFF</h1>
                <button class="btn btn-warning text-uppercase">shop now</button>
            </div>
        </div>
    </section>



    <!-- featured -->

    <section>

        <div class="container text-center py-5">
            <h3>Dresses & Coats</h3>
            <hr class="hr mx-auto ">
            <p>Here you can check out our amazing clothes</p>
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

    </section>


    <!-- footer -->
    <?php include('includes/footer-view.php'); ?>

    <script src="assets\js\script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- including FontAwesome -->
    <script src="https://kit.fontawesome.com/451b2ce250.js" crossorigin="anonymous"></script>


</body>

</html>