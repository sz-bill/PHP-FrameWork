<?php
namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //表名
    protected $table = 'category';

    //指定主键
    protected $primaryKey = 'id';
}
