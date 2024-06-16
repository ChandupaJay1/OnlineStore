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




    <section class="my-5 py-5">

        <div class="row container mx-auto">
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <h3 id="font-weight-bold">Account info</h3>

                <hr class="hr-c mx-auto">

                <div class="account-info">

                    <p>Name <br><span>Chandupa Jayalath</span></p>

                    <p>Email <br><span>Chandupan@email.com</span></p>

                    <p><a href="" id="oders-btn">Your oders</a></p>

                    <p><a href="" id="logout-btn">Logout</a></p>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <form id="account-form">
                    <h3>Change Password</h3>
                    <hr class="hr-c mx-auto ">

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="account-password" name="password" placeholder="Password" required />

                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" id="account-password-confirm" name="confirmPassword" placeholder="Password" required />

                    </div>

                    <div class="form-group">
                        <input type="submit" value="Change Password" class="btn" id="change-pass-btn">
                    </div>


                    </div>
                </form>
            </div>

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