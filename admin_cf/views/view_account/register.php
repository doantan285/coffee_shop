<?php
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
    <title>Đăng ký</title>
    <!-- link css -->
    <link rel="stylesheet" href="../../assets/css/css_account/reset.css">
    <link rel="stylesheet" href="../../assets/css/css_account/register.css">
</head>

<body>
    <div class="wrapper">
        <form action="" method="post" class="form-register">
            <h1 class="form-heading">Đăng ký</h1>
            <?php
            if (isset($error)) {
                echo '<span class="error-msg">' . $error . '</span>';
            }
            ?>
            <label for="">Họ và tên</label>
            <div class="form-group">
                <input type="text" name="user_name" class="form-input" require>
            </div>
            <label for="">Email đăng nhập</label>
            <div class="form-group">
                <input type="email" name="email" class="form-input" require>
            </div>
            <label for="">Mật khẩu</label>
            <div class="form-group">
                <input type="password" name="password" class="form-input" require>
            </div>
            <label for="">Nhập lại mật khẩu</label>
            <div class="form-group">
                <input type="password" name="cpassword" class="form-input" require>
            </div>

            <label for="">Chức vụ</label>
            <select name="role">
                <option value="employee">Employee</option>
                <option value="manager">Manager</option>
            </select>

            <input type="submit" name="register" value="Đăng ký" class="form-submit">
            <p>Quay lại đăng nhập <a style="color:aqua" href="login.php">tại đây</a></p>
        </form>
    </div>
</body>

</html>