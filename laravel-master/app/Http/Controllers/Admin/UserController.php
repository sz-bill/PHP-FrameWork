<?php

namespace App\Http\Controllers\Admin;

use App\models\Category;
use App\models\Product;
use App\models\ProductImage;
use App\models\Upload;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        //        后台的每个控制器都必须加这一行才会验证登录
        $this->middleware('admin');
    }
    protected function getUser(){
        return new User();
    }
    protected function getSql($collection){
        return $collection->first()->toSql();
    }

    /**
     * 产品列表
     * $product = Product::where([])->orderBy('created_at','desc')->skip($pos)->take($limit)->get();
     *
     * http://www.jb51.net/article/54713.htm
     *
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function index(){
        $collection = $this ->getUser()
                            ->select('*')
                            ->where(['status' => 1])
                            ->orderBy('id', 'desc')
                            ->get();

        return view('admin.user.index',['collection' => $collection]);
    }

    /**
     * 添加会员
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(){
        return view('admin.user.add');
    }
}
