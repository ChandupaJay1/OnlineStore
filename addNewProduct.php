<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/images/icon/ico-new.png" />
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

                <h2>Add New Product</h2>
                <div class="table-responsive">
                    <div class="mx-auto container">
                        <form id="edit-form" method="POST" action="createProduct.php" enctype="multipart/form-data">
                            <p style="color: red;"><?php if (isset($_GET['error'])) {
                                                        echo $_GET['error'];
                                                    } ?></p>

                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>" />

                            <div class="form-group mt-2">
                                <label>Title</label>
                                <input type="text" class="form-control" id="product-name" name="name" placeholder="Title" required />
                            </div>

                            <div class="form-group mt-2">
                                <label>Description</label>
                                <input type="text" class="form-control" id="product-desc" name="description" placeholder="Description" required />
                            </div>

                            <div class="form-group mt-2">
                                <label>Price</label>
                                <input type="text" class="form-control" id="product-price" name="price" placeholder="Price" required />
                            </div>

                            <div class="form-group mt-2">
                                <label>Quantity</label>
                                <input type="text" class="form-control" id="product-qty" name="quantity" placeholder="Quantity" required />
                            </div>


                            <div class="form-group mt-2">
                                <label>Category</label>
                                <select class="form-select" required name="category">
                                    <option value="featured">Featured</option>
                                    <option value="cap">Caps</option>
                                    <option value="full suite">Full suites</option>
                                    <option value="tshirt">T-Shirts</option>
                                </select>
                            </div>

                            <div class="form-group mt-2">
                                <label>Image 1</label>
                                <input type="file" class="form-control" id="image1" name="image1" placeholder="Image 1" required />
                            </div>

                            <div class="form-group mt-2">
                                <label>Image 2</label>
                                <input type="file" class="form-control" id="image2" name="image2" placeholder="Image 2" required />
                            </div>

                            <div class="form-group mt-2">
                                <label>Image 3</label>
                                <input type="file" class="form-control" id="image3" name="image3" placeholder="Image 3" required />
                            </div>

                            <div class="form-group mt-2">
                                <label>Image 4</label>
                                <input type="file" class="form-control" id="image4" name="image4" placeholder="Image 4" required />
                            </div>

                            <div class="form-group buy-btn-container mt-3">
                                <input type="submit" class="btn btn-primary" name="create_product" value="Add Product" />
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