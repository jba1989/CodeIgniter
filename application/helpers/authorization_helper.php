<?php
/**
 * Created by PhpStorm.
 * User: lonelygod
 * Date: 2018/10/11
 * Time: 下午 7:49
 */

require_once APPPATH . 'libraries/JWT.php';

use \Firebase\JWT\JWT;

class Authorization
{
    public static function validateToken($token)
    {
        $CI = &get_instance();
        $key = $CI->config->item('jwt_key');
        $algorithm = $CI->config->item('jwt_algorithm');
        return JWT::decode($token, $key, array($algorithm));
    }

    public static function generateToken($data)
    {
        $CI = &get_instance();
        $key = $CI->config->item('jwt_key');
        return JWT::encode($data, $key);
    }
}