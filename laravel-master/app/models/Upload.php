<?php

namespace App\models;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;
use think\Exception;

class Upload extends Model
{
    /**
     * 分类图片目录
     */
    const CATALOG_CATEGORY = '/media/category/';
    /**
     * 产品图片目录
     */
    const CATALOG_PRODUCT = '/media/product/';
    /**
     * Ckeditor 编辑器上传图片存放目录
     */
    const CATALOG_CKEDITOR = '/media/cke/';
    /**
     * 广告图片目录
     */
    const MEDIA_BANNER = '/media/banner/';

    /**
     * 上传文件到指定目录
     * @var string
     */
    protected $path_string = '';
    protected $file_string = '';

    /**
     * 设置参数址
     * @param $dir_name
     * @return $this
     */
    public function setPathString($dir_name)
    {
        $this->path_string = $dir_name;
        return $this;
    }

    /**
     * 返回URL地址
     * @return string
     */
    public function toUrl(){
        return url()->current() . $this->path_string . $this->file_string;
    }
    /**
     * 上传文件
     * @param $image
     * @throws Exception
     */
    public function uploadFile($image){
        $rules = array(
            'image' => 'required|mimes:png,gif,jpeg,jpg|max:20000'
        );
        $validator = \Validator::make(array('image'=> $image), $rules);
        if (! $validator->passes()){
            throw new Exception('图片上传失败');
        }
        $extension = $image->getClientOriginalExtension();
        $filename = uniqid() . '.' . $extension;
        $pathString = ($this->path_string == '') ? (self::CATALOG_PRODUCT) : $this->path_string;
        $path = public_path() . $pathString;
        //Move file into uploads folder
        $image->move($path, $filename);
        return $pathString . $filename;
    }
    /**
     * 上传产品图片
     * @param Request $request
     * @param $name
     * @return string
     * @throws Exception
     */
    public function uploadForProduct(Request $request, $name){
        $images = $request->file($name);
        if(!$images){
            return '';
        }
        return $this->uploadFile($images);
    }

    /**
     * 上传 ckeditor 的图片
     * @param Request $request
     * @param $name
     * @return string
     */
    public function uploadForCkeditor(Request $request, $name){
        $images = $request->file($name);
        if(!$images){
            return '';
        }
        return $this->uploadFile($images);
    }

    /**
     * 上传广告图片
     * @param Request $request
     * @param $name
     * @return string
     */
    public function uploadForBanner(Request $request, $name){
        $images = $request->file($name);
        if(!$images){
            return '';
        }
        return $this->uploadFile($images);
    }


    /**
     * 这个网络抄的
     * Store a newly created resource in storage.
     * https://github.com/Andy99/Laravel-5-Upload-files/blob/master/app/Http/Controllers/UploadController.php
     * @return Response
     */
    public function store(Request $request)
    {
        $images = $request->file('images');
        foreach ($images as $image)
        {
            $rules = array(
                'image' => 'required|mimes:png,gif,jpeg,jpg|max:20000'
            );
            $validator = \Validator::make(array('image'=> $image), $rules);
            if (! $validator->passes())
            {
                return redirect()->back()->withErrors($validator);
            }
            $extension = $image->getClientOriginalExtension();
            $filename = uniqid() . '.' . $extension;
            $path = public_path() . '/uploads';
            //Move file into uploads folder
            $image->move($path, $filename);
            //Insert file name in db
            $image = Upload::create([
                'picture_name'		=> $filename,
            ]);
        }
        \Session::flash('success_message', 'Well done, images uploaded successfully.');
        return redirect()->back();
    }
}
