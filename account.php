<?php
session_start();
include('connection/config.php');

if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['phone']);
        unset($_SESSION['city']);
        unset($_SESSION['address']);
        header('location: login.php');
        exit;
    }
}

if (isset($_POST['change_password'])) {
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $user_email = $_SESSION['user_email'];

    if ($password !== $confirmPassword) {
        header('location: account.php?error=Passwords do not match');
    } else if (strlen($password) < 6) {
        header('location: account.php?error=Passwords must be at least 6 characters');
        exit;
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE `users` SET `user_password`=? WHERE `user_email`=?");
        $stmt->bind_param('ss', $hashed_password, $user_email);

        if ($stmt->execute()) {
            header('location: account.php?message=Password has been updated successfully');
            exit;
        } else {
            header('location: account.php?error=Could not update password');
            exit;
        }
    }
}

if (isset($_POST['update_profile'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("UPDATE `users` SET `user_name`=?, `user_email`=?, `phone`=?, `city`=?, `address`=? WHERE `user_id`=?");
    $stmt->bind_param('sssssi', $name, $email, $phone, $city, $address, $user_id);

    if ($stmt->execute()) {
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['city'] = $city;
        $_SESSION['address'] = $address;
        header('location: account.php?message=Profile has been updated successfully');
        exit;
    } else {
        header('location: account.php?error=Could not update profile');
        exit;
    }
}

if (isset($_SESSION['logged_in'])) {
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT * FROM `orders` WHERE `users_user_id`=?");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $orders = $stmt->get_result();
}

if (!isset($_SESSION['phone']) || !isset($_SESSION['city']) || !isset($_SESSION['address'])) {
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT `phone`, `city`, `address` FROM `users` WHERE `user_id`=?");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->bind_result($phone, $city, $address);
    $stmt->fetch();
    $_SESSION['phone'] = $phone;
    $_SESSION['city'] = $city;
    $_SESSION['address'] = $address;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="StyleSheet" href="assets/css/footer.css" />
    <link rel="icon" href="assets/images/icon/ico-new.png" />
</head>

<body>
    <?php include('includes/navbar-view.php'); ?>

    <section class="my-5 py-5" style="margin-top: 5rem!important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 mb-4">
                    <div class="card" style="width: max-content;">
                        <div class="card-header text-center">
                            <h3>Account Info</h3>
                        </div>
                        <div class="card-body">
                            <p><strong>Name:</strong> <?php echo $_SESSION['user_name']; ?></p>
                            <p><strong>Email:</strong> <?php echo $_SESSION['user_email']; ?></p>
                            <p><strong>Phone:</strong> <?php echo $_SESSION['phone']; ?></p>
                            <p><strong>City:</strong> <?php echo $_SESSION['city']; ?></p>
                            <p><a href="#orders" class="btn btn-primary btn-block">Your Orders</a></p>
                            <p><a href="account.php?logout=1" class="btn btn-danger btn-block">Logout</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3>Update Profile</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="account.php">
                                <p style="color: red;"><?php if (isset($_GET['error'])) { echo $_GET['error']; } ?></p>
                                <p style="color: green;"><?php if (isset($_GET['message'])) { echo $_GET['message']; } ?></p>

                                <div class="form-group mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $_SESSION['user_name']; ?>" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['user_email']; ?>" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $_SESSION['phone']; ?>" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" name="city" value="<?php echo $_SESSION['city']; ?>" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $_SESSION['address']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="update_profile" value="Update Profile" class="btn btn-success btn-block">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3>Change Password</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="account.php">
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="confirmPassword">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="change_password" value="Change Password" class="btn btn-warning btn-block">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="orders" class="orders container my-5 py-5">
        <div class="container mt-2">
            <h2 class="font-weight-bold">Your Orders</h2>
        </div>

        <table class="table table-hover mt-5 pt-5">
            <thead class="thead-dark">
                <tr>
                    <th>Order ID</th>
                    <th>Order Cost</th>
                    <th>Order Status</th>
                    <th>Order Date</th>
                    <th>Order Details</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $orders->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['order_cost']; ?></td>
                        <td><?php echo $row['order_status']; ?></td>
                        <td><?php echo $row['order_date']; ?></td>
                        <td>
                            <form method="POST" action="order_details.php">
                                <input type="hidden" name="order_status" value="<?php echo $row['order_status']; ?>">
                                <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                <input class="btn btn-info" type="submit" value="Details" name="order_details_btn">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>

    <?php include('includes/footer-view.php'); ?>

    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/451b2ce250.js" crossorigin="anonymous"></script>

</body>
</html>
