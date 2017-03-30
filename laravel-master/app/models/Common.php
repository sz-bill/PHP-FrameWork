<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Common extends Model
{
//    变量 pageCode
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
    public function getPageCode($key = ''){
        if($key == ''){
            return $this->pageCode;
        }
        return $this->pageCode[$key];
    }

//    变量 status
    const STATUS_ENABLE = '1';
    const STATUS_DISABLE = '0';
    public function getStatus($key = ''){
        if($key == ''){
            return [self::STATUS_ENABLE => '启用',self::STATUS_DISABLE => '禁用'];
        }
        return ($key == self::STATUS_ENABLE) ? '启用' : '禁用';
    }

//    变量  visibility
    const VISIBILITY_ENABLE = '1';
    const VISIBILITY_DISABLE = '0';
    public function getVisibility($key = ''){
        if($key == ''){
            return [self::STATUS_ENABLE => '可示',self::STATUS_DISABLE => '隐藏'];
        }
        return ($key == self::STATUS_ENABLE) ? '可示' : '隐藏';
    }

//    变量 rowColumn
    const ROW1_COLUMN1 = 'r1-c1';
    const ROW1_COLUMN2 = 'r1-c2';
    const ROW1_COLUMN3 = 'r1-c3';
    const ROW1_COLUMN4 = 'r1-c4';
    protected $rowColumn = [
        self::ROW1_COLUMN1 => '一行一栏',
        self::ROW1_COLUMN2 => '一行二栏',
        self::ROW1_COLUMN3 => '一行三栏',
        self::ROW1_COLUMN4 => '一行四栏',
    ];
    public function getRowColumn($key = ''){
        if($key == ''){
            return $this->rowColumn;
        }
        return $this->rowColumn[$key];
    }

//    变量 ckeditor
    const CKEDITOR_JAVASCRIPT = '<script type="text/javascript">CKEDITOR.replace("%s",editorConfig);</script>';
    public static function ckeditor($formFieldName = 'ckeditor'){
        $ckeditor = sprintf(self::CKEDITOR_JAVASCRIPT, $formFieldName);
        return $ckeditor;
    }
}
