<?php
//学习资料 http://www.cnblogs.com/evai/p/6085437.html
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        后台的每个控制器都必须加这一行才会验证登录
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * 欢迎页面
     * @author Neo.Huang
     * @date 20170404
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function welcome(){
        return view('admin.welcome');
    }
}
