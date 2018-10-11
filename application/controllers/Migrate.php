<?php
/**
 * Created by PhpStorm.
 * User: lonelygod
 * Date: 2018/10/10
 * Time: 下午 9:03
 */

class Migrate extends CI_Controller
{
    public function up()
    {
        $this->load->library('migration');

        if ($this->migration->current() === FALSE)
        {
            show_error($this->migration->error_string());
        }
    }

    public function drop()
    {
        $this->load->library('migration');
        $this->dbforge->drop_table('user');
    }
}