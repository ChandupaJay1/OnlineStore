<?php

include('connection/config.php');

if(isset($_POST['order_details_btn']) && isset($_POST['order_id'])){

    $order_id = $_POST['order_id'];

    $order_status = $_POST['order_status'];

    $stmt = $conn->prepare("SELECT * FROM `order_items` WHERE `orders_order_id` = ?  ");

    $stmt->bind_param('i',$order_id);
    
    $stmt->execute();

    $order_details = $stmt->get_result();

    $order_total_price = calculateTotalOrderPrice($order_details);

}else {
    header('location: account.php');
    exit();
}


function calculateTotalOrderPrice($order_details){

    $total = 0;

    foreach($order_details as $row){

        $product_price = $row['product_price'];
        $product_quantity = $row['product_quantity'];

        $total = $total + ($product_price * $product_quantity);
    }

    return $total;
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



    <!--Orders-->
    <section id="orders" class="orders container my-5 py-5">
    <div class="container mt-5">
        <h2 class="form-weight-bold">Order Details</h2>
        <hr/>
    </div>

    <table class="mt-5 pt-5 mx-auto">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        
        <?php foreach($order_details as $row){ ?>
                        <tr>
                            <td>
                                 <div class="">
                                    <img src="assets/images/clothes/<?php echo$row['product_image'];?>" /> 
                                    <div>
                                        <p class="mt-3"><?php echo$row['product_name']; ?></p>
                                    </div> 
                                

                            </td>

                            <td>
                                <span>RS. <?php echo$row['product_price']; ?></span>
                            </td>

                            <td>
                                <span><?php echo$row['product_quantity']; ?></span>
                            </td>

                        </tr>
        <?php }?>
    </table>

    <?php if($order_status == "Not Paid"){ ?>

        <form style="float: right;" method="POST" action="payment.php">
            
            <input type="hidden" name="order_total_price" value="<?php echo $order_total_price; ?>" />
            <input type="hidden" name="order_status" value="<?php echo $order_status; ?>" />
            
            <input class="btn order-details-btn" type="submit" value="Pay Now" name="order_pay_btn"/>                    
        </form>
    
    <?php } ?>

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