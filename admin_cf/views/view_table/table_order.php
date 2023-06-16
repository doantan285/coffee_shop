<div class="wrapper-order">
    <div class="heading-order">
        <h1 style="color: var(--color-begie);"><i class="fa-solid fa-file-invoice"></i>&nbsp;Being Ordered</h1>
    </div>
    <div class="body-order">
        <table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <th style="width:2%">Bàn</th>
                <th style="width:15%">Sẩn phẩm</th>
                <th style="width:5%">Thời điểm order</th>
                <th style="width:15%">Ghi chú</th>
                <th style="width:5%">Số điện thoại</th>
                <th style="width:8%">Tổng thanh toán (VNĐ)</th>
                <th style="width:5%">Trạng thái</th>
            </tr>
            <?php
            $result = DB::connect()->query("SELECT * FROM order_customer ORDER BY order_time DESC;");

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    $order_id = $row['order_id'];
                    $table_number = $row['table_number'];
                    $products_ordered = $row['products_ordered'];
                    $order_time = $row['order_time'];
                    $note = $row['note'];
                    $customer_phone = $row['customer_phone'];
                    $total_payment = $row['total_payment'];
                    $status = $row['status'];

                    echo '<tr>
                        <td>' . $table_number . '</td>
                        <td style="text-align: left">' . $products_ordered . '</td>
                        <td>' . $order_time . '</td>
                        <td style="text-align: left">' . $note . '</td>
                        <td>' . $customer_phone . '</td>
                        <td>' . $total_payment . '</td>                       
                        <td>
                            <form action="'. dir_admin_url.'" method="post">
                                <input type="hidden" name="order_id" value="' . $order_id . '">
                                ';
                                if ($status === 'unconfirmed') {
                                    echo '<input class="btn-confirm" name="btn-confirm" type="submit" value="Xác nhận">';
                                } elseif ($status === 'confirmed') {
                                    echo '<input class="btn-confirm" name="btn-confirm" type="submit" value="Đã xác nhận" disabled style="background: grey; cursor: default;">';
                                }
                                echo '
                            </form>
                        </td>                       
                    </tr>';
                }
            }
            ?>
        </table>
    </div>
</div>