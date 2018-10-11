<?php
/**
 * Created by PhpStorm.
 * User: lonelygod
 * Date: 2018/10/11
 * Time: 下午 9:55
 */

class ApiAuthHook
{
    // CI instance
    private $CI;
    private $route;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->route = '/^api/i';
    }

    public function index()
    {
        $this->CI->load->helper('url');

        if (preg_match($this->route, uri_string())) {
            $header = $this->CI->input->request_headers();

            if (array_key_exists('token', $header)) {
                $token = Authorization::validateToken($header['token']);
            } else {
                show_error('thie request lacks the authorization token');
            }
        }
    }
}