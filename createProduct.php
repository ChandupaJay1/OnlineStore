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
