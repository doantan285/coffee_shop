<?php
$product_id = $_POST['id_product_update'];
$sql = "SELECT * FROM product WHERE `product_id`='$product_id'";
$result = DB::connect()->query($sql);
$row = $result->fetch_assoc();

$product_name = $row['product_name'];
$category_id = $row['category_id'];
$product_img = $row['product_img'];
$product_desc = $row['product_desc'];
$product_price = $row['product_price'];
?>

<div class="wrapper-form_update">
    <form class="form_update" action="<?php echo dir_admin_url ?>" method="post" enctype="multipart/form-data">
        <h2 class="form_update-heading">Thông tin sản phẩm cập nhật</h2>
        <div class="form_update-body">
            <div class="form_update-field">
                <label for="id_update">ID sản phẩm:</label> 
                <input id="id_update" type="number" name="product_id" value="<?php echo $product_id; ?>">
            </div>
            <div class="form_update-field">
                <label for="name_update">Tên sản phẩm:</label> 
                <input id="name_update" type="text" name="product_name" value="<?php echo $product_name; ?>">
            </div>
            <div class="form_update-field input_radio">
                <label>Loại:</label>
                <?php
                if ($category_id == "1") {
                    echo '<div><input type="radio" name="category_id" id="1" value="1" checked><label style="padding: 0 5px" for="1">Coffee</label></div>
                        <div><input type="radio" name="category_id" id="2" value="2"><label style="padding: 0 5px" for="2">Cake</label></div>';
                } elseif ($category_id == "2") {
                    echo '<div><input type="radio" name="category_id" id="1" value="1"><label style="padding: 0 5px" for="1">Coffee</label></div>
                        <div><input type="radio" name="category_id" id="2" value="2" checked><label style="padding: 0 5px" for="2">Cake</label></div>';
                }
                ?>
            </div>
            <div class="form_update-field">
                <label>Ảnh sản phẩm:</label>
                <input type="file" name="product_img" value="<?php echo $product_img; ?>"></div>
            <div class="form_update-field  form_desc">
                <label for="desc_update">Mô tả:</label>
                <textarea id="desc_update" name="product_desc" rows="6" cols="70"><?php echo $product_desc; ?></textarea>
            </div>
            <div class="form_update-field">
                <label for="price_update">Giá:</label>
                <input id="price_update" type="number" name="product_price" placeholder="VNĐ" value="<?php echo $product_price; ?>">
            </div>
        </div>

        <input type="submit" value="Cập nhật sản phẩm" class="btn_update" name="update_product">
    </form>
</div>