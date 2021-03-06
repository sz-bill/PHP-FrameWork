<?php

namespace App\Http\Controllers\Admin;

use App\models\Category;
use App\models\Common;
use App\models\Product;
use App\models\ProductImage;
use App\models\Upload;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function __construct()
    {
        //        后台的每个控制器都必须加这一行才会验证登录
        $this->middleware('admin');
    }
    protected function getCategory(){
        return new Category();
    }
    protected function getProduct(){
        return new Product();
    }
    protected function getProductImage(){
        return new ProductImage();
    }
    protected function getUpload(){
        return new Upload();
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
        $collection = $this ->getProduct()
                            ->select(['product.*', 'pi.source_image', 'pi.base_image', 'pi.small_image', 'pi.thumbnail_image'])
                            ->join('product_image as pi', 'pi.sku', '=', 'product.sku')
                            ->where(['status' => 1])
                            ->orderBy('product.id', 'desc')
                            ->groupBy('product.sku')
                            ->get();
//        print_r($collection->first()->toSql());die;
//        print_r($collection->first()->toArray());die;

        return view('admin.product.index',['collection' => $collection]);
    }

    /**
     * 添加产品
     */
    public function add(Request $request){
        if ($request->isMethod('post')) {
            $form = $request->input();
            $category_id = $form['category_id'];
            $mixStr = substr(strrev(uniqid()), 1, 5);
            $form['sku'] = $form['sku'] . '.' . $mixStr;
            $sku = $form['sku'];
            unset($form['_token']);
            unset($form['category_id']);
            $rowData = $form;
            $rowData['created_at'] = date("Y-m-d H:i:s");
            $rowData['updated_at'] = date("Y-m-d H:i:s");
            try{
                $rowID = $this->getProduct()->insert($rowData);
//                $product = $this->getProduct()->where(['sku' => $sku])->get()->first()->id;
            }catch (Exception $e){
                return redirect()->back()->with('message', '保存失败');
            }

            $imageFile = '';
            try{
                $imageFile = $this->getUpload()->uploadForProduct($request, 'image');
            }catch (Exception $e){}

            $images = $this->getProductImage()->setFileName($imageFile)->imagesToArray(0, 0);
            try{
                $rowID = $this->getProduct()->saveBySku($sku, $category_id, $images);
            }catch (Exception $e){
                return redirect()->back()->with('message', '图片保存失败');
            }

            return redirect('admin/product');
        }
        $short_description = Common::ckeditor('short_description');
        $description = Common::ckeditor('description');
        return view('admin.product.add',['ckeditor' => ['short_description' => $short_description, 'description' => $description]]);
    }

    /**
     * 编辑产品
     */
    public function edit(Request $request){
        $id = $request->get('id', 'int');
        $product = $this->getProduct()->where(['id' => $id])->first();
        return view('admin.product.edit',['product' => $product]);
    }

    public function postEdit(Request $request){
        $product_id = $request->get('id', 'int');
        if ($request->isMethod('post')) {
            $form = $request->input();
            $category_id = $form['category_id'];
            $sku = $form['sku'];
            unset($form['_token']);
            unset($form['category_id']);
            $rowData = $form;
//            print_r(get_class_methods($this->getProduct()));die;
            $rowData['created_at'] = date("Y-m-d H:i:s");
            $rowData['updated_at'] = date("Y-m-d H:i:s");
            try{
                $rowID = $this->getProduct()->where(['id' => $product_id])->update($rowData);
            }catch (Exception $e){
                return redirect()->back()->with('message', '保存失败');
            }


            return redirect()->back()->with('message', '保存成功');
        }
        return redirect()->back()->with('message', '非法提交');
    }

    /**
     * 删除产品
     */
    public function del(Request $request){}

    /**
     * 编辑器上传图片
     * @param Request $request
     */
    public function uploadImage(Request $request){
        $imageFile = '';
        try{
            $imageFile = $this->getUpload()->setPathString(Upload::CATALOG_CKEDITOR)
                                           ->uploadForCkeditor($request, 'upload');
            $imageFile = url($imageFile);
        }catch (Exception $e){
            print_r($e->getMessage());
        }

//        修改 ckeditor.js 文件 的内容为   [b._token='2tgQThlQWrNBvCBsy7hvSnvAgnxwD8V6u4L3KNNc']
        $_token = '2tgQThlQWrNBvCBsy7hvSnvAgnxwD8V6u4L3KNNc';
        if($imageFile == ''){
            return '<script>window.parent.uploadImageToken.vid="服务器出错，请联系站长。";window.parent.uploadImageToken.error()</script>';
        }
        return '<script>window.parent.uploadImageToken.vid="'.$imageFile.'";window.parent.uploadImageToken.token()</script>';
        return '<script>window.parent.uploadImageToken.token("xxxxxxxxxxxx");</script>';
    }
}
