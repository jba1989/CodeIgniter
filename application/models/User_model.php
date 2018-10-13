<?php
/**
 * Created by PhpStorm.
 * User: lonelygod
 * Date: 2018/10/11
 * Time: 下午 10:20
 */

class User_model  extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUser($userName)
    {
        $query = 'SELECT * FROM `user` WHERE `userName` = ? LIMIT 1';
        $result = $this->db->query($query, $userName);
        $data = $result->row();

        return $data;
    }

    public function insert($userName, $userPassword)
    {
        $result = $this->db->insert('user', array('userName' => $userName, 'userPassword' => $userPassword));
        if ($result == 0) {
            log_message('error', "userName:$userName could not insert into database");
        }

        $id =  $this->db->insert_id();

        return $id;
    }
}