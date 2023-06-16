<?php

echo '<div class="col-lg-3">
    <form action="../../admin_cf/controllers/handle_cart.php" method="post" class="mt-3 mb-3">
        <div class="card">
            <img src="' . dir_admin_url . '/' . $image . '" class="card-img-top" alt="" style="height: 250px;">
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