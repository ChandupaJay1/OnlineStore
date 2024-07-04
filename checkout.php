<?php
session_start();

if (!empty($_SESSION['cart'])) {
    // Allow user to proceed to checkout
} else {
    header('location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="StyleSheet" href="assets/css/footer.css" />
    <link rel="icon" href="assets/images/icon/ico-new.png" />
</head>
<body>
    <?php include('includes/navbar-view.php'); ?>
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Checkout</h2>
            <hr class="hr mx-auto" />
        </div>
        <div class="mx-auto container">
            <form id="checkout-form" method="POST" action="connection/placed_order.php">
                <p class="text-center" style="color: red;">
                    <?php if (isset($_GET['message'])) {
                        echo $_GET['message'];
                    } ?>
                    <?php if (isset($_GET['message'])) { ?>
                        <a href="login.php" class="buy-btn" style="text-decoration: none;">Login</a>
                    <?php } ?>
                </p>
                <div class="form-group checkout-small-element">
                    <label>Name</label>
                    <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Name" required />
                </div>
                <div class="form-group checkout-small-element">
                    <label>Email</label>
                    <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Email" required />
                </div>
                <div class="form-group checkout-small-element">
                    <label>Phone</label>
                    <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="Phone" required />
                </div>
                <div class="form-group checkout-small-element">
                    <label>City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="City" required />
                </div>
                <div class="form-group checkout-large-element">
                    <label>Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" required />
                </div>
                <div class="form-group checkout-btn-container">
                    <p>Total Amount: RS. <?php echo $_SESSION['total']; ?></p>
                    <input type="submit" class="btn" id="checkout-btn" name="place_order" value="Place Order" />
                </div>
            </form>
        </div>
    </section>
    <?php include('includes/footer-view.php'); ?>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/451b2ce250.js" crossorigin="anonymous"></script>
</body>
</html>
