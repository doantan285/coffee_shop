<div class="side-content">
    <?php
    switch ($_GET['table']) {
        case 'order':
            include dir_admin . '/views/view_table/table_order.php';
            break;
        case 'coffee':
            include dir_admin . '/views/view_table/table_coffee.php';
            break;
        case 'cake':
            include dir_admin . '/views/view_table/table_cake.php';
            break;
        default:
            if ($_SESSION['role'] === 'manager') {
                switch ($_GET['table']) {
                    case 'revenue':
                        include dir_admin . '/views/view_table/table_revenue.php';
                        break;
                    case 'account':
                        include dir_admin . '/views/view_table/table_account.php';
                        break;
                }
            }
            break;
    }
    ?>
</div>