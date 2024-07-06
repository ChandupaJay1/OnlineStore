<?php
session_start();

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Initialize total if it doesn't exist
if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = 0;
}

if (isset($_POST['add_to_cart'])) {
    $products_array_ids = array_column($_SESSION['cart'], "product_id");
    if (!in_array($_POST['product_id'], $products_array_ids)) {
        $product_id = $_POST['product_id'];

        $product_array = array(
            'product_id' => $_POST['product_id'],
            'product_name' => $_POST['product_name'],
            'product_price' => $_POST['product_price'],
            'product_image' => $_POST['product_image'],
            'product_quantity' => $_POST['product_quantity']
        );

        $_SESSION['cart'][$product_id] = $product_array;
    } else {
        echo '<script>alert("Product was already added to cart")</script>';
    }
    calculateTotalCart();
} elseif (isset($_POST['remove_product'])) {
    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);
    calculateTotalCart();
} elseif (isset($_POST['edit_quantity'])) {
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];

    $product_array = $_SESSION['cart'][$product_id];
    $product_array['product_quantity'] = $product_quantity;

    $_SESSION['cart'][$product_id] = $product_array;
    calculateTotalCart();
}

function calculateTotalCart()
{
    $total = 0;
    foreach ($_SESSION['cart'] as $key => $value) {
        $price = $value['product_price'];
        $quantity = $value['product_quantity'];
        $total += ($price * $quantity);
    }
    $_SESSION['total'] = $total;
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/cart.css">
    <link rel="icon" href="assets/images/icon/ico-new.png">
</head>

<body>
    <!--  Header Section -->
    <?php include('includes/navbar-view.php'); ?>

    <!-- cart -->
    <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight bold">Your Cart</h2>
            <hr class="hr-c">
        </div>

        <table class="mt5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            <?php if (!empty($_SESSION['cart'])) : ?>
                <?php foreach ($_SESSION['cart'] as $key => $value) : ?>
                    <tr>
                        <td>
                            <div class="product-info">
                                <img src="assets/images/clothes/<?php echo $value['product_image']; ?>" />
                                <div>
                                    <p><?php echo $value['product_name']; ?></p>
                                    <small><span>Rs.</span><?php echo $value['product_price']; ?></small>
                                    <br>
                                    <form method="POST" action="cart.php">
                                        <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>" />
                                        <input type="submit" name="remove_product" class="remove-btn" value="remove" />
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td>
                            <form method="POST" action="cart.php">
                                <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>" />
                                <input type="number" name="product_quantity" value="<?php echo $value['product_quantity']; ?>" />
                                <input type="submit" class="edit-btn" value="Edit" name="edit_quantity" />
                            </form>
                        </td>
                        <td>
                            <span>Rs.</span>
                            <span class="product-price"> <?php echo $value['product_quantity'] * $value['product_price']; ?></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3" class="text-center">Your cart is empty.</td>
                </tr>
            <?php endif; ?>
        </table>

        <div class="cart-total">
            <table>
                <tr>
                    <td>Total</td>
                    <td>Rs.<?php echo isset($_SESSION['total']) ? $_SESSION['total'] : '0'; ?></td>
                </tr>
            </table>
        </div>

        <div class="cart-container">
            <form method="POST" action="checkout.php">
                <input type="submit" id="btnN" value="Checkout" name="checkout" >
            </form>
        </div>
    </section>

    <!-- Footer -->
    <?php include('includes/footer-view.php'); ?>

    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/451b2ce250.js" crossorigin="anonymous"></script>
</body>

</html>