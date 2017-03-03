<?php
/**
 * Created by PhpStorm.
 * User: Liberty
 * Date: 2015/8/27
 * Time: 23:46
 */

namespace Home\Controller;


use Think\Controller;

class EmptyController extends Controller
{
    public function _empty(){
        header("HTTP/1.0 404 Not Found");
        $this->display('Empty/index');
    }
    public function index(){
        header("HTTP/1.0 404 Not Found");
        $this->display('Empty/index');
    }
}