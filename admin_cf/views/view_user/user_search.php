<?php
echo '
<tr>
    <td>' . $id . '</td>
    <td>' . $name . '</td>
    <td style="text-align: left">' . $email . '</td>
    <td style="text-align: left">' . $password . '</td>
    <td>' . $role . '</td>
    <td>
        <a onclick="return confirm(\'Bạn muốn xóa ' . $email . '?\');" href="index.php?deleteiduser=' . $name . '"><input type="submit" style="color: red ;width: 80px; height:28px; margin-bottom:5px" name="delete_user" value="Xóa"></a>
    </td>
</tr>
<a href="http://localhost/coffee_shop/admin_cf/?table=account"><i class="fa-solid fa-house" style="font-size: 30px; margin: 10px 0 10px 0"></i></a>
';