<?php
session_start();

include('connection/config.php');

if (isset($_SESSION['admin_logged_in'])) {
    header('location: adminDashboard.php');
    exit;
}

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT `id`, `fname`, `lname`, `email`, `password` FROM `admin` WHERE `email` = ? LIMIT 1");
    $stmt->bind_param('s', $email);

    if ($stmt->execute()) {
        $stmt->bind_result($admin_id, $admin_fname, $admin_lname, $admin_email, $admin_password);
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->fetch();
            
            // Verify password
            if (password_verify($password, $admin_password)) {
                $_SESSION['admin_id'] = $admin_id;
                $_SESSION['admin_fname'] = $admin_fname;
                $_SESSION['admin_lname'] = $admin_lname;
                $_SESSION['admin_email'] = $admin_email;
                $_SESSION['admin_logged_in'] = true;

                header('location: adminDashboard.php?login_success=Logged in successfully!');
            } else {
                header('location: adminLogin.php?error=Incorrect password');
            }
        } else {
            header('location: adminLogin.php?error=Could not verify your account');
        }
    } else {
        header('location: adminLogin.php?error=Something went wrong');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/admin.css">

    <link rel="icon" href="assets/images/icon/ico-new.png" />
</head>

<body style="background-color: #F9EBEA">

    <!-- <?php include('adminHeader.php'); ?> -->

    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="font-weight-bold">Admin Login</h2>
        </div>

        <div class="mx-auto container">
            <form id="login-form" action="adminLogin.php" method="POST">
                <p style="color: red;" class="text-center"><?php if (isset($_GET['error'])) {
                                                                echo $_GET['error'];
                                                            } ?></p>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="login-email" name="email" placeholder="Email" required />
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required />
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" id="login-btn" name="login_btn" value="Login" />
                </div>
                
                <div class="form-group">
                    <a href="adminRegister.php" class="btn btn-secondary">Register</a>
                </div>
            </form>
        </div>
    </section>

    <script src="assets/js/script.js"></script>                                                    
    <script src="https://kit.fontawesome.com/451b2ce250.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
