<?php
class User
{
    // login account user function
    public static function login($email, $password)
    {
        $email = DB::connect()->real_escape_string($email);
        $password = md5($password);

        $sql = "SELECT * FROM `user` WHERE `email` = '$email' && `password` = '$password'";
        $result = DB::connect()->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if ($row['role'] == 'manager') {

                $_SESSION['admin_name'] = $row['user_name'];
                $_SESSION['role'] = $row['role'];
                header('Location:http://localhost/coffee_shop/admin_cf/?table=order');

            } elseif ($row['role'] == 'employee') {

                $_SESSION['admin_name'] = $row['user_name'];
                $_SESSION['role'] = $row['role'];
                header('Location:http://localhost/coffee_shop/admin_cf/?table=order');

            }
        } else {
            return 'Email hoặc mật khẩu không chính xác!';
        }
    }

    // register account user function
    public static function register($name, $email, $password, $cpassword, $role)
    {
        $name = DB::connect()->real_escape_string($name);
        $email = DB::connect()->real_escape_string($email);
        $password = md5($password);
        $cpassword = md5($cpassword);
        $role = $_POST['role'];

        $sql = "SELECT * FROM `user` WHERE `email` = '$email'";
        $result = DB::connect()->query($sql);

        if ($result->num_rows > 0) {
            $error[] = 'Tài khoản đã tồn tại!';
        } else {
            if ($password !== $cpassword) {
                return 'Mật khẩu xác thực không khớp!';
            } else {
                $insert = "INSERT INTO `user`(`user_name`, `email`, `password`, `role`) VALUES ('$name', '$email', '$password', '$role')";
                DB::connect()->query($insert);
                header('Location:login.php');
            }
        }
    }

    // delete account user function
    public static function deleteUser($id)
    {
        $id = DB::connect()->real_escape_string($id);

        $sql = "DELETE FROM `user` WHERE `user_id`=$id";

        if (DB::connect()->query($sql) === TRUE) {
            header('Location:http://localhost/coffee_shop/admin_cf/?table=account');
        } else {
            die("Connection failed: " . DB::connect()->connect_error);
        }
    }

    // search account user by user
    public static function searchUser($name)
    {
        if (empty($name)) {
            echo '<td colspan="6"><h1>Bạn chưa nhập tên người dùng!</h1></td>';
            die();
        } else {
            $result = DB::connect()->query("SELECT * FROM `user` WHERE `user_name`='$name';");

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['user_id'];
                    $name = $row['user_name'];
                    $email = $row['email'];
                    $password = $row['password'];
                    $role = $row['role'];

                    include dir_admin . '/views/view_user/user_search.php';
                }
                die();
            }
        }
    }

    // show list account user
    public static function showUsers()
    {
        $result = DB::connect()->query("SELECT * FROM user;");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['user_id'];
                $name = $row['user_name'];
                $email = $row['email'];
                $password = $row['password'];
                $role = $row['role'];

                include dir_admin . '/views/view_user/user_show.php';
            }
        }
    }
}
