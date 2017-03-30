<?php

namespace App\models;

use App\models\Alipay\Alipay;
use App\models\Weixin\Weixin;
use Illuminate\Database\Eloquent\Model;
use think\Exception;

class Payment extends Model
{
    /**
     * 可用的支付方式
     * @var array
     */
    protected $enableMethod = ['alipay', 'weixin'];
    /**
     * 当前支付方式
     * @var string
     */
    protected $paymentMethod = '';

    public function getWeixin(){
        return new Weixin();
    }
    public function getAlipay(){
        return new Alipay();
    }
    public function setPaymentMethod($paymentMethod = ''){
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    public function initConfig(){
        if(in_array($this->paymentMethod, $this->enableMethod)){
            $this->getWeixin()
                 ->setCertsPath(Weixin::CERT_DIR_WEB)
                 ->setTradeType(Weixin::TYPE_WEB)
                 ->setInput([])
            ;
        }
        throw new Exception('不支持的支付类型');
    }
}
