<?php

session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header('location: adminLogin.php');
}

?>
<?php include('adminHeader.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <?php


    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
        $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
    }

    $stmt1 = $conn->prepare("SELECT COUNT(*) AS total_records FROM `products`");
    $stmt1->execute();
    $stmt1->bind_result($total_records);
    $stmt1->store_result();
    $stmt1->fetch();

    $total_records_per_page = 5;

    $offset = ($page_no - 1) * $total_records_per_page;

    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;

    $adjacents = "2";

    $total_no_of_pages = ceil($total_records / $total_records_per_page);



    $stmt2 = $conn->prepare("SELECT * FROM `products` LIMIT $offset, $total_records_per_page");
    $stmt2->execute();
    $products = $stmt2->get_result();





    ?>


    <div class="container-fluid">
        <div class="row" style="min-height: 1000px">

            <?php include('sideMenu.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mt-3">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mc-2">

                        </div>
                    </div>
                </div>


                <h2>Products</h2>


                <?php if(isset($_GET['edit_success_message'])) {?>
                    <p class="text-center" style="color: green;"><?php echo $_GET['edit_success_message']; ?></p>
                <?php } ?>

                <?php if(isset($_GET['edit_failure_message'])) {?>
                    <p class="text-center" style="color: red;"><?php echo $_GET['edit_failure_message']; ?></p>
                <?php } ?>




                <?php if(isset($_GET['deleted_successfully'])) {?>
                    <p class="text-center" style="color: green;"><?php echo $_GET['deleted_successfully']; ?></p>
                <?php } ?>

                <?php if(isset($_GET['deleted_failure'])) {?>
                    <p class="text-center" style="color: red;"><?php echo $_GET['deleted_failure']; ?></p>
                <?php } ?>




                    <p class="text-center"></p>
                    <div class="table-responsive">
                    <table class="table table-stripped table-sm">

                        <thead>
                            <tr>
                                <th scope="col">Product ID</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Product Category</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>

                        </thead>

                        <tbody>
                            <?php foreach($products as $product) {  ?>
                                <tr>
                                    <td><?php echo $product['product_id']; ?></td>
                                    <td><img src="<?php echo "assets/images/clothes/" . $product['product_image']; ?>" style="width: 50px; height: 50px;" /></td>

                                    <td><?php echo $product['product_name']; ?></td>
                                    <td><?php echo"Rs. ".$product['product_price']; ?></td>
                                    <td><?php echo $product['product_category']; ?></td>

                                    <td><a class="btn btn-primary" href="editProduct.php?product_id=<?php echo $product['product_id']; ?>">Edit</a></td>
                                    <td><a class="btn btn-danger" href="deleteProduct.php?product_id=<?php echo $product['product_id']; ?>">Delete</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>

                    <nav aria-labelledby="Page navigation example">
                        <ul class="pagination mt-5">
                            <?php ?>
                            <li class="page-item <?php if ($page_no <= 1) {
                                                        echo 'disabled';
                                                    } ?> ">
                                <a class="page-link" href="<?php if ($page_no <= 1) {
                                                                echo '#';
                                                            } else {
                                                                echo "?page_no=" . $page_no - 1;
                                                            } ?>">Previous</a>
                            </li>


                            <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
                            <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>

                            <?php if ($page_no >= 3) { ?>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="<?php echo "?page_no=" . $page_no; ?>"><?php echo $page_no; ?></a></li>
                            <?php } ?>

                            <li class="page-item <?php if ($page_no >= $total_no_of_pages) {
                                                        echo 'disabled';
                                                    } ?>">
                                <a class="page-link" href="<?php if ($page_no >= $total_no_of_pages) {
                                                                echo '#';
                                                            } else {
                                                                echo "?page_no=" . $page_no + 1;
                                                            } ?>">Next</a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </main>


        </div>






    </div>













<script src="https://kit.fontawesome.com/451b2ce250.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
  crossorigin="anonymous"></script>



</body>

</html>