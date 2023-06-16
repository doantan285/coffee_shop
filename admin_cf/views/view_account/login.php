<?php
session_start();
require '../../../constant.php';
require dir_admin . '/config/database.php';

require dir_admin . '/models/user.php';
require dir_admin . '/controllers/handle_account.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <!-- link font awesome -->
    <link rel="stylesheet" href="../../assets/fonts/fontawesome-6.4.0/css/all.min.css">
    <!-- link css -->
    <link rel="stylesheet" href="../../assets/css/css_account/reset.css">
    <link rel="stylesheet" href="../../assets/css/css_account/login.css">
</head>

<body>
    <div class="wrapper">
        <form action="" method="post" class="form-login">
            <h1 class="form-heading">Đăng nhập</h1>
            <?php
            if (isset($error)) {
                echo '<span class="error-msg">' . $error . '</span>';
            }
            ?>
            <div class="form-group">
                <i class="fa-solid fa-user"></i>
                <input type="email" name="email" class="form-input" placeholder="Email đăng nhập" require>
            </div>
            <div class="form-group">
                <i class="fa-solid fa-key"></i>
                <input type="password" name="password" class="form-input" placeholder="Mật khẩu" require>
            </div>
            <input type="submit" name="login" value="Đăng nhập" class="form-submit">
            <p>Nếu bạn chưa có tài khoản, vui lòng đăng ký <a style="color:aqua" href="register.php">tại đây</a></p>
        </form>
    </div>
</body>

</html>