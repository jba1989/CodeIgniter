<?php
/**
 * Created by PhpStorm.
 * User: lonelygod
 * Date: 2018/10/10
 * Time: 下午 8:49
 */

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', '', TRUE);
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('parser');
    }

    public function login()
    {
        if (isset($_SESSION['token'])) {
            redirect('/');
        }

        $request = $this->input->post();

        if ($request != null) {

            // 驗證post資料
            $this->form_validation->set_rules('userName', '帳號', 'required|min_length[3]|max_length[30]|alpha_numeric');
            $this->form_validation->set_rules('userPassword', '密碼', 'required|min_length[5]|max_length[30]|alpha_numeric');

            $this->form_validation->set_message('min_length', '{field}最少需要{param}個字');
            $this->form_validation->set_message('max_length', '{field}最長{param}個字');
            $this->form_validation->set_message('required', '{field}為必填欄位');
            $this->form_validation->set_message('alpha_numeric', '{field}不可輸入特殊字元');
            $this->form_validation->set_message('is_unique', '{field}已被使用');

            if ($this->form_validation->run() == FALSE)
            {
                return $this->parser->parse('user/user', array('title' => '登錄'));
            }

            // 比對資料庫
            $result = $this->user_model->getUser($request['userName']);

            if ($result == null) {
                echo '查無此帳號';
            } else if ($result->userPassword == md5($request['userPassword'])) {
                $token = AuthToken::generateToken(array($result->id, $result->userName));
                $this->session->set_tempdata('token', $token, 600);
                $response = json_encode(array(
                    'status' => 'success',
                    'token' => $token
                ));
                return $response;
            } else {
                echo '密碼錯誤';
            }
        } else {
            $this->parser->parse('user/user', array('title' => '登錄'));
        }
    }

    public function register()
    {
        if (isset($_SESSION['token'])) {
            redirect('/');
        }

        $request = $this->input->post();

        if ($request != null) {
            $this->form_validation->set_rules('userName', '帳號', 'required|is_unique[user.userName]|min_length[3]|max_length[30]|alpha_numeric');
            $this->form_validation->set_rules('userPassword', '密碼', 'required|min_length[5]|max_length[30]|alpha_numeric');

            $this->form_validation->set_message('min_length', '{field}最少需要{param}個字');
            $this->form_validation->set_message('max_length', '{field}最長{param}個字');
            $this->form_validation->set_message('required', '{field}為必填欄位');
            $this->form_validation->set_message('alpha_numeric', '{field}不可輸入特殊字元');
            $this->form_validation->set_message('is_unique', '{field}已被使用');

            if ($this->form_validation->run() == FALSE)
            {
                return $this->parser->parse('user/user', array('title' => '註冊'));
            }

            // 比對資料庫
            $result = $this->user_model->getUser($request['userName']);

            if ($result == null) {
                $id = $this->user_model->insert($request['userName'], md5($request['userPassword']));
                $token = AuthToken::generateToken(array($id, $request['userName']));
                $this->session->set_tempdata('token', $token, 600);
                $response = json_encode(array(
                    'status' => 'success',
                    'token' => $token
                ));
                return $response;
            } else {
                echo '帳號 已被使用';
            }
        }
        $this->parser->parse('user/user', array('title' => '註冊'));
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/user/login');
    }
}