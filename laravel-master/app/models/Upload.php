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
        $path = public_path() . self::CATALOG_PRODUCT;
        //Move file into uploads folder
        $image->move($path, $filename);
        return self::CATALOG_PRODUCT . $filename;
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
