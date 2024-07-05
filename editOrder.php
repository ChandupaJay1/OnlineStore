<?php
include('connection/config.php');

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $stmt = $conn->prepare("SELECT * FROM `orders` WHERE `order_id`=?");
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $order = $result->fetch_assoc();

}else if(isset($_POST['edit_order'])){

    $order_status = $_POST['status'];
    $order_id = $_POST['order_id'];

    $stmt = $conn->prepare("UPDATE `orders` SET `order_status`=? WHERE `order_id`=?");
    $stmt->bind_param('si', $order_status, $order_id);

    if ($stmt->execute()) {
        header('location: adminDashboard.php?order_updated=Order has been updated successfully!');
    } else {
        header('location: adminDashboard.php?order_failed=Error occurred, try again!');
    }
}else {
    header('location: adminDashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT ORDERS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <?php include('adminHeader.php'); ?>

    <div class="container-fluid">
        <div class="row" style="min-height: 1000px">
            <?php include('sideMenu.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mt-3">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mc-2"></div>
                    </div>
                </div>

                <h2>Edit Orders</h2>
                <div class="table-responsive">
                    <div class="mx-auto container">
                        <form id="edit-form" method="POST" action="editOrder.php">

                            <p style="color: red;"><?php if (isset($_GET['error'])) { echo $_GET['error']; } ?></p>
                
                            
                            <div class="form-group my-3">
                                <label>Order ID</label>
                                <p class="my-4"><?php echo $order['order_id']; ?></p>
                            </div>
                            
                            <div class="form-group my-3">
                                <label>Order Price</label>
                                <p class="my-4"><?php echo $order['order_cost']; ?></p>
                            </div>
                            
                            <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>" />

                            <div class="form-group my-3">
                                <label>Order Status</label>
                                <select class="form-select" required name="status">
                                    <option value="not_paid" <?php if($order['order_status']=='not_paid'){echo "selected";} ?> >Not Paid</option>
                                    <option value="paid" <?php if($order['order_status']=='paid'){echo "selected";} ?> >Paid</option>
                                    <option value="shipped" <?php if($order['order_status']=='shipped'){echo "selected";} ?> >Shipped</option>
                                    <option value="delivered" <?php if($order['order_status']=='delivered'){echo "selected";} ?> >Delivered</option>
                                </select>
                            </div>

                            <div class="form-group my-3">
                                <label>Order Date</label>
                                <p class="my-4"><?php echo $order['order_date']; ?></p>
                            </div>

                            <div class="form-group buy-btn-container mt-3">
                                <input type="submit" class="btn btn-primary" name="edit_order" value="Edit" />
                            </div>

                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/451b2ce250.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
