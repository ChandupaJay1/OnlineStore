<?php

session_start();

include('connection/config.php');

if(!isset($_SESSION['logged_in'])){
    header('location: login.php');
    exit;
}


if(isset($_GET['logout'])){
    if(isset($_SESSION['logged_in'])){
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        header('location: login.php');
        exit;
    }
}

if(isset($_POST['change_password'])){
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            $user_email = $_SESSION['user_email'];

            //if passwords do not match
            if ($password !== $confirmPassword) {
                header('location: account.php?error=Passwords do not match');


                //if password is less than 6 characters
            }else if(strlen($password) < 6) {
                header('location: account.php?error=Passwords must be at least 6 characters');
                exit;

              //no errors
            }else{
                
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


//get orders
if(isset($_SESSION['logged_in'])){

    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT * FROM `orders` WHERE `users_user_id`=?");

    $stmt->bind_param('i',$user_id);
    
    $stmt->execute();

    $orders = $stmt->get_result();
}

?>


<!DOCTYPE html>
<html lang="en">

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
            <div class="text-center mt-3 pt-3 col-lg-6 col-md-12 col-sm-12">
            <p style="color: green;"><?php if (isset($_GET['register_success'])) {echo $_GET['register_success']; } ?></p>
            <p style="color: green;"><?php if (isset($_GET['login_success'])) {echo $_GET['login_success']; } ?></p>
             
                <h3 class="font-weight-bold">Acoount Info</h3>
                <hr class="hr" />
                <div class="account-info">
                    <p>Name: <span><?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name']; } ?></span></p>
                    <p>Email: <span><?php if(isset($_SESSION['user_email'])){ echo $_SESSION['user_email']; } ?></span></p>
                    <p><a href="#orders" id="orders-btn">Your orders</a></p>
                    <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <form id="account-form" method="POST" action="account.php">
                <p style="color: red;"><?php if (isset($_GET['error'])) {echo $_GET['error']; } ?></p>
                <p style="color: green;"><?php if (isset($_GET['message'])) {echo $_GET['message']; } ?></p>
                
                    <h3>Change Password</h3>
                    <hr class="hr" />
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="account-password" name="password" placeholder="Password" required />
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" id="account-password-confirm" name="confirmPassword" placeholder="Password" required />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="change_password" value="Change Password" class="btn" id="change-pass-btn" />
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!--Orders-->
   <section id="orders" class="orders container my-5 py-5">
    <div class="container mt-2">
        <h2 class="form-weight-bold">Your Orders</h2>
    </div>

    <table class="mt-5 pt-5 col-lg-12">
        <tr>
            <th>Order ID</th>
            <th>Order Cost</th>
            <th>Order Status</th>
            <th>Order Date</th>
            <th>Order Details</th>
        </tr>
        <?php while($row = $orders->fetch_assoc() ){ ?>

                        <tr>
                            <td>
                                <!-- <div class="">
                                    <img src="assets/imgs/featured1.jpg" /> -->
                                    <!-- <div>
                                        <p class="mt-3"><?php echo$row['order_id']; ?></p>
                                    </div> -->
                                <!-- </div>  -->

                                <span><?php echo$row['order_id']; ?></span>

                            </td>

                            <td>
                                <span><?php echo$row['order_cost']; ?></span>
                            </td>

                            <td>
                                <span><?php echo$row['order_status']; ?></span>
                            </td>

                            <td>
                                <span><?php echo$row['order_date']; ?></span>
                            </td>

                            <td>
                                <form method="POST" action="order_details.php">
                                    <input type="hidden" value="<?php echo$row['order_status']; ?>" name="order_status" />
                                    <input type="hidden" value="<?php echo$row['order_id']; ?>" name="order_id" />
                                    <input class="btn order-details-btn" type="submit" value="Details" name="order_details_btn"/>
                                </form>
                            </td>

                        </tr>
        <?php }?>
    </table>
   </section>





    <!-- Footer -->
    <?php include('includes/footer-view.php'); ?>

    <script src="assets\js\script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- including FontAwesome -->
    <script src="https://kit.fontawesome.com/451b2ce250.js" crossorigin="anonymous"></script>


</body>

</html>