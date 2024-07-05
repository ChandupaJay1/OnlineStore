<?php

include('config.php');


$stmt = $conn->prepare("SELECT * FROM `products` WHERE `product_category`= 'full suite' LIMIT 4");

$stmt->execute();

$featured_products = $stmt->get_result();
