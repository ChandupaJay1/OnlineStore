<?php
session_start();
$order_id = htmlspecialchars($_GET['order_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/invoice.css">

    <link rel="icon" href="assets/images/icon/ico-new.png">
</head>

<body>
    <?php include('includes/navbar-view.php'); ?>
    <section class="my-5 py-5" id="invoice-section">
        <div class="container text-center mt-3 pt-5">
            <div class="row mb-4">
                <div class="col-6">
                    <h2 class="form-weight-bold text-start">Invoice</h2>
                </div>
                <div class="col-6 text-end">
                    <button onclick="printInvoice()" class="btn btn-primary">Print Invoice</button>
                </div>
            </div>
            <hr class="hrpi" />
            <div class="row">
                <div class="col-6">
                    <h4 class="h4invoice">Billing Details</h4>
                    <p class="pi">
                        <strong><?php echo htmlspecialchars($_SESSION['first_name'] ?? ''); ?> <?php echo htmlspecialchars($_SESSION['last_name'] ?? ''); ?></strong><br>
                        <?php echo htmlspecialchars($_SESSION['address'] ?? ''); ?><br>
                        <?php echo htmlspecialchars($_SESSION['city'] ?? ''); ?><br>
                        <?php echo htmlspecialchars($_SESSION['phone'] ?? ''); ?><br>
                        <?php echo htmlspecialchars($_SESSION['email'] ?? ''); ?>
                    </p>
                </div>
                <div class="col-6 text-end">
                    <h4>Order Details</h4>
                    <p>
                        <strong>Order ID:</strong> <?php echo $order_id; ?><br>
                        <strong>Order Date:</strong> <?php echo date("F d, Y"); ?><br>
                        <strong>Total Payment:</strong> Rs. <?php echo htmlspecialchars(number_format($_SESSION['total'], 2)); ?>
                    </p>
                </div>
            </div>
            <table class="table text-center mt-4 pt-5">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_payment = 0;
                    if (isset($_SESSION['order_items'])) : ?>
                        <?php foreach ($_SESSION['order_items'] as $item) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                                <td>Rs. <?php echo htmlspecialchars(number_format($item['product_price'], 2)); ?></td>
                                <td><?php echo htmlspecialchars($item['product_quantity']); ?></td>
                                <td>Rs. <?php echo htmlspecialchars(number_format($item['product_price'] * $item['product_quantity'], 2)); ?></td>
                            </tr>
                            <?php $total_payment += $item['product_price'] * $item['product_quantity']; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end py-5">Total</th>
                        <th>Rs. <?php echo htmlspecialchars(number_format($total_payment, 2)); ?></th>
                    </tr>
                </tfoot>
            </table>

            <div class="d-flex justify-content-center align-items-center mt-3">
                <img src="assets/images/icon/ico-new.png" class="me-2" id="in-logo">
                <span class="font-monospace text-secondary">
                    Thank You! Shop Again With Us...
                </span>
                <img src="assets/images/icon/ico-new.png" class="me-2 in-logo" id="in-logo">
            </div>

        </div>
    </section>
    <?php include('includes/footer-view.php'); ?>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/printInvoice.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/451b2ce250.js" crossorigin="anonymous"></script>
</body>

</html>