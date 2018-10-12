<?php
/**
 * Created by PhpStorm.
 * User: lonelygod
 * Date: 2018/10/11
 * Time: 下午 7:49
 */

class AuthToken
{
    public static function checkSessionToken($token)
    {
        return ($token == $_SESSION['token'] ? TRUE : FALSE);
    }

    public static function generateToken($data)
    {
        $key = 'thisiskey';
        $encodeStr = http_build_query($data);
        $encodeStr .= $key . time();

        return md5($encodeStr);
    }
}