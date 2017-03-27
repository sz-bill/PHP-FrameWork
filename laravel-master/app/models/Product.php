<?php

namespace App\models;

use App\models\Category;
use App\models\CategoryProduct;
use App\models\ProductImage;

use Illuminate\Database\Eloquent\Model;
use think\Exception;

class Product extends Model
{
    //表名
    protected $table = 'product';

    //指定主键
    protected $primaryKey = 'id';


    public function getCagetoryProduct(){
        return new CategoryProduct();
    }
    public function getProductImage(){
        return new ProductImage();
    }

    public function saveBySku($sku, $category_id = 0, $images = []){
        $product = $this->where(['sku' => $sku])->get()->first();
        if(empty($product)){
            throw new Exception("无此产品");
        }
        $product_id = $product->id;
        $data =[
            'category_id' => $category_id,
            'product_id' => $product_id
        ] ;
        $categoryProduct = $this->getCagetoryProduct()->insert($data);

        $data = $images;
        $data['sku'] = $sku;
        $productImage = $this->getProductImage()->insert($data);
    }
}
