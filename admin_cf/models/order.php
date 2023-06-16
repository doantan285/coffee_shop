<?php

class Order
{
    public static function makePayment($tableNumber, $note, $customerPhone, $total)
    {
        $products = '';

        foreach ($_SESSION['cart'] as $key => $value) {
            $products .= $value['product_name'] . '(' . $value['quantity'] . '),';
        }

        $productsOrdered = rtrim($products, ', ');
        $orderTime = date("Y-m-d H:i:s");
        $totalPayment = $total;

        $sql = "INSERT INTO `order_customer`(`table_number`, `products_ordered`, `order_time`, `note`, `customer_phone`,`total_payment`) 
                VALUES ('$tableNumber','$productsOrdered','$orderTime','$note','$customerPhone','$totalPayment')";

        $conn = DB::connect();

        if ($conn->query($sql)) {
            $order_id = $conn->insert_id;

            echo '<script>alert("Order thành công!");</script>';
            echo '<script>window.location.href = "http://localhost/coffee_shop/front_end/view_invoice/invoice.php?order_id=' . $order_id . '";</script>';
        } else {
            echo "Error {$sql}" . DB::connect()->error;
        }
    }
}
