<?php

session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header('location: adminLogin.php');
    exit;
}

// Include database configuration
include('connection/config.php');

// Include admin header
include('adminHeader.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <?php

    // Set the current page number
    $page_no = isset($_GET['page_no']) ? $_GET['page_no'] : 1;

    // Calculate the total number of records and pages
    $stmt1 = $conn->prepare("SELECT COUNT(*) AS total_records FROM `orders`");
    $stmt1->execute();
    $stmt1->bind_result($total_records);
    $stmt1->store_result();
    $stmt1->fetch();

    $total_records_per_page = 10;
    $offset = ($page_no - 1) * $total_records_per_page;
    $total_no_of_pages = ceil($total_records / $total_records_per_page);

    // Fetch the orders for the current page
    $stmt2 = $conn->prepare("SELECT * FROM `orders` LIMIT ?, ?");
    $stmt2->bind_param('ii', $offset, $total_records_per_page);
    $stmt2->execute();
    $orders = $stmt2->get_result();

    ?>

    <div class="container-fluid">
        <div class="row vh-100">

            <?php include('sideMenu.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>

                <h2>Orders</h2>

                <?php if (isset($_GET['order_updated'])) { ?>
                    <div class="alert alert-success text-center"><?php echo $_GET['order_updated']; ?></div>
                <?php } ?>

                <?php if (isset($_GET['order_failed'])) { ?>
                    <div class="alert alert-danger text-center"><?php echo $_GET['order_failed']; ?></div>
                <?php } ?>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">User Phone</th>
                                <th scope="col">User Address</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order) {  ?>
                                <tr>
                                    <td><?php echo $order['order_id']; ?></td>
                                    <td><?php echo $order['order_status']; ?></td>
                                    <td><?php echo $order['users_user_id']; ?></td>
                                    <td><?php echo $order['order_date']; ?></td>
                                    <td><?php echo $order['user_phone']; ?></td>
                                    <td><?php echo $order['user_address']; ?></td>
                                    <td><a class="btn btn-sm btn-primary" href="editOrder.php?order_id=<?php echo $order['order_id']; ?>">Edit</a></td>
                                    <td><a class="btn btn-sm btn-danger" href="deleteOrder.php?order_id=<?php echo $order['order_id']; ?>">Delete</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <nav aria-labelledby="Page navigation example">
                        <ul class="pagination justify-content-center mt-4">
                            <li class="page-item <?php if ($page_no <= 1) { echo 'disabled'; } ?>">
                                <a class="page-link" href="<?php if ($page_no > 1) { echo "?page_no=" . ($page_no - 1); } ?>">Previous</a>
                            </li>
                            <?php for ($i = 1; $i <= $total_no_of_pages; $i++) { ?>
                                <li class="page-item <?php if ($page_no == $i) { echo 'active'; } ?>"><a class="page-link" href="?page_no=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php } ?>
                            <li class="page-item <?php if ($page_no >= $total_no_of_pages) { echo 'disabled'; } ?>">
                                <a class="page-link" href="<?php if ($page_no < $total_no_of_pages) { echo "?page_no=" . ($page_no + 1); } ?>">Next</a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </main>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/451b2ce250.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
