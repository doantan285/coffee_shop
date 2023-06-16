<?php
echo '
<tr>
    <td>' . $id . '</td>
    <td>' . $name . '</td>
    <td style="text-align: left">' . $email . '</td>
    <td style="text-align: left">' . $password . '</td>
    <td>' . $role . '</td>
    <td>
        <a onclick="return confirm(\'Bạn muốn xóa tài khoản ' . $email . '?\');" href="index.php?deleteiduser=' . $id . '"><input type="submit" style="color: red ;width: 80px; height:28px; margin-bottom:5px" name="delete_user" value="Xóa"></a>
    </td>
</tr>';