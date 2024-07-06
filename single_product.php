<?php

include('connection/config.php');

if (isset($_GET['product_id'])) {

    $product_id = $_GET['product_id'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id =? ");
    $stmt->bind_param("i", $product_id);

    $stmt->execute();

    $product = $stmt->get_result(); //[]

} else {

    header('location: index.php');
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Single Product</title>

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

            <?php while ($row = $product->fetch_assoc()) { ?>


                <div class="col-lg-5 col-md-6 col-sm-12">
                    <img src="assets/images/clothes/<?php echo $row['product_image']; ?>" class="image-fluid w-100 pb-1" id="mainImg" />
                    <div class="small-img-group">
                        <div class="small-img-col">
                            <img src="assets/images/clothes/<?php echo $row['product_image2']; ?>" width="100%" class="small-img" />
                        </div>
                        <div class="small-img-col">
                            <img src="assets/images/clothes/<?php echo $row['product_image3']; ?>" width="100%" class="small-img" />
                        </div>
                        <div class="small-img-col">
                            <img src="assets/images/clothes/<?php echo $row['product_image4']; ?>" width="100%" class="small-img" />
                        </div>
                    </div>
                </div>



                <div class="col-lg-6 col-md-12 col-12">
                    <h6>Men/Shoes</h6>
                    <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
                    <h2> RS.<?php echo $row['product_price']; ?></h2>

                    <form method="POST" action="cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $row['product_id'] ?>" />
                        <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>" />
                        <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>" />
                        <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>" />


                        <input type="number" name="product_quantity" value="1" />
                        <button class="btn btn-success" type="submit" name="add_to_cart">Add to Cart</button>

                    </form>

                    <h4 class="mt-5 mb-5 ">Product Details</h4>
                    <span><?php echo $row['product_description']; ?>
                    </span>
                </div>



            <?php } ?>

        </div>

    </section>



    <!--  Related Products -->

    <section id="related-products">

        <div class="container text-center py-5">
            <h3>Related Products</h3>
            <hr class="hr mx-auto ">
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
                        <button class="buy-btn btn btn-warning">Buy Now</button>
                    </a>
                </div>
            <?php } ?>
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