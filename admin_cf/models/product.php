<?php

class Product
{
    public $product_id;
    public $product_name;
    public $category_id;
    public $product_img;
    public $product_desc;
    public $product_price;

    // add product function
    public function addProduct($product_id, $product_name, $category_id, $product_img, $product_desc, $product_price)
    {
        // get data
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->category_id = $category_id;
        $this->product_img = $product_img;
        $this->product_desc = $product_desc;
        $this->product_price = $product_price;

        // insert data into database
        $sql = "INSERT INTO `product`(`product_id`, `product_name`, `category_id`, `product_img`, `product_desc`, `product_price`) 
                VALUES ('$this->product_id','$this->product_name','$this->category_id','$this->product_img','$this->product_desc','$this->product_price')";
        if (DB::connect()->query($sql) === TRUE) {
            if ($category_id == 1) {
                header('Location:http://localhost/coffee_shop/admin_cf/?table=coffee');
            } elseif ($category_id == 2) {
                header('Location:http://localhost/coffee_shop/admin_cf/?table=cake');
            }
        } else {
            echo "Error {$sql}" . DB::connect()->error;
        }
    }

    // update product function
    public function updateProduct($product_id, $product_name, $category_id, $product_img, $product_desc, $product_price)
    {
        // get data
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->category_id = $category_id;
        $this->product_img = $product_img;
        $this->product_desc = $product_desc;
        $this->product_price = $product_price;

        // update data in database
        $sql = "UPDATE `product` SET `product_id`='$this->product_id',`product_name`='$this->product_name',`category_id`='$this->category_id',`product_img`='$this->product_img',`product_desc`='$this->product_desc',`product_price`='$this->product_price' WHERE `product_id`='$this->product_id'";
        if (DB::connect()->query($sql) === TRUE) {
            if ($category_id == 1) {
                header('Location:http://localhost/coffee_shop/admin_cf/?table=coffee');
            } elseif ($category_id == 2) {
                header('Location:http://localhost/coffee_shop/admin_cf/?table=cake');
            }
        } else {
            echo "Error {$sql}" . DB::connect()->error;
        }
    }

    // delete product function
    public function deleteProduct($product_id)
    {
        // get data
        $this->product_id = $product_id;

        // Get category_id of the product
        $sql = "SELECT `category_id` FROM `product` WHERE `product_id`='$this->product_id'";
        $result = DB::connect()->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $category_id = $row['category_id'];

            // delete data from database by id
            $sql = "DELETE FROM `product` WHERE `product_id`='$this->product_id'";
            if (DB::connect()->query($sql) === TRUE) {
                if ($category_id == 1) {
                    header('Location:http://localhost/coffee_shop/admin_cf/?table=coffee');
                } elseif ($category_id == 2) {
                    header('Location:http://localhost/coffee_shop/admin_cf/?table=cake');
                }
            } else {
                echo "Error {$sql}" . DB::connect()->error;
            }
        }
    }

    // id check function
    public function compareID($product_id)
    {
        $sql = "SELECT * FROM `product` WHERE `product_id`='$product_id'";
        $result = DB::connect()->query($sql);

        if ($result->num_rows > 0) {
            echo '<script>alert("ID sản phẩm đã tồn tại!");</script>';
            echo '<script>window.location.href = "http://localhost/coffee_shop/admin_cf/views/view_form/form_add_product.php";</script>';
            die();
        } 
    }
}
