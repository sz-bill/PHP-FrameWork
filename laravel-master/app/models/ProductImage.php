<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //表名
    protected $table = 'product_image';

    //指定主键
    protected $primaryKey = 'id';

    protected $fileName = '';

    /**
     * 设置文件名
     * @param string $fileName
     * @return $this
     */
    public function setFileName($fileName = ''){
        $this->fileName = $fileName;
        return $this;
    }
    /**
     * 数据
     * @param int $is_default
     * @param int $sort
     * @return array
     */
    public function imagesToArray($is_default = 0, $sort = 0){
        $data =[
            'source_image' => $this->fileName,
            'base_image' => $this->fileName,
            'small_image' => $this->fileName,
            'thumbnail_image' => $this->fileName,
            'is_default' => $is_default,
            'sort' => $sort,
        ] ;
        return $data;
    }
}
