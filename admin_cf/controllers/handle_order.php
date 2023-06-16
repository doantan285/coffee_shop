<?php
// click submit_payment
if (isset($_POST['submit_payment'])) {
    $tableNumber = $_POST['table_number'];
    $note = $_POST['note'];
    $customerPhone = $_POST['customer_phone'];
    $total = $_POST['gtotal']; // giá trị được truyền từ JavaScript

    Order::makePayment($tableNumber, $note, $customerPhone, $total);
}

// click confirm order
if (isset($_POST['btn-confirm'])) {
    $order_id = $_POST['order_id'];
    $sql = "UPDATE `order_customer` SET `status`='confirmed' WHERE `order_id`=$order_id";

    DB::connect()->query($sql);
    header('Location:http://localhost/coffee_shop/admin_cf/?table=order');
}