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


    <!--Login-->
    <section class="my-5 py-5">
    <div class="col-6 d-none d-lg-block logbackground"></div>
        <div class="container text-center mt-3 pt-5">
            <h2>Login</h2>
            <h2 class="h2-login">Welcome to D26 Clothings.</h2>
            <hr class="hr mx-auto"/>
        </div>

        <div class="mx-auto container">
            <form id="login-form">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required />
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required />
                </div>

                <div class="form-group">
                    <a><input type="submit" class="btn" id="login-btn" value="Login" /></a>
                    
                </div>

                <div class="form-group">
                    <a id="login-url" class="btn" href="#">Register now?</a>
                </div>

            </form>
        </div>

    </section>


    </section>





    <!-- Footer -->
    <?php include('includes/footer-view.php'); ?>

    <script src="assets\js\script.js"></script>
    <script src="assets\js\login.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- including FontAwesome -->
    <script src="https://kit.fontawesome.com/451b2ce250.js" crossorigin="anonymous"></script>


</body>