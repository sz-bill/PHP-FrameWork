<?php

namespace App\Http\Controllers\Admin;

use App\models\Banner;
use App\models\Upload;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class BannerController extends Controller
{
    public function __construct()
    {
        //        后台的每个控制器都必须加这一行才会验证登录
        $this->middleware('admin');
    }
    protected function getBanner(){
        return new Banner();
    }
    protected function getUpload(){
        return new Upload();
    }
    public function index(){
        return view('admin.banner.index');
        $collection = $this->getBanner()->orderBy('page_code')->get();

        $pageCode = $this->getBanner()->getPageCode();
        $typeGroup= $this->getBanner()->getType();
        return view('admin.banner.index',['page_code' => $pageCode, 'type' => $typeGroup, 'collection' => $collection]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|\think\response\Redirect|\think\response\View
     */
    public function add(Request $request){
        if ($request->isMethod('post')) {
            $imageFile = '';
            try{
                $imageFile = $this->getUpload()->setPathString(Upload::MEDIA_BANNER)->uploadForProduct($request, 'image');
            }catch (Exception $e){
                throw new Exception('图片上传失败');
            }

            $form = $request->input();
            unset($form['_token']);
            $rowData = $form;
            $rowData['created_at'] = date("Y-m-d H:i:s");
            $rowData['updated_at'] = date("Y-m-d H:i:s");
            try{
                $rowData['image'] = $imageFile;
                $rowID = $this->getBanner()->insert($rowData);
            }catch (Exception $e){
                return redirect()->back()->with('message', '保存失败');
            }
            return redirect('admin/bannerManager');
        }
        $pageCode = $this->getBanner()->getPageCode();
        $typeGroup= $this->getBanner()->getType();
        return view('admin.banner.add', ['page_code' => $pageCode, 'type' => $typeGroup]);
    }

    /**
     * 编辑广告图片
     */
    public function edit(Request $request){
        $id = $request->get('id', 'int');
        $banner = $this->getBanner()->where(['id' => $id])->first();
        $pageCode = $this->getBanner()->getPageCode();
        $typeGroup= $this->getBanner()->getType();
        return view('admin.banner.edit',['page_code' => $pageCode, 'type' => $typeGroup, 'banner' => $banner]);
    }

    public function postEdit(Request $request){
        $banner_id = $request->get('id', 'int');
        if ($request->isMethod('post')) {
            $form = $request->input();
            unset($form['_token']);
            $rowData = $form;

            $rowData['created_at'] = date("Y-m-d H:i:s");
            $rowData['updated_at'] = date("Y-m-d H:i:s");
            try{
                $rowID = $this->getBanner()->where(['id' => $banner_id])->update($rowData);
            }catch (Exception $e){
                return redirect()->back()->with('message', '保存失败');
            }
            return redirect()->back()->with('message', '保存成功');
        }
        return redirect()->back()->with('message', '非法提交');
    }
}
