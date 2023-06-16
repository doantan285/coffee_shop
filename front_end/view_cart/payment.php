<?php
session_start();

$count = 0;
if (isset($_SESSION['cart'])) {
    $count = count($_SESSION['cart']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5">
        <main>
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3 mt-5">
                        <span class="text-primary">Sản phẩm thanh toán</span>
                        <span class="badge bg-primary rounded-pill"><?php echo $count; ?></span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php
                        $total = 0;
                        if (isset($_SESSION['cart'])) {
                            // sử dụng tham chiếu &$product trong vòng lặp foreach để cập nhật trực tiếp giá trị mảng $_SESSION['cart]
                            foreach ($_SESSION['cart'] as $key => &$product) {
                                // Lấy giá trị iquantity từ session và cập nhật vào $product['quantity']
                                if (isset($_POST['iquantity'])) {
                                    $iquantityArray = json_decode($_POST['iquantity'], true);
                                    if (isset($iquantityArray[$key])) {
                                        $product['quantity'] = $iquantityArray[$key];
                                    }
                                }
                            
                                $total += ($product['price'] * $product['quantity']);
                                echo '                            
                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                    <div>
                                        <h6 class="my-0">' . $product['product_name'] . '</h6>
                                        <small class="text-muted">Số lượng: ' . $product['quantity'] . '</small>
                                    </div>
                                    <span class="text-muted">' . ($product['price'] * $product['quantity']) . ' (vnđ)</span>
                                </li>';
                            }
                        } else {
                            echo '<li colspan="4"><h1 class="text-center" col=4>Không có sản phẩm nào!</h1></li>';
                        }

                        ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tổng (VNĐ)</span>
                            <strong><?php echo $total; ?>(vnđ)</strong>
                        </li>
                    </ul>

                    <hr class="my-4">
                    <h4 class="mb-3"></h4> 
                    <!-- Phần chứa hình thức thanh toán -->
                    
                    <hr class="my-4">

                </div>
                <div class="col-md-7 col-lg-8">
                    <a href="my_cart.php">
                        <button class="btn btn-success btn-block col-lg-2">Giỏ hàng</button>
                    </a>
                    <h2 class="mb-3 text-center">Thông tin thanh toán</h2>
                    <form action="../../admin_cf/index.php" class="needs-validation was-validated" method="post">
                        <!-- Thêm hidden fields để lưu giá trị iquantity và gtotal -->
                        <?php
                        echo '<input type="hidden" name="iquantity" value="' . htmlspecialchars($_POST['iquantity']) . '">';
                        echo '<input type="hidden" name="gtotal" value="' . htmlspecialchars($total) . '">';
                        ?>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="table_number" class="form-label">Bàn số</label>
                                <input type="number" class="form-control" id="table_number" name="table_number" min=1 required>
                                <div class="invalid-feedback">
                                    Nhập số bàn của bạn.
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="customer_phone" class="form-label">Số điện thoại <span class="text-muted">(nhập số điện thoại để xác minh đơn hàng)</span></label>
                                <input type="number" class="form-control" id="customer_phone" name="customer_phone" required="">
                                <div class="invalid-feedback">
                                    Hãy nhập số điện thoại của bạn.
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="col-12">
                            <label for="note" class="form-label">Ghi chú <span class="text-muted">(Tùy chọn)</span></label>
                            <textarea type="number" class="form-control" rows="6" id="note" name="note"></textarea>
                        </div>

                        <hr class="my-4">

                        <div class="col-12">
                            <button class="w-100 btn btn-primary btn-lg" type="submit" name="submit_payment">Tiến hành thanh toán</button>
                        </div>
                        <br><br>
                    </form>
                </div>
            </div>
        </main>
    </div>

</body>

</html>
