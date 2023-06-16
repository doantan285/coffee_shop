<div class="wrapper_revenue">
    <div class="form_revenue">
        <div class="form_revenue-heading">
            <form action="" class="search_revenue" method="post">
                <input type="text" name="time" placeholder="Nhập thời gian">
                <input type="submit" name="search" value="Tìm">
            </form>
            <h1><i class="fa-solid fa-money-bill"></i>&nbsp; Revenue Management</h1>
        </div>
        <div class="form_revenue-body">
            <table border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <th>Thời gian (Ngày)</th>
                    <th>Doanh thu (VNĐ)</th>
                </tr>
                <?php
                $revenueByDate = array(); // Mảng lưu trữ tổng doanh thu cho mỗi ngày

                $sql = "SELECT * FROM `order_customer`";
                $result = DB::connect()->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $date = substr($row['order_time'], 0, 10);
                        $revenue = (int) $row['total_payment'];

                        // Nếu ngày đã tồn tại trong mảng, cộng doanh thu vào tổng
                        if (isset($revenueByDate[$date])) {
                            $revenueByDate[$date] += $revenue;
                        } else { // Nếu ngày chưa tồn tại, tạo mới mục trong mảng
                            $revenueByDate[$date] = $revenue;
                        }
                    }
                    // Hiển thị các giá trị trong mảng
                    foreach ($revenueByDate as $date => $totalRevenue) {
                        if (isset($_POST['search'])) {
                            if (empty($_POST['time'])) {
                                echo '<td colspan="2"><h1>Bạn chưa nhập thời gian!</h1></td>';
                                die();
                            } else {
                                if (strtolower($date) == strtolower($_POST['time'])) {
                                    echo '
                                    <tr>
                                        <td>' . $date . '</td>
                                        <td>' . $totalRevenue . '</td>
                                    </tr>';
                                }
                            }
                        } else {
                            echo '
                            <tr>
                                <td>' . $date . '</td>
                                <td>' . $totalRevenue . '</td>
                            </tr>';
                        }
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>