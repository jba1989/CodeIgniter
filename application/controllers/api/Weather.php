<?php
/**
 * Created by PhpStorm.
 * User: lonelygod
 * Date: 2018/10/11
 * Time: 下午 10:08
 */

class weather extends CI_Controller
{
    public function index()
    {
        $url = 'https://tinyurl.com/y7y54gms';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,  CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        $result = curl_exec($ch);

        curl_close($ch);

        $resultArr = json_decode($result, TRUE);
        $this->load->view('weather/weather', array('data' => $resultArr['records']['location']));
    }
}