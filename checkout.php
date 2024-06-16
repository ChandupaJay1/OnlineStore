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


    <!-- Checkout -->

    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Checkout</h2>
            <hr class="hr mx-auto" />
        </div>

        <div class="mx-auto container">
            <form id="checkout-form">

                <div class="form-group checkout-small-element">
                    <label>Name</label>
                    <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Name" required />
                </div>

                <div class="form-group checkout-small-element">
                    <label>Email</label>
                    <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Email" required />
                </div>

                <div class="form-group checkout-small-element">
                    <label>Phone Number</label>
                    <input type="tel" class="form-control" id="checkout-phonr" name="phone" placeholder="Phone" required />
                </div>

                <div class="form-group checkout-small-element">
                    <label>City</label>
                    <input type="text" class="form-control" id="Checkout-city" name="city" placeholder="City" required />
                </div>

                <div class="form-group checkout-large-element">
                    <label>Address</label>
                    <input type="text" class="form-control" id="Checkout-address" name="address" placeholder="Address" required />
                </div>


                <div class="form-group checkout-btn-container">
                    <input type="submit" class="btn" id="checkout-btn" value="Checkout" />
                </div>

            </form>
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