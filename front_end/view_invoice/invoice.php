<?php
session_start();
require '../../constant.php';
require dir_admin . '/config/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn</title>
    <!-- link font awesome -->
    <link rel="stylesheet" href="../../admin_cf/assets/fonts/fontawesome-6.4.0/css/all.min.css">
    <!-- link css -->
    <link rel="stylesheet" href="../../admin_cf/assets/css/invoice.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="container">
        <?php 
        if (isset($_GET['order_id'])) {
            include 'invoice_detail.php';
        } else {
            echo '<h1 style="position:absolute;font-size:52px; top:40%;left:36%">Không có hóa đơn!</h1>';
        }
        ?>
    </div>
</body>

</html>