<?php
/**
 * Created by PhpStorm.
 * User: Liberty
 * Date: 2015/8/28
 * Time: 0:27
 */

namespace Home\Controller;


use Think\Controller;

class CommonController extends Controller{
    public function _empty(){
        header("HTTP/1.0 404 Not Found");
        $this->display('Empty/index');
    }
}