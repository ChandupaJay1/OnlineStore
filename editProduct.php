<?php
include('connection/config.php');

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $stmt = $conn->prepare("SELECT * FROM `products` WHERE `product_id`=?");
    $stmt->bind_param('i', $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
} else if (isset($_POST['edit_btn'])) {
    $product_id = $_POST['product_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $color = $_POST['color'];
    $category = $_POST['category'];

    // Handle image uploads
    $image1 = $_FILES['image1']['tmp_name'];
    $image2 = $_FILES['image2']['tmp_name'];
    $image3 = $_FILES['image3']['tmp_name'];
    $image4 = $_FILES['image4']['tmp_name'];

    $image_name1 = $title . "1.jpg";
    $image_name2 = $title . "2.jpg";
    $image_name3 = $title . "3.jpg";
    $image_name4 = $title . "4.jpg";

    if (!empty($image1)) {
        move_uploaded_file($image1, "assets/images/clothes/" . $image_name1);
    }
    if (!empty($image2)) {
        move_uploaded_file($image2, "assets/images/clothes/" . $image_name2);
    }
    if (!empty($image3)) {
        move_uploaded_file($image3, "assets/images/clothes/" . $image_name3);
    }
    if (!empty($image4)) {
        move_uploaded_file($image4, "assets/images/clothes/" . $image_name4);
    }

    $stmt = $conn->prepare("UPDATE `products` SET `product_name`=?, `product_description`=?, `product_price`=?, `product_qty`=?, `product_color`=?, `product_category`=?, `product_image`=?, `product_image2`=?, `product_image3`=?, `product_image4`=? WHERE `product_id`=?");
    $stmt->bind_param('sssissssssi', $title, $description, $price, $quantity, $color, $category, $image_name1, $image_name2, $image_name3, $image_name4, $product_id);

    if ($stmt->execute()) {
        header('location: product.php?edit_success_message=Product has been updated successfully!');
    } else {
        header('location: product.php?edit_failure_message=Error occurred, try again!');
    }
    exit;
} else {
    header('location: product.php');
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/images/icon/ico-new.png" />
</head>

<body>

    <?php include('adminHeader.php'); ?>

    <div class="container-fluid">
        <div class="row" style="min-height: 1000px">
            <?php include('sideMenu.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mt-3">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mc-2"></div>
                    </div>
                </div>

                <h2>Edit Product</h2>
                <div class="table-responsive">
                    <div class="mx-auto container">
                        <form id="edit-form" method="POST" action="editProduct.php" enctype="multipart/form-data">
                            <p style="color: red;"><?php if (isset($_GET['error'])) {
                                                        echo $_GET['error'];
                                                    } ?></p>

                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>" />

                            <div class="form-group mt-2">
                                <label>Title</label>
                                <input type="text" class="form-control" id="product-name" value="<?php echo $product['product_name']; ?>" name="title" placeholder="Title" required />
                            </div>

                            <div class="form-group mt-2">
                                <label>Description</label>
                                <input type="text" class="form-control" id="product-desc" value="<?php echo $product['product_description']; ?>" name="description" placeholder="Description" required />
                            </div>

                            <div class="form-group mt-2">
                                <label>Price</label>
                                <input type="number" class="form-control" id="product-price" value="<?php echo $product['product_price']; ?>" name="price" placeholder="Price" required />
                            </div>

                            <div class="form-group mt-2">
                                <label>Quantity</label>
                                <input type="number" class="form-control" id="product-qty" value="<?php echo $product['product_qty']; ?>" name="quantity" placeholder="Quantity" required />
                            </div>

                            <div class="form-group mt-2">
                                <label>Color</label>
                                <input type="text" class="form-control" id="product-color" value="<?php echo $product['product_color']; ?>" name="color" placeholder="Color" required />
                            </div>

                            <div class="form-group mt-2">
                                <label>Category</label>
                                <select class="form-select" required name="category">
                                    <option value="featured" <?php if ($product['product_category'] == 'featured') echo 'selected'; ?>>Featured</option>
                                    <option value="cap" <?php if ($product['product_category'] == 'cap') echo 'selected'; ?>>Cap</option>
                                    <option value="full suite" <?php if ($product['product_category'] == 'full suite') echo 'selected'; ?>>Full Suite</option>
                                    <option value="tshirt" <?php if ($product['product_category'] == 'tshirt') echo 'selected'; ?>>T-Shirts</option>
                                </select>
                            </div>

                            <div class="form-group mt-2">
                                <label>Image 1</label>
                                <input type="file" class="form-control" id="image1" name="image1" placeholder="Image 1" />
                            </div>

                            <div class="form-group mt-2">
                                <label>Image 2</label>
                                <input type="file" class="form-control" id="image2" name="image2" placeholder="Image 2" />
                            </div>

                            <div class="form-group mt-2">
                                <label>Image 3</label>
                                <input type="file" class="form-control" id="image3" name="image3" placeholder="Image 3" />
                            </div>

                            <div class="form-group mt-2">
                                <label>Image 4</label>
                                <input type="file" class="form-control" id="image4" name="image4" placeholder="Image 4" />
                            </div>

                            <div class="form-group buy-btn-container mt-3">
                                <input type="submit" class="btn btn-primary" name="edit_btn" value="Save Product" />
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/451b2ce250.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>