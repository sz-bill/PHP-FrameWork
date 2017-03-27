<?php

namespace App\Http\Controllers\Admin;

use App\models\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use think\Exception;

class CategoryController extends Controller
{
    private $catalog;
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => 'logout']);
        $this->init();
    }
    protected function init(){
        if(!$this->catalog){
            $this->catalog = $this->getCategory();
        }
    }
    protected function getCategory(){
        return new Category();
    }
    //分类列表
    public function index(){
        $collection = $this->getCategory()->where(['status' => 1])->get();
        return view('admin.catalog.index',['collection' => $collection]);
    }

    /**
     * 添加分类
     */
    public function add(Request $request){
        if ($request->isMethod('post')) {
            $form = $request->input();
            unset($form['_token']);
            $rowData = $form;
            $rowData['created_at'] = date("Y-m-d H:i:s");
            $rowData['updated_at'] = date("Y-m-d H:i:s");
            try{
                $rowID = $this->getCategory()->insert($rowData);
            }catch (Exception $e){
                return redirect()->back()->with('message', '保存失败');
            }
            return redirect('admin/category');
        }
        return view('admin.catalog.add');
    }

    /**
     * 编辑分类
     */
    public function edit(){}

    /**
     * 删除分类
     */
    public function del(){}
}
