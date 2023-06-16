<?php
if (isset($_POST['button_add'])) {
    include dir_admin . '/views/view_form/form_add_product.php';
    die();
} elseif (isset($_POST['button_update'])) {
    include dir_admin . '/views/view_form/form_update_product.php';
    die();
}
?>
<div class="wrapper-form_product">
    <!-- heading form -->
    <div class="heading-form_product">
        <form action="" method="post"  class="search_field">
            <input  type="text" name="product_name" placeholder="Tên sản phẩm">
            <input  type="submit" name="search" value="Tìm">
        </form>
        <h1 style="color: var(--color-begie);"><i class="fa-solid fa-cookie"></i>&nbsp; Cakes</h1>
        <form action="" method="post">
            <input class="btn-link_add" type="submit" name="button_add" value="Thêm sản phẩm">
        </form>
    </div>

    <!-- body form -->
    <div class="body-form_product">
        <table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <th style="width:5%">ID</th>
                <th style="width:10%">Tên sản phẩm</th>
                <th style="width:15%">Ảnh</th>
                <th style="width:50%">Mô tả</th>
                <th style="width:10%">Giá (VNĐ)</th>
                <th style="width:10%">Tùy chỉnh</th>
            </tr>
            <?php
            // initialize object
            $products = handleProduct::getAllProducts();

            // show product to table
            if (!empty($products)) {
                foreach ($products as $product) {
                    if ($product['category_id'] == "2") {
                        $product_id = $product['product_id'];
                        $product_name = $product['product_name'];
                        $product_img = $product['product_img'];
                        $product_desc = $product['product_desc'];
                        $product_price = $product['product_price'];

                        // search product to table
                        if (isset($_POST['search'])) {
                            if (empty($_POST['product_name'])) {
                                echo '<td colspan="6"><h1>Bạn chưa nhập tên sản phẩm!</h1></td>';
                                die();
                            } else {
                                if (strtolower($product_name) == strtolower($_POST['product_name'])) {
                                    echo 
                                    '<tr>
                                        <td>' . $product_id . '</td>
                                        <td>' . $product_name . '</td>
                                        <td><img src="' . dir_admin_url . $product_img . '" width="100" height="100"></td>
                                        <td style="text-align: left">' . $product_desc . '</td>
                                        <td>' . $product_price . '</td>
                                        <td>
                                            <form action="" method="post">
                                                <input class="btn-custom" type="hidden" name="id_product_update" value="' . $product_id . '">
                                                <input class="btn-custom" type="submit" name="button_update" value="Cập nhật">
                                            </form>
                                            <a onclick="return confirm(\'Bạn muốn xóa ' . $product_name . '?\');" href="index.php?deleteid=' . $product_id . '"><input type="submit" style="color: red ;width: 80px; height:28px; margin-bottom:5px" name="delete_product" value="Xóa"></a>
                                        </td>
                                    </tr>
                                    <a class="btn-link_home" href="http://localhost/coffee_shop/admin_cf/?table=cake"><i class="fa-solid fa-house"></i></a>';
                                }
                            }
                        } else {
                            // show cake list
                            echo 
                            '<tr>
                                <td>' . $product_id . '</td>
                                <td>' . $product_name . '</td>
                                <td><img src="' . dir_admin_url . $product_img . '" width="100" height="100"></td>
                                <td style="text-align: left">' . $product_desc . '</td>
                                <td>' . $product_price . '</td>
                                <td>
                                    <form action="" method="post">
                                        <input class="btn-custom" type="hidden" name="id_product_update" value="' . $product_id . '">
                                        <input class="btn-custom" type="submit" name="button_update" value="Cập nhật">
                                    </form>
                                    <a onclick="return confirm(\'Bạn muốn xóa ' . $product_name . '?\');" href="index.php?deleteid=' . $product_id . '"><input class="btn-custom" type="submit" style="color: red" name="delete_product" value="Xóa"></a>
                                </td>
                            </tr>';
                        }
                    }
                }
            }
            ?>
        </table>
    </div>
</div>