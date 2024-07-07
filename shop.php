<?php

include('connection/config.php');

// Initialize an empty query
$search_query = "SELECT * FROM `products` WHERE 1=1";
$params = [];
$types = "";

// Maintain filter states
$category = isset($_POST['category']) ? $_POST['category'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';
$keywords = isset($_POST['keywords']) ? $_POST['keywords'] : '';
$sort_by = isset($_POST['sort_by']) ? $_POST['sort_by'] : 'name_asc';

if (isset($_POST['search'])) {
    // Filter by category
    if (!empty($category)) {
        $search_query .= " AND product_category = ?";
        $params[] = $category;
        $types .= "s";
    }

    // Filter by price
    if (!empty($price)) {
        $search_query .= " AND product_price <= ?";
        $params[] = $price;
        $types .= "i";
    }

    // Filter by keywords
    if (!empty($keywords)) {
        $keywords_param = "%" . $keywords . "%";
        $search_query .= " AND (product_name LIKE ? OR product_description LIKE ?)";
        $params[] = $keywords_param;
        $params[] = $keywords_param;
        $types .= "ss";
    }
}

// Sort by
if (!empty($sort_by)) {
    if ($sort_by == 'name_asc') {
        $search_query .= " ORDER BY product_name ASC";
    } elseif ($sort_by == 'name_desc') {
        $search_query .= " ORDER BY product_name DESC";
    } elseif ($sort_by == 'price_asc') {
        $search_query .= " ORDER BY product_price ASC";
    } elseif ($sort_by == 'price_desc') {
        $search_query .= " ORDER BY product_price DESC";
    }
} else {
    $search_query .= " ORDER BY product_name ASC";
}

$stmt = $conn->prepare($search_query);

if ($params) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();

$products = $stmt->get_result();

if ($stmt->error) {
    echo "Error: " . $stmt->error;
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
                    <h5 class="h5-shop">Search Products</h5>
                </div>

                <form action="shop.php" method="POST">
                    <div class="mb-3">
                        <p class="fw-bold">Category</p>
                        <div class="form-check">
                            <input class="form-check-input" value="full suite" type="radio" name="category" id="category_one" <?php echo ($category == 'full suite') ? 'checked' : ''; ?> />
                            <label class="form-check-label" for="category_one">
                                Full Suite
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" value="cap" type="radio" name="category" id="category_two" <?php echo ($category == 'cap') ? 'checked' : ''; ?> />
                            <label class="form-check-label" for="category_two">
                                Caps
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" value="tshirt" type="radio" name="category" id="category_three" <?php echo ($category == 'tshirt') ? 'checked' : ''; ?> />
                            <label class="form-check-label" for="category_three">
                                T-Shirts
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <p class="fw-bold">Price</p>
                        <input type="range" class="form-range w-100" min="500" max="10000" id="customRange2" name="price" value="<?php echo $price; ?>" />
                        <div class="d-flex justify-content-between">
                            <span>500</span>
                            <span>10,000</span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <p class="fw-bold">Keywords</p>
                        <input type="text" class="form-control" name="keywords" placeholder="Enter keywords" value="<?php echo $keywords; ?>" />
                    </div>

                    <div class="mb-3">
                        <p class="fw-bold">Sort By</p>
                        <select class="form-select" name="sort_by">
                            <option value="name_asc" <?php echo ($sort_by == 'name_asc') ? 'selected' : ''; ?>>Name (A-Z)</option>
                            <option value="name_desc" <?php echo ($sort_by == 'name_desc') ? 'selected' : ''; ?>>Name (Z-A)</option>
                            <option value="price_asc" <?php echo ($sort_by == 'price_asc') ? 'selected' : ''; ?>>Price (Low to High)</option>
                            <option value="price_desc" <?php echo ($sort_by == 'price_desc') ? 'selected' : ''; ?>>Price (High to Low)</option>
                        </select>
                    </div>

                    <div class="form-group my-3">
                        <input type="submit" name="search" value="Search" class="btn btn-primary w-100" />
                    </div>

                    <div class="form-group my-3">
                        <a href="shop.php" class="btn btn-secondary w-100">Reset Filters</a>
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
                            <a href="<?php echo "single_product.php?product_id=" . $row['product_id']; ?>"><button class="buy-btn mt-1">Buy Now</button></a>
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