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
<head>
    <style>
        .right {
            color:red;
        }

        table {
            margin:auto;
            padding-top:2em;

        }

        .button {
            float: right;
        }

        caption {
            font-size:28px;
        }
    </style>
</head>
<body>

<form id="login" method="post" action="">
    <table>
        <caption>{title}</caption>
            <tr>
                <td class=left>帳　　號:</td>
                <td class=center><input type="text" pattern= "[a-zA-z0-9_]*" required minlength="3" maxlength="30" name="userName" placeholder="3~30個英文或數字"/></td>
                <td class=right><?php echo form_error('userName'); ?></td>
            </tr>
            <tr>
                <td class=left>密　　碼:</td>
                <td class=center><input type="text" pattern= "[a-zA-z0-9]*" required minlength="5" maxlength="30" name="userPassword" placeholder="5~30個英文或數字"></td>
                <td class=right><?php echo form_error('userPassword'); ?></td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="reset" class="button" name="reset"/>
                    <input type="submit" class="button" name="login"/>
                </td>
            </tr>
    </table>

</form>
<body>