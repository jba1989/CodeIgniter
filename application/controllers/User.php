<?php
/**
 * Created by PhpStorm.
 * User: lonelygod
 * Date: 2018/10/10
 * Time: 下午 8:49
 */

class User extends CI_Controller
{
    public function userInfo($userName) {
        $this->load->database();
        $this->db->query("SELECT * FROM `user` WHERE `userName` = $userName");
    }

    public function register() {
//        $this->load->database();
//        $this->db->query("SELECT * FROM `user` WHERE `userName` = $userName");

        $request = $this->input->post();
        if ($request != null) {
//            $userName = $request['userName'];
//            $userPassword = $request['userName'];
//            $userName = $request['userName'];
            $this->load->model('user');
            $this->db->insert('user', $request);
        }

        $this->load->view('user/register');

    }

}