<?php
session_start();
require '../../constant.php';

require dir_admin . '/config/database.php';
require dir_admin . '/controllers/handle_product.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <header>
        <!-- include file header -->
        <?php include 'header_cart.php'; ?>
    </header>
    <main>
        <div class="container mt-5">
            <div class="row">
                <?php
                if (isset($_GET['list'])) {
                    switch ($_GET['list']) {
                        case "coffee_list":
                            handleProduct::showProductList(1);
                            die();
                        case "cake_list":
                            handleProduct::showProductList(2);
                            die();
                    }
                }
                $result = DB::connect()->query("SELECT * FROM product;");

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        $product_id = $row['product_id'];
                        $product_name = $row['product_name'];
                        $image = $row['product_img'];
                        $description = $row['product_desc'];
                        $price = $row['product_price'];
                        $category_id = $row['category_id'];

                        echo '
                        <div class="col-lg-3">
                            <form action="../../admin_cf/controllers/handle_cart.php" method="post" class="mt-3 mb-3">
                                <div class="card">
                                    <img src="' . dir_admin_url . $image . '" class="card-img-top" alt="" style="height: 250px;">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">' . $product_name . '</h5>
                                        <p class="card-text">' . $price . ' (VNĐ)</p>
                                        <button type="submit" name="add_to_cart" class="btn btn-info">Thêm vào giỏ hàng</button>
                                        <input type="hidden" name="product_img" value="' . $image . '">
                                        <input type="hidden" name="product_name" value="' . $product_name . '">
                                        <input type="hidden" name="product_price" value="' . $price . '">
                                        <input type="hidden" name="category_id" value="' . $category_id . '">
                                    </div>
                                </div>
                            </form>
                        </div>';
                    }
                }
                ?>
            </div>
        </div>
    </main>

</body>

</html>