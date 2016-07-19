<?php
namespace Hello\Controller;

use Think\Controller;
use Think\Model;

class IndexController extends Controller
{
    public function index()
    {
        $name = 'ThinkPHP,   由控制器自定义的变量， 通过 $this->assign(key, value) 的方式传递';
        $bof = '>>>>>>>>>>>>>$bof $bof$bof$bof$bof<<<<<<<<<<<<<<<<';
        $eof = '>>>>>>>>>>>>>>>>>>>>>eeeeeeeeeeeeeeeeeeeeeEEEEEEEEEEEEEEEEEEEEE<<<<<<<<<<<<<<<<';

        $this->assign('bof',$bof);
        $this->assign('eof',$eof);
        $this->assign('name',$name);

        $this->display();
    }
    public function index_bak()
    {
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} '
        .'h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> '
        .'<h1>:)</h1><p>案例程序文件 [Application/Hello]  </p><br/>版本 V{$Think.version}</div> ','utf-8');
    }
    Public function add() {
        layout(true);
         $this->display('add');
     }
}