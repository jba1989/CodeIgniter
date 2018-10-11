<?php
/**
 * Created by PhpStorm.
 * User: lonelygod
 * Date: 2018/10/11
 * Time: 下午 7:39
 */

defined('BASEPATH') OR exit('No direct script access allowed');

$config['jwt_key'] = md5('mycijwtkey');

$config['jwt_algorithm'] = 'HS256';