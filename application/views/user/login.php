<?php

/**
 * Created by PhpStorm.
 * User: lonelygod
 * Date: 2018/10/10
 * Time: 下午 9:23
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<body>
<form id="login" method="post" action="">
    <table>
        <caption>login</caption>
            <tr>
                <td class=left>帳　　號:</td>
                <td class=center><input type="text" pattern= "[a-zA-z0-9_]*" required minlength="3" maxlength="30" name="userName" placeholder="3~30個英文或數字"/></td>
                <td class=right><img class=mark_1 src="" /></td>

            </tr>
            <tr>
                <td class=left>密　　碼:</td>
                <td class=center><input type="text" pattern= "[a-zA-z0-9]*" required minlength="5" maxlength="30" name="userPassword" placeholder="5~30個英文或數字"></td>
                <td class=right></td>
            </tr>
    </table>
    <input type="submit" name="login"/>
    <input type="reset" name="reset"/>
    <input type="button" name="homepage" value="返回首頁" onclick="javascript:location.href='index.php'"/>
</form>
<body>