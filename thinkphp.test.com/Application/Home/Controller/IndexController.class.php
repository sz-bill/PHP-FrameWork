<?php
namespace Home\Controller;

use Think\Controller;
use Think\Model;

class IndexController extends Controller
{
    public function index()
    {
        $name = 'ThinkPHP,   由控制器自定义的变量， 通过 $this->assign(key, value) 的方式传递';
        $bof = '>>>>>>>>>>>>>$bof $bof$bof$bof$bof<<<<<<<<<<<<<<<<';
        $eof = '>>>>>>>>>>>>>>>>>>>>>eeeeeeeeeeeeeeeeeeeeeEEEEEEEEEEEEEEEEEEEEE<<<<<<<<<<<<<<<<';

        $this->assign('bof',$bof)
             ->assign('eof',$eof)
             ->assign('name',$name)
             ->assign('title',$name);

        $this->display();
    }
}