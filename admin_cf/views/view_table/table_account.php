<div class="wrapper_account">
    <div class="form_account">
        <div class="form_account-heading">
            <form action="" method="post">
                <input style="padding:12px 80px 12px 12px" type="text" name="name" placeholder="Tên người dùng">
                <input style="padding:12px; width:88px;" type="submit" name="search_user" value="Tìm">
            </form>
            <h1><i class="fa-solid fa-people-group"></i>&nbsp; Account</h1>
            <a href="views/view_account/register.php">Đăng ký tài khoản</a>
        </div>

        <div class="form_account-body">
            <table border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <th style="width:4%">ID</th>
                    <th style="width:12%">Tên người dùng</th>
                    <th style="width:17%">Email (account đăng nhập)</th>
                    <th style="width:32%">Mật khẩu</th>
                    <th style="width:10%">Chức vụ</th>
                    <th style="width:10%">Tùy chỉnh</th>
                </tr>

                <?php
                // Search user by name
                if (isset($_POST['search_user'])) {
                    $name = $_POST['name'];
                    User::searchUser($name);
                }
                // show list account user
                User::showUsers();
                ?>

            </table>
        </div>
    </div>

</div>