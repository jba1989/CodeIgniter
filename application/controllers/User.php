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
    }

    public function login()
    {
        $request = $this->input->post();

        if ($request != null) {
            $result = $this->user_model->getUser($request['userName']);
            if ($result == null) {
                echo 'No this account';
            } else if ($result->userPassword == md5($request['userPassword'])) {
                $token = Authorization::generateToken(array($result->id, $result->userName));
                $this->session->set_tempdata('token', $token, 600);
                echo $token;

                return $token;
            } else {
                echo 'Wrong password';
            }
        } else {
            $this->load->view('user/login');
        }
    }

    public function register()
    {
        $request = $this->input->post();

        if ($request != null) {
            $result = $this->user_model->getUser($request['userName']);

            if ($result == null) {
                $id = $this->user_model->insert($request['userName'], md5($request['userPassword']));
                $token = Authorization::generateToken(array($id, $request['userName']));
                $this->session->set_tempdata('token', $token, 600);
                echo $token;

                return $token;
            } else {
                echo 'This account is already exist';
            }
        }
        $this->load->view('user/register');

    }


    public function logout()
    {
        $this->session->sess_destroy();
    }
}