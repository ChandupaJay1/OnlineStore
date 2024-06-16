<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="StyleSheet" href="assets/css/footer.css" />

    <link rel="icon" href="assets/images/icon/ico-new.png" />

</head>

<body>
    <!--  Header Section -->
    <?php include('includes/navbar-view.php'); ?>

    <!-- cart -->

    <section class="cart container my-5 py-5 ">
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
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/images/items/s1-itm.jpg" />
                        <div>
                            <p>White shoes</p>
                            <small><span>Rs.</span>3500</small>
                            <br>
                            <a class="remove-btn" href="#">Remove</a>
                        </div>
                    </div>
                </td>
                <td>
                    <input type="number" value="1" />
                    <a class="edit-btn">Edit</a>
                </td>
                <td>
                    <span>RS.</span>
                    <span class="product-price">3500</span>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/images/items/s1-itm.jpg" />
                        <div>
                            <p>White shoes</p>
                            <small><span>Rs.</span>3500</small>
                            <br>
                            <a class="remove-btn" href="#">Remove</a>
                        </div>
                    </div>
                </td>
                <td>
                    <input type="number" value="1" />
                    <a class="edit-btn">Edit</a>
                </td>
                <td>
                    <span>RS.</span>
                    <span class="product-price">3500</span>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/images/items/s1-itm.jpg" />
                        <div>
                            <p>White shoes</p>
                            <small><span>Rs.</span>3500</small>
                            <br>
                            <a class="remove-btn" href="#">Remove</a>
                        </div>
                    </div>
                </td>
                <td>
                    <input type="number" value="1" />
                    <a class="edit-btn">Edit</a>
                </td>
                <td>
                    <span>RS.</span>
                    <span class="product-price">3500</span>
                </td>
            </tr>

        </table>

        <div class="cart-total">

            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>Rs.7000</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>Rs.7000</td>
                </tr>
            </table>

        </div>

        <div class="checkout-container">
            <button class="btn btn-success checkout-btn" href="checkout.php">Checkout</button>
        </div>


    </section>


    <!-- Footer -->
    <?php include('includes/footer-view.php'); ?>

    <script src="assets\js\script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- including FontAwesome -->
    <script src="https://kit.fontawesome.com/451b2ce250.js" crossorigin="anonymous"></script>


</body>

</html>