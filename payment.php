<?php
session_start();

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Assuming your previous code is here

// Example code to demonstrate the initialization fix
$cart_items = array_map(function ($item) {
    return $item['product_name'];
}, $_SESSION['cart']);

// print_r($cart_items);

if (isset($_POST['order_pay_btn'])) {
    $order_status = $_POST['order_status'];
    $order_total_price = $_POST['order_total_price'];
}

$amount = $_SESSION['total'];
$merchant_id = "1227488";
$order_id = uniqid();
$merchant_secret = "MzE2MDA0NDQ3ODMyNjQyMzMzMzkxNzY3MzI5Njk5MzU2NzgxMjAwMA==";
$currency = "LKR";

$hash = strtoupper(
    md5(
        $merchant_id .
            $order_id .
            number_format($amount, 2, '.', '') .
            $currency .
            strtoupper(md5($merchant_secret))
    )
);

$cart_items = implode(", ", array_map(function ($item) {
    return $item['product_name'];
}, $_SESSION['cart']));

$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="icon" href="assets/images/icon/ico-new.png" />
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
</head>

<body>
    <!--  Header Section -->
    <?php include('includes/navbar-view.php'); ?>

    <!--Payment-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Payment</h2>
            <hr class="hr" />
        </div>

        <div class="mx-auto container text-center">
            <?php if (isset($_SESSION['total']) && $_SESSION['total'] != 0) { ?>
                <p>Total payment: Rs. <?php echo $_SESSION['total']; ?></p>
                <input class="buy-btn" type="submit" onclick="paymentGateway();" value="Pay Now" />

                <?php }else if(isset($_POST['order_status']) && $_POST['order_status'] == "Not Paid"){ ?>
                <p>Total payment: Rs. <?php echo $_POST['order_total_price']; ?></p>
                <input class="buy-btn" type="submit" onclick="paymentGateway();" value="Pay Now"/>

            <?php } else { ?>

                <p>You don't have any order to pay</p>

            <?php } ?>

        </div>

        </div>

        <div id="payment-details" style="display: none;" 
        data-merchant-id="<?php echo $merchant_id; ?>" 
        data-order-id="<?php echo $order_id; ?>" 
        data-items="<?php echo $cart_items; ?>" 
        data-amount="<?php echo $amount; ?>" 
        data-currency="<?php echo $currency; ?>" 
        data-hash="<?php echo $hash; ?>" 
        data-first-name="<?php echo $_SESSION['first_name']; ?>" 
        data-last-name="<?php echo $_SESSION['last_name']; ?>" 
        data-email="<?php echo $email; ?>" 
        data-phone="<?php echo $_SESSION['phone']; ?>" 
        data-address="<?php echo $_SESSION['address']; ?>" 
        data-city="<?php echo $_SESSION['city']; ?>">

        </div>

    </section>

    <!-- Footer -->
    <?php include('includes/footer-view.php'); ?>

    <script src="assets/js/payment.js"></script>
    <script src="assets/js/script.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/451b2ce250.js" crossorigin="anonymous"></script>

</body>

</html>