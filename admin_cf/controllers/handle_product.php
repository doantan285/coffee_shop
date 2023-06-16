<?php

class handleProduct {

    // get all products function
    public static function getAllProducts()
    {
        $sql = "SELECT * FROM `product`";
        $result = DB::connect()->query($sql);
        $products = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product = array(
                    'product_id' => $row['product_id'],
                    'product_name' => $row['product_name'],
                    'category_id' => $row['category_id'],
                    'product_img' => $row['product_img'],
                    'product_desc' => $row['product_desc'],
                    'product_price' => $row['product_price']
                );
                $products[] = $product;
            }
        }
        return $products;
    }

    // show list product by category
    public static function showProductList($category)
    {
        $result = DB::connect()->query("SELECT * FROM product;");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['category_id'] == $category) {
                    $product_id = $row['product_id'];
                    $product_name = $row['product_name'];
                    $image = $row['product_img'];
                    $description = $row['product_desc'];
                    $price = $row['product_price'];
                    $category_id = $row['category_id'];

                    include dir_admin . '/views/view_product/product_list.php';
                }
            }
        }
    }
}
// add product
if (isset($_POST['add_product'])) {// initialize object
    $product = new Product();

    // receive data from form add
    $product_id = $_POST['product_id'];
    $product->compareID($product_id);
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $product_desc = $_POST['product_desc'];
    $product_price = $_POST['product_price'];

    // Move uploaded file to a specific folder
    $image_path = basename($_FILES['product_img']['name']);
    $target_dir = 'assets/image/product_img/';
    $target_file = $target_dir . $image_path; 
    move_uploaded_file($_FILES['product_img']['tmp_name'], $target_file);

    $product->addProduct($product_id, $product_name, $category_id, $target_file, $product_desc, $product_price);
}

// update product
if (isset($_POST['update_product'])) {
    // initialize object
    $product = new Product();

    // receive data from form update
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $product_desc = $_POST['product_desc'];
    $product_price = $_POST['product_price'];

    // Move uploaded file to a specific directory
    $image_path = basename($_FILES['product_img']['name']);
    $target_dir = 'assets/image/product_img/';
    $target_file = $target_dir . $image_path; 
    move_uploaded_file($_FILES['product_img']['tmp_name'], $target_file);

    $product->updateProduct($product_id, $product_name, $category_id, $target_file, $product_desc, $product_price);
}

// delete product
if (isset($_GET['deleteid'])) {
    // initialize object
    $product = new Product();

    // get data from table product
    $product_id = $_GET['deleteid'];

    $product->deleteProduct($product_id);
}
