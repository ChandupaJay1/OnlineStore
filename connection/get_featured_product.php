<?php

    include('connection.php');

    $conn->prepare("SELECT * FROM products LIMIT 4");
    $stmt->execute();
    $featured_product = $stmt->get_result();



?>