<?php
if (!isset($_SESSION['admin_name'])) {
    header('Location:http://localhost/coffee_shop/admin_cf/views/view_account/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- link fontawesome -->
    <link rel="stylesheet" href="assets/fonts/fontawesome-6.4.0/css/all.min.css">
    <!-- link css -->
    <link rel="stylesheet" href="http://localhost/coffee_shop/admin_cf/assets/css/backend_panel.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="http://localhost/coffee_shop/admin_cf/assets/css/table_css/table_order.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="http://localhost/coffee_shop/admin_cf/assets/css/table_css/table_product.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="http://localhost/coffee_shop/admin_cf/assets/css/table_css/table_account.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="http://localhost/coffee_shop/admin_cf/assets/css/table_css/table_revenue.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="http://localhost/coffee_shop/admin_cf/assets/css/form_css/form_add_product.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="http://localhost/coffee_shop/admin_cf/assets/css/form_css/form_update_product.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php
    switch ($_SESSION['role']) {
        case "manager":
    ?>
            <div class="container">
                <!-- side-header -->
                <?php include dir_admin . '/views/view_side/side_header.php'; ?>
                <!-- side-body -->
                <div class="side-body">
                    <!-- side navbar -->
                    <?php include dir_admin . '/views/view_side/side_navbar.php'; ?>
                    <!-- side content -->
                    <?php include dir_admin . '/views/view_side/side_content.php'; ?>
                </div>
            </div>
        <?php
            break;

        case "employee":
        ?>
            <div class="container">
                <!-- side-header -->
                <?php include dir_admin . '/views/view_side/side_header.php'; ?>
                <!-- side-body -->
                <div class="side-body">
                    <!-- side navbar -->
                    <?php include dir_admin . '/views/view_side/side_navbar.php'; ?>
                    <!-- side content -->
                    <?php include dir_admin . '/views/view_side/side_content.php'; ?>
                </div>
            </div>
    <?php
            break;
    }
    ?>

</body>

</html>