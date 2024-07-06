<?php

include('config.php');

if (!function_exists('fetch_products')) {
    function fetch_products($conn, $category = null, $limit = 4) {
        if ($category) {
            $stmt = $conn->prepare("SELECT * FROM `products` WHERE `product_category` = ? LIMIT ?");
            $stmt->bind_param("si", $category, $limit);
        } else {
            $stmt = $conn->prepare("SELECT * FROM `products` LIMIT ?");
            $stmt->bind_param("i", $limit);
        }

        $stmt->execute();
        return $stmt->get_result();
    }
}

$featured_product = fetch_products($conn);
$full_suite = fetch_products($conn, 'full suite');
$cap = fetch_products($conn, 'cap');
$tshirt = fetch_products($conn, 'tshirt');

?>
