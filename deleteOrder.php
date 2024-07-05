<?php

session_start();

include('connection/config.php');


if (!isset($_SESSION['admin_logged_in'])) {
    header('location: adminLogin.php');
    exit;
}

if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];

    // Delete related order items first
    $stmt_delete_items = $conn->prepare("DELETE FROM `order_items` WHERE `orders_order_id` = ?");
    $stmt_delete_items->bind_param('i', $order_id);
    
    if ($stmt_delete_items->execute()) {
        // Now delete the order
        $stmt_delete_order = $conn->prepare("DELETE FROM `orders` WHERE `order_id` = ?");
        $stmt_delete_order->bind_param('i', $order_id);
        
        if ($stmt_delete_order->execute()) {
            header('location: adminDashboard.php?order_deleted_successfully=Order has been deleted successfully!');
        } else {
            header('location: adminDashboard.php?order_delete_failure=Could not delete the order');
        }
    } else {
        header('location: adminDashboard.php?order_delete_failure=Could not delete related order items');
    }
}
    
