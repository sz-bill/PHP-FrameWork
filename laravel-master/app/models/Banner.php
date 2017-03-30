<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //表名
    protected $table = 'banner';

    //指定主键
    protected $primaryKey = 'id';

    const NAV_HOME = 'home';
    const NAV_CATALOG = 'catalog';
    const NAV_TECHNICAL_SOLUTION = 'technical-solution';
    const NAV_NEWS = 'news';
    const NAV_HR = 'HR';
    const NAV_CUSTOMER_SERVICES = 'customer-services';
    const NAV_ABOUT = 'about';
    const NAV_CONTACTS = 'contacts';
    protected $pageCode = [
        self::NAV_HOME => '首页',
        self::NAV_CATALOG => '产品展示中心',
        self::NAV_TECHNICAL_SOLUTION => '技术解决方案',
        self::NAV_NEWS => '新闻资讯',
        self::NAV_HR => '人才招聘',
        self::NAV_CUSTOMER_SERVICES => '客服服务',
        self::NAV_ABOUT => '关于我们',
        self::NAV_CONTACTS => '联系我们',
    ];

    const TYPE_G1 = 'g1';
    const TYPE_G2 = 'g2';
    const TYPE_G3 = 'g3';
    const TYPE_G4 = 'g4';
    const TYPE_G5 = 'g5';
    const TYPE_G6 = 'g6';
    const TYPE_G7 = 'g7';
    const TYPE_G8 = 'g8';
    const TYPE_G9 = 'g9';
    protected $type = [
        self::TYPE_G1 => 'G1',
        self::TYPE_G2 => 'G2',
        self::TYPE_G3 => 'G3',
        self::TYPE_G4 => 'G4',
        self::TYPE_G5 => 'G5',
        self::TYPE_G6 => 'G6',
        self::TYPE_G7 => 'G7',
        self::TYPE_G8 => 'G8',
        self::TYPE_G9 => 'G9',
    ];
    public function getPageCode(){
        return $this->pageCode;
    }
    public function getType(){
        return $this->type;
    }


}
