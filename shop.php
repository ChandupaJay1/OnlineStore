<?php

include('connection/config.php');

//use the search section
if (isset($_POST['search'])) {

    $category = $_POST['category'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("SELECT * FROM `products` WHERE product_category=? AND product_price<=?");

    $stmt->bind_param("si", $category, $price);

    $stmt->execute();

    $products = $stmt->get_result();


    //return all products
} else {
    $stmt = $conn->prepare("SELECT * FROM `products`");

    $stmt->execute();

    $products = $stmt->get_result();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/shop.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="icon" href="assets/images/icon/ico-new.png" />

</head>

<body>

    <?php include('includes/navbar-view.php'); ?>

    <div class="container my-5">
        <div class="row">
            <!-- Search Section -->
            <aside id="search" class="col-lg-3 col-md-4 col-sm-12">
                <div class="my-5 py-3 text-center">
                    <h5>Search Products</h5>
                </div>

                <form action="shop.php" method="POST">
                    <div class="mb-3">
                        <p class="fw-bold">Category</p>
                        <div class="form-check">
                            <input class="form-check-input" value="Full Suite" type="radio" name="category" id="category_one" />
                            <label class="form-check-label" for="category_one">
                                Full Suite
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" value="Cap" type="radio" name="category" id="category_two" checked />
                            <label class="form-check-label" for="category_two">
                                Caps
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" value="Shirts" type="radio" name="category" id="category_three" />
                            <label class="form-check-label" for="category_three">
                                Shirts
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <p class="fw-bold">Price</p>
                        <input type="range" class="form-range w-100" min="1" max="5000" id="customRange2" name="price" value="100" />
                        <div class="d-flex justify-content-between">
                            <span>1</span>
                            <span>5000</span>
                        </div>
                    </div>

                    <div class="form-group my-3">
                        <input type="submit" name="search" value="Search" class="btn btn-primary w-100" />
                    </div>
                </form>
            </aside>

            <!-- Products Section -->
            <section id="featured" class="col-lg-9 col-md-8 col-sm-12 my-5 py-5">
                <div class="container text-center py-5">
                    <h3>Our Products</h3>
                    <hr class="mx-auto">
                    <p>Here you can check out our amazing clothes</p>
                </div>
                <div class="row">
                    <?php while ($row = $products->fetch_assoc()) { ?>
                        <div onclick="window.location.href='single_product.php';" class="product text-center col-lg-4 col-md-6 col-sm-12 mb-4">
                            <img class="image mb-4" src="assets/images/clothes/<?php echo $row['product_image']; ?>" />
                            <div class="star">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                            <h4 class="p-price">Rs. <?php echo $row['product_price']; ?></h4>
                            <a class="buy-btn mt-3" href="<?php echo "single_product.php?product_id=" . $row['product_id']; ?>">Buy Now</a>
                        </div>
                    <?php } ?>
                </div>

                <nav aria-label="Page navigation example">
                    <ul class="pagination mt-5">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </section>
        </div>
    </div>

    <!-- footer -->
    <?php include('includes/footer-view.php'); ?>

    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- including FontAwesome -->
    <script src="https://kit.fontawesome.com/451b2ce250.js" crossorigin="anonymous"></script>
</body>

</html>