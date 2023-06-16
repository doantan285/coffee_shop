<?php

class Cart
{
    // add product into cart
    public static function addToCart($productName, $product_img, $price, $categoryID)
    {
        if (isset($_SESSION['cart'])) {
            // retrieves a subarray containing the values of the product_name column from a $_SESSION['cart'] two-dimensional array
            $myItems = array_column($_SESSION['cart'], 'product_name');

            if (in_array($productName, $myItems)) {
                // search the index of the product in the cart
                $productIndex = array_search($productName, $myItems);
                // increase the quantity of the product by 1
                $_SESSION['cart'][$productIndex]['quantity'] += 1;
            } else {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('product_name' => $productName,'product_img' => $product_img, 'price' => $price, 'quantity' => 1);
            }
        } else {
            $_SESSION['cart'][0] = array('product_name' => $productName,'product_img' => $product_img, 'price' => $price, 'quantity' => 1);
        }

        if ($categoryID == 1) {
            header('Location:http://localhost/coffee_shop/front_end/view_cart/menu_product.php?list=coffee_list');
        } elseif ($categoryID == 2) {
            header('Location:http://localhost/coffee_shop/front_end/view_cart/menu_product.php?list=cake_list');
        }
    }

    public static function removeFromCart($productName)
    {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['product_name'] == $productName) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                header('Location:http://localhost/coffee_shop/front_end/view_cart/my_cart.php');
            }
        }
    }
}
