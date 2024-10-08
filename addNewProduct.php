<?php

include('connection/config.php');

if(isset($_POST['create_product'])){

    $product_name = $_POST['name'];
    $product_description = $_POST['description'];
    $product_price = $_POST['price'];
    $product_category = $_POST['category'];
    $product_qty = $_POST['quantity']; // Ensure the name attribute matches the form input
    $product_color = $_POST['product_color'];
    
    // Ensure all fields are filled
    if(empty($product_name) || empty($product_description) || empty($product_price) || empty($product_category) || empty($product_qty) || empty($product_color)) {
        header('location: product.php?product_failed=Please fill all fields.');
        exit();
    }

    $image1 = $_FILES['image1']['tmp_name'];
    $image2 = $_FILES['image2']['tmp_name'];
    $image3 = $_FILES['image3']['tmp_name'];
    $image4 = $_FILES['image4']['tmp_name'];

    $image_name1 = $product_name."1.jpg";
    $image_name2 = $product_name."2.jpg";
    $image_name3 = $product_name."3.jpg";
    $image_name4 = $product_name."4.jpg";

    // Check if images were uploaded successfully
    if (!move_uploaded_file($image1, "assets/images/uploads/".$image_name1) || 
        !move_uploaded_file($image2, "assets/images/uploads/".$image_name2) || 
        !move_uploaded_file($image3, "assets/images/uploads/".$image_name3) || 
        !move_uploaded_file($image4, "assets/images/uploads/".$image_name4)) {
        header('location: product.php?product_failed=Failed to upload images.');
        exit();
    }

    // create new product
    $stmt = $conn->prepare("INSERT INTO `products` (`product_name`, `product_category`, `product_description`,
     `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_qty`, `product_color`)
     VALUES (?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param('ssssssssss', $product_name, $product_category, $product_description, $image_name1, $image_name2,
                      $image_name3, $image_name4, $product_price, $product_qty, $product_color);
    
    if($stmt->execute()){
        header('location: product.php?product_created=Product has been added successfully!');
    } else {
        header('location: product.php?product_failed=Error occurred, try again');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
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

                <h2>Add New Product</h2>
                <div class="table-responsive">
                    <div class="mx-auto container">
                        <form id="edit-form" method="POST" action="createProduct.php" enctype="multipart/form-data">
                            <p style="color: red;"><?php if (isset($_GET['error'])) {
                                                        echo $_GET['error'];
                                                    } ?></p>

                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>" />

                            <div class="form-group mt-2">
                                <label>Title</label>
                                <input type="text" class="form-control" id="product-name" name="name" placeholder="Title" required />
                            </div>

                            <div class="form-group mt-2">
                                <label>Description</label>
                                <input type="text" class="form-control" id="product-desc" name="description" placeholder="Description" required />
                            </div>

                            <div class="form-group mt-2">
                                <label>Price</label>
                                <input type="text" class="form-control" id="product-price" name="price" placeholder="Price" required />
                            </div>

                            <div class="form-group mt-2">
                                <label>Quantity</label>
                                <input type="text" class="form-control" id="product-qty" name="quantity" placeholder="Quantity" required />
                            </div>

                            <div class="form-group mt-2">
                                <label>Color</label>
                                <input type="text" class="form-control" id="product-color" name="product_color" placeholder="Color" required />
                            </div>

                            <div class="form-group mt-2">
                                <label>Category</label>
                                <select class="form-select" required name="category">
                                    <option value="featured">Featured</option>
                                    <option value="cap">Caps</option>
                                    <option value="full suite">Full suites</option>
                                    <option value="tshirt">T-Shirts</option>
                                </select>
                            </div>

                            <div class="form-group mt-2">
                                <label>Image 1</label>
                                <input type="file" class="form-control" id="image1" name="image1" placeholder="Image 1" required />
                            </div>

                            <div class="form-group mt-2">
                                <label>Image 2</label>
                                <input type="file" class="form-control" id="image2" name="image2" placeholder="Image 2" required />
                            </div>

                            <div class="form-group mt-2">
                                <label>Image 3</label>
                                <input type="file" class="form-control" id="image3" name="image3" placeholder="Image 3" required />
                            </div>

                            <div class="form-group mt-2">
                                <label>Image 4</label>
                                <input type="file" class="form-control" id="image4" name="image4" placeholder="Image 4" required />
                            </div>

                            <div class="form-group buy-btn-container mt-3">
                                <input type="submit" class="btn btn-primary" name="create_product" value="Add Product" />
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