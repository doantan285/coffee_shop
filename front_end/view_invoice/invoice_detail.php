<div class="wrapper-invoice">
    <div class="invoice-header">
        <h1><i class="fa-solid fa-circle-check"></i> Cảm ơn bạn đã đặt hàng</h1>
    </div>

    <div class="invoice-body">
        <div class="invoice-body_top">
            <h3>Detail invoice</h3>
        </div>
        <div class="invoice-body_bot">
            <?php
            if (isset($_POST['order_again'])) {
                unset($_SESSION['cart']);
                header('Location:http://localhost/coffee_shop/front_end/view_cart/menu_product.php');
            }
            if (isset($_GET['order_id'])) {
                $order_id = $_GET['order_id'];

                $sql = "SELECT order_id, table_number, products_ordered, order_time, note, customer_phone, total_payment
                                FROM order_customer
                                WHERE order_id = '$order_id'";

                $result = DB::connect()->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $order_id = $row['order_id'];
                        $tableNumber = $row['table_number'];
                        $productsOrdered = $row['products_ordered'];
                        $orderTime = $row['order_time'];
                        $note = $row['note'];
                        $customerPhone = $row['customer_phone'];
                        $totalPayment = $row['total_payment'];

                        // In ra thông tin
                        echo '<p class="invoice-body_text"><span>Table Number: </span>' . $tableNumber . '</p>
                                <p class="invoice-body_text"><span>Products Ordered: </span>' . $productsOrdered . '</p>
                                <p class="invoice-body_text"><span>Order Time: </span>' . $orderTime . '</p>
                                <p class="invoice-body_text"><span>Note: </span>' . $note . '</p>
                                <p class="invoice-body_text"><span>Customer Phone: </span>' . $customerPhone . '</p>
                                <p class="invoice-body_text"><span>Total Payment: </span>' . $totalPayment . '</p>';
                    }
                }
            }
            if (isset($_POST['btn-cancel'])) {
                $order_id = $_GET['order_id'];

                $sql = "SELECT status FROM order_customer WHERE order_id = $order_id";
                $result = DB::connect()->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $status = $row['status'];

                    if ($status === 'unconfirmed') {
                        // Thực hiện hủy đơn hàng
                        $delete_sql = "DELETE FROM order_customer WHERE order_id = $order_id";
                        $delete_result = DB::connect()->query($delete_sql);

                        if ($delete_result) {
                            unset($_SESSION['cart']);
                            echo '<script>alert("Bạn đã hủy đơn!");</script>';
                            echo '<script>window.location.href = "http://localhost/coffee_shop/front_end/view_cart/menu_product.php";</script>';
                        }
                    } elseif ($status === 'confirmed') {
                        echo '<script>alert("Đơn hàng không thể hủy vì đã được xác nhận!");</script>';
                        echo '<script>window.location.href = "http://localhost/coffee_shop/front_end/view_cart/invoice.php?order_id=' . $order_id . '";</script>';
                    }
                }
            }
            ?>
        </div>
    </div>

    <div class="invoice-footer">
        <form action="" method="post">
            <a href="http://localhost/coffee_shop/front_end/view_cart/menu_product.php"><input type="submit" name="order_again" value="Tiếp Tục Order"></a>
        </form>
        <form action="" method="post">
            <input onclick="return confirm('Bạn muốn hủy đơn?')" type="submit" value="HỦY ĐƠN" id="btn-cancel" name="btn-cancel">
        </form>
    </div>
</div>