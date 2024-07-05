<?php


session_start();

include('connection/config.php');

if (isset($_SESSION['logged_in'])) {
    header('location: account.php');
    exit;
}

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT user_id, user_name, user_email, user_password FROM users WHERE user_email = ? LIMIT 1");
    $stmt->bind_param('s', $email);

    if ($stmt->execute()) {
        $stmt->bind_result($user_id, $user_name, $user_email, $user_password);
        $stmt->store_result();

        if ($stmt->num_rows() == 1) {
            $stmt->fetch();

            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['logged_in'] = true;

            header('location: account.php?login_success=Logged in successfully!');
        } else {
            header('location: login.php?error=Could not verify your account');
        }
    } else {
        //error
        header('location: login.php?error=Something went wrong');
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

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
            <hr class="hr mx-auto" />
        </div>

        <div class="mx-auto container">
            <form id="login-form" action="login.php" method="POST">
                <p style="color: red;" class="text-center"><?php if (isset($_GET['error'])) {
                                                                echo $_GET['error'];
                                                            } ?></p>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required />
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required />
                </div>

                <div class="form-group mt-2">
                    <input type="submit" class="btn" id="login-btn" name="login_btn" value="Login" />
                </div>

                <div class="form-group mt-2">
                    <a id="register-url" class="btn" href="register.php">Don't have an account? Register</a>
                </div>

                <div class="form-group mt-2">
                    <a id="register-url" class="btn" href="adminLogin.php">Go To Admin Login</a>
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

</html>