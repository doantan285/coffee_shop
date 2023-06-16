<div class="side-header">
    <!-- brand image -->
    <div class="header_brand-img">
        <img src="assets/image/others/logo.jpg" alt="logo">
    </div>
    <!-- display user name -->
    <div class="header_user">
        <h2><?php echo $_SESSION['admin_name']; echo ($_SESSION['role'] === 'manager') ? ' (Manager)' : ' (Employee)'; ?></h2>
    </div>
    <!-- logout button -->
    <div class="btn-logout">
        <a href="http://localhost/coffee_shop/admin_cf/views/view_account/logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
    </div>
</div>