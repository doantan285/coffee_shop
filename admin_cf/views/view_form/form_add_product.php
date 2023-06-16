<div class="wrapper-form_add">
    <form class="form_add" action="<?php echo dir_admin_url; ?>" method="post" enctype="multipart/form-data">
        <h2 class="form_add-heading">Thông tin sản phẩm được thêm</h2>
        <div class="form_add-body">
            <div class="form_add-field">
                <label for="product_id">ID sản phẩm:</label>
                <input type="number" name="product_id" id="product_id" required placeholder="Nhập ID sản phẩm">
            </div>
            <div class="form_add-field">
                <label for="product_name">Tên sản phẩm:</label>
                <input type="text" name="product_name" id="product_name" required placeholder="Nhập tên sản phẩm">
            </div>
            <div class="form_add-field input_radio">
                <label>Loại:</label>
                <div><input type="radio" name="category_id" id="1" value="1" checked><label style="padding: 0 5px" for="1">Coffee</label></div>
                <div><input type="radio" name="category_id" id="2" value="2"><label style="padding: 0 5px" for="2">Cake</label></div>
            </div>
            <div class="form_add-field">
                <label>Ảnh sản phẩm:</label>
                <input type="file" name="product_img">
            </div>
            <div class="form_add-field form_desc">
                <label for="product_desc">Mô tả:</label>
                <textarea name="product_desc" id="product_desc" rows="6" cols="70"></textarea>
            </div>
            <div class="form_add-field">
                <label for="product_price">Giá:</label>
                <input type="number" name="product_price" id="product_price" placeholder="VNĐ" required>
            </div>
        </div>
        <input type="submit" value="Thêm sản phẩm" class="btn_add" name="add_product">
    </form>
</div>