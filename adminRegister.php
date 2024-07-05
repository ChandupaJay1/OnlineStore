<?php
include('connection/config.php');

if (isset($_POST['register_btn'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('location: adminRegister.php?error=Invalid email format');
        exit;
    }

    // Validate mobile number (Sri Lanka)
    if (!preg_match('/^07[0-9]{8}$/', $mobile)) {
        header('location: adminRegister.php?error=Invalid mobile number');
        exit;
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO `admin` (`fname`, `lname`, `email`, `mobile`, `password`) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $fname, $lname, $email, $mobile, $password);

    if ($stmt->execute()) {
        header('location: adminLogin.php?register_success=Registration successful! You can now log in.');
    } else {
        header('location: adminRegister.php?error=Something went wrong');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body style="background-color: #F9EBEA">

    <!-- <?php include('adminHeader.php'); ?> -->

    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="font-weight-bold">Admin Register</h2>
        </div>

        <div class="mx-auto container">
            <form id="register-form" action="adminRegister.php" method="POST">
                <p style="color: red;" class="text-center"><?php if (isset($_GET['error'])) {
                                                                echo $_GET['error'];
                                                            } ?></p>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" id="register-fname" name="fname" placeholder="First Name" required />
                </div>

                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" id="register-lname" name="lname" placeholder="Last Name" required />
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="register-email" name="email" placeholder="Email" required />
                </div>

                <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" class="form-control" id="register-mobile" name="mobile" placeholder="Mobile Number" required />
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required />
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" id="register-btn" name="register_btn" value="Register" />
                </div>
            </form>
        </div>
    </section>

    <script src="assets/js/script.js"></script>                                                       
    <script src="https://kit.fontawesome.com/451b2ce250.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
