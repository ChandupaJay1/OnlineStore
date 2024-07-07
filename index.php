<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/shop.css" />
    <link rel="StyleSheet" href="assets/css/footer.css" />

    <link rel="icon" href="assets/images/icon/ico-white.png" />
</head>

<body>

    <?php include('includes/navbar-view.php'); ?>


    <!-- home -->

    <section>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: url('assets/images/carousel-img-1.jpg'); background-size: cover; background-position: center;">
                    <div class="carousel-caption text-center">
                        <h5>NEW ARRIVALS</h5>
                        <h1><span>Best Prices</span> this Season</h1>
                        <p>D26 Clothing offers the best products for the most affordable price</p>
                        <button class="btn btn-primary">Shop Now</button>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('assets/images/carousel-img-2.jpg'); background-size: cover; background-position: center;">
                    <div class="carousel-caption text-center">
                        <h5>EXCLUSIVE COLLECTION</h5>
                        <h1><span>Trendy & Stylish</span> Outfits</h1>
                        <p>Discover the latest trends in fashion</p>
                        <button class="btn btn-primary">Explore Now</button>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('assets/images/carousel-img-3.png'); background-size: cover; background-position: center;">
                    <div class="carousel-caption text-center">
                        <h5>SUMMER SALE</h5>
                        <h1><span>Up to 50% Off</span> on Selected Items</h1>
                        <p>Don't miss out on these great deals!</p>
                        <button class="btn btn-primary">Shop Sale</button>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>


    <!-- brandings -->
    <section>
        <div class="container text-center my-5" id="brand">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 my-3">
                    <img class="img-fluid brand-logo" src="assets/images/brand/1-5.jpg" alt="Brand 1" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 my-3">
                    <img class="img-fluid brand-logo" src="assets/images/brand/2-8.jpg" alt="Brand 2" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 my-3">
                    <img class="img-fluid brand-logo" src="assets/images/brand/4-5.jpg" alt="Brand 3" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 my-3">
                    <img class="img-fluid brand-logo" src="assets/images/brand/5-5.jpg" alt="Brand 4" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 my-3">
                    <img class="img-fluid brand-logo" src="assets/images/brand/6-4.jpg" alt="Brand 5" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 my-3">
                    <img class="img-fluid brand-logo" src="assets/images/brand/2-8.jpg" alt="Brand 5" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 my-3">
                    <img class="img-fluid brand-logo" src="assets/images/brand/8-4.jpg" alt="Brand 5" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 my-3">
                    <img class="img-fluid brand-logo" src="assets/images/brand/9-3.jpg" alt="Brand 5" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 my-3">
                    <img class="img-fluid brand-logo" src="assets/images/brand/7-4.jpg" alt="Brand 5" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 my-3">
                    <img class="img-fluid brand-logo" src="assets/images/brand/14-1.jpg" alt="Brand 5" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 my-3">
                    <img class="img-fluid brand-logo" src="assets/images/brand/13-1.jpg" alt="Brand 5" />
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 my-3">
                    <img class="img-fluid brand-logo" src="assets/images/brand/16-min-3.jpg" alt="Brand 5" />
                </div>
            </div>
        </div>
    </section>



    <!--Offers-->

    <div class="container text-center mt-5 py-5">
        <h3>Seasonal Offers</h3>
        <hr class="hr">
        <p>Here you can check out our seasonal offers and discounts.</p>
    </div>

    <section id="offid" class="container">
        <div class="row p-0 m-0">
            <!--One-->
            <div class="off col-lg-4 col-md-6 col-sm-12 p-0 mb-4">
                <img class="img-fluid" src="assets/images/items/s1-itm.jpg" alt="Seasonal Item 1">
                <div class="details">
                    <h2>Item 1</h2>
                    <button class="text-uppercase btn btn-danger">Shop Now</button>
                </div>
            </div>

            <!--Two-->
            <div class="off col-lg-4 col-md-6 col-sm-12 p-0 mb-4">
                <img class="img-fluid" src="assets/images/items/s1-itm.jpg" alt="Seasonal Item 2">
                <div class="details">
                    <h2>Item 2</h2>
                    <button class="text-uppercase btn btn-danger">Shop Now</button>
                </div>
            </div>

            <!--Three-->
            <div class="off col-lg-4 col-md-6 col-sm-12 p-0 mb-4">
                <img class="img-fluid" src="assets/images/items/s1-itm.jpg" alt="Seasonal Item 3">
                <div class="details">
                    <h2>Item 3</h2>
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
            <?php include('connection/get_products.php'); ?>

            <?php while ($row = $featured_product->fetch_assoc()) { ?>
                <div class="product text-center col-lg-3 col-md-4 col-sm-12" id="singleProduct">
                    <img class="image mb-4" src="assets/images/clothes/<?php echo htmlspecialchars($row['product_image']); ?>" />

                    <div class="star">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>

                    <h5 class="p-name"><?php echo htmlspecialchars($row['product_name']); ?></h5>
                    <h4 class="p-price">RS.<?php echo htmlspecialchars($row['product_price']); ?></h4>
                    <a href="<?php echo 'single_product.php?product_id=' . $row['product_id']; ?>">
                        <button class="buy-btn mt-3">Buy Now</button>
                    </a>
                </div>
            <?php } ?>
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
            <h3>Full Suites</h3>
            <hr class="hr mx-auto ">
            <p>Here you can check out our amazing clothes</p>
        </div>

        <div class="row mx-auto container-fluid">
            <?php include('connection/get_products.php'); ?>

            <?php while ($row = $full_suite->fetch_assoc()) { ?>
                <div class="product text-center col-lg-3 col-md-4 col-sm-12" id="singleProduct">
                    <img class="image mb-4" src="assets/images/clothes/<?php echo htmlspecialchars($row['product_image']); ?>" />

                    <div class="star">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>

                    <h5 class="p-name"><?php echo htmlspecialchars($row['product_name']); ?></h5>
                    <h4 class="p-price">RS.<?php echo htmlspecialchars($row['product_price']); ?></h4>
                    <a href="<?php echo 'single_product.php?product_id=' . $row['product_id']; ?>">
                        <button class="buy-btn mt-3">Buy Now</button>
                    </a>
                </div>
            <?php } ?>
        </div>
    </section>

    <!-- End Featured -->

    <!-- Caps -->

    <section>

        <div class="container text-center py-5">
            <h3>Caps</h3>
            <hr class="hr mx-auto ">
            <p>Here you can check out our amazing clothes</p>
        </div>

        <div class="row mx-auto container-fluid">

            <?php include('connection/get_products.php'); ?>

            <?php while ($row = $cap->fetch_assoc()) { ?>
                <div class="product text-center col-lg-3 col-md-4 col-sm-12" id="singleProduct">
                    <img class="image mb-4" src="assets/images/clothes/<?php echo htmlspecialchars($row['product_image']); ?>" />

                    <div class="star">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>

                    <h5 class="p-name"><?php echo htmlspecialchars($row['product_name']); ?></h5>
                    <h4 class="p-price">RS.<?php echo htmlspecialchars($row['product_price']); ?></h4>
                    <a href="<?php echo 'single_product.php?product_id=' . $row['product_id']; ?>">
                        <button class="buy-btn mt-3">Buy Now</button>
                    </a>
                </div>
            <?php } ?>

        </div>

    </section>

    <!-- End Caps -->

    <!-- Tshirts -->

    <section>

        <div class="container text-center py-5">
            <h3>T-Shirts</h3>
            <hr class="hr mx-auto ">
            <p>Here you can check out our amazing clothes</p>
        </div>

        <div class="row mx-auto container-fluid">

            <?php include('connection/get_products.php'); ?>

            <?php while ($row = $tshirt->fetch_assoc()) { ?>
                <div class="product text-center col-lg-3 col-md-4 col-sm-12" id="singleProduct">
                    <img class="image mb-4" src="assets/images/clothes/<?php echo htmlspecialchars($row['product_image']); ?>" />

                    <div class="star">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>

                    <h5 class="p-name"><?php echo htmlspecialchars($row['product_name']); ?></h5>
                    <h4 class="p-price">RS.<?php echo htmlspecialchars($row['product_price']); ?></h4>
                    <a href="<?php echo 'single_product.php?product_id=' . $row['product_id']; ?>">
                        <button class="buy-btn mt-3">Buy Now</button>
                    </a>
                </div>
            <?php } ?>

        </div>

    </section>

    <!-- End Tshirts -->





    <!-- footer -->
    <?php include('includes/footer-view.php'); ?>

    <script src="assets\js\script.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-vtXRMe3mGCbOeY7l30aIg8H9p3GdeSe4IFlP6G8JMa7o7lXvnz3GFKzPxzJdPfGK" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/451b2ce250.js" crossorigin="anonymous"> </script>


</body>

</html>