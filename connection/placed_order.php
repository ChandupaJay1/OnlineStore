<?php

session_start();

include('config.php');

// if user is not logged in
if (!isset($_SESSION['logged_in'])) {
    header('location: ../checkout.php?message=Please login or register to place an order');
    exit;
} else {
    if (isset($_POST['place_order'])) {
        // get user info and store in db
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $order_cost = $_SESSION['total'];
        $order_status = "Not Paid";
        $user_id = $_SESSION['user_id'];
        $order_date = date('Y-m-d H:i:s');

        // Validate phone number and email
        if (!preg_match("/^07[0-9]{8}$/", $phone)) {
            echo "<script>alert('Phone Number is not valid'); window.history.back();</script>";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid Email'); window.history.back();</script>";
        } else {
            $stmt = $conn->prepare("INSERT INTO orders (order_cost, order_status, users_user_id, user_phone, user_city, user_address, order_date)
                                    VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('isiisss', $order_cost, $order_status, $user_id, $phone, $city, $address, $order_date);

            $stmt_status = $stmt->execute();

            if (!$stmt_status) {
                header('location: index.php');
                exit;
            }

            // Issue new order and store order info in db
            $order_id = $stmt->insert_id;

            // Get products from cart (from session)
            foreach ($_SESSION['cart'] as $key => $value) {
                $product = $_SESSION['cart'][$key];
                $product_id = $product['product_id'];
                $product_name = $product['product_name'];
                $product_image = $product['product_image'];
                $product_price = $product['product_price'];
                $product_quantity = $product['product_quantity'];

                // Store each single item in order items
                $stmt1 = $conn->prepare("INSERT INTO order_items (orders_order_id, products_product_id, product_name, product_image, product_price, product_quantity, users_user_id, order_date)
                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt1->bind_param('iissiiis', $order_id, $product_id, $product_name, $product_image, $product_price, $product_quantity, $user_id, $order_date);

                $stmt1->execute();
            }

            // Remove everything from cart
            unset($_SESSION['cart']);

            // Inform user that the order was placed successfully
            header('location: ../payment.php?order_status=Order placed successfully!');
            exit;
        }
    }
}
?>