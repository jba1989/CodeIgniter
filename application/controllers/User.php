<?php
/**
 * Created by PhpStorm.
 * User: lonelygod
 * Date: 2018/10/10
 * Time: 下午 8:49
 */

class User extends CI_Controller
{

    public function userInfo($userName)
    {
        $this->db->query("SELECT * FROM `user` WHERE `userName` = $userName");
    }

    public function login()
    {
        $request = $this->input->post();
        if ($request != null) {
            $this->load->database();
            $query = 'SELECT * FROM `user` WHERE `userName` = ? AND `userPassword` = ?';
            $result = $this->db->query($query, array($request['userName'], md5($request['userPassword'])));
            if (count($result) > 0) {
                $token = Authorization::generateToken($result);
                echo $token;
            } else {
                echo 'No this account';
            }
        } else {
            $this->load->view('user/login');
        }
    }

    public function register()
    {
//        $this->load->database();
//        $this->db->query("SELECT * FROM `user` WHERE `userName` = $userName");

        $request = $this->input->post();
        if ($request != null) {
            $this->load->database();
            $query = 'SELECT * FROM `user` WHERE `userName` = ? AND `userPassword` = ?';
            $result = $this->db->query($query, array($request['userName'], md5($request['userPassword'])));

            if (count($result) > 0) {
                $query = 'INSERT `user` (`userName`, `userPassword`) VALUES (?, ?)';
                $this->db->query($query, array($request['userName'], md5($request['userPassword'])));
                $this->load->view('user/register');
                $token = Authorization::generateToken($result);
                echo 'Success';
                return $token;
            } else {
                echo 'This account is already exist';
            }
        }
        $this->load->view('user/register');

    }

}