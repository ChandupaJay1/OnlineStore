<?php
session_start();
include('config.php');

if (!isset($_SESSION['logged_in'])) {
    header('location: ../checkout.php?message=Please login or register to place an order');
    exit;
} else {
    if (isset($_POST['place_order'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $order_status = "Not Paid";
        $user_id = $_SESSION['user_id'];
        $order_date = date('Y-m-d H:i:s');

        // Validate phone number
        if (!preg_match("/^07[0-9]{8}$/", $phone)) {
            echo "<script>alert('Phone Number is not valid'); window.history.back();</script>";
            exit;
        }

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid Email'); window.history.back();</script>";
            exit;
        }

        // Calculate total order cost
        $order_cost = 0;
        foreach ($_SESSION['cart'] as $product) {
            $order_cost += $product['product_price'] * $product['product_quantity'];
        }

        // Store order details in session
        $_SESSION['first_name'] = explode(' ', $name)[0];
        $_SESSION['last_name'] = explode(' ', $name)[1];
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['city'] = $city;
        $_SESSION['address'] = $address;
        $_SESSION['total'] = $order_cost;  // Store the total cost in session

        // Insert order into orders table
        $stmt = $conn->prepare("INSERT INTO orders (order_cost, order_status, users_user_id, user_phone, user_city, user_address, order_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('isiisss', $order_cost, $order_status, $user_id, $phone, $city, $address, $order_date);
        $stmt_status = $stmt->execute();

        if (!$stmt_status) {
            header('location: index.php');
            exit;
        }

        $order_id = $stmt->insert_id;
        $_SESSION['order_id'] = $order_id; // Store the order_id in session

        // Insert order items into order_items table
        $order_items = [];
        foreach ($_SESSION['cart'] as $product) {
            $stmt1 = $conn->prepare("INSERT INTO order_items (orders_order_id, products_product_id, product_name, product_image, product_price, product_quantity, users_user_id, order_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt1->bind_param('iissiiis', $order_id, $product['product_id'], $product['product_name'], $product['product_image'], $product['product_price'], $product['product_quantity'], $user_id, $order_date);
            $stmt1->execute();

            $order_items[] = [
                'product_name' => $product['product_name'],
                'product_price' => $product['product_price'],
                'product_quantity' => $product['product_quantity'],
            ];
        }
        $_SESSION['order_items'] = $order_items; // Store the order items in session

        unset($_SESSION['cart']);
        header('location: ../payment.php?order_status=Order placed successfully!');
        exit;
    }
}
?>
