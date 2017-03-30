<?php

namespace App\models\Weixin;

use Illuminate\Database\Eloquent\Model;

class Weixin extends Model
{
    const TYPE_NATIVE = 'NATIVE';
    const TYPE_WEB  = 'WEB';
    const TYPE_APP = 'APP';
    const CURRENT_CNY = 'CNY';
    const URL_API = 'https://api.mch.weixin.qq.com';
    const URL_NOTIFY = 'https://api.ai56w.com/payment/wechatPay_notify_url';
    const URL_NOTIFY2 = 'http://api.aiwuliu.trade:8899/payment/wechatPay_notify_url'; ##备用

    /**
     * web版证书目录
     */
    const CERT_DIR_WEB = 'cert_web';
    /**
     * app版证书目录
     */
    const CERT_DIR_APP = 'cert_app';

    /**
     * 交易设备的类型
     * @var string
     */
    public $trade_type = self::TYPE_WEB;
    /**
     * 签名证书路径信息
     * @var string
     */
    public $certs_path = self::CERT_DIR_WEB;

    /**
     * 配置参数
     * @var null
     */
    public $config = null;
    /**
     * 设置 postXmlData
     * @param array $postXmlData
     * @return $this
     */
    public function setInput($postXmlData = []){
        $this->postXmlData = $postXmlData;
        return $this;
    }

    /**
     * 设置设备交易的类型
     * @param string $trade_type
     * @return $this
     */
    public function setTradeType($trade_type = self::TYPE_WEB){
        $this->trade_type = $trade_type;
        return $this;
    }

    /**
     * 设置交易时使用的数据签名证书路径
     * @param string $certs_path
     * @return $this
     */
    public function setCertsPath($certs_path = self::CERT_DIR_WEB){
        $this->certs_path = $certs_path;
        return $this;
    }

    /**
     * 获取微信接口需要用的基本配置参数内容
     * @return array
     */
    public function getBaseConfig(){
        $config = [
            'sslcert_path'  =>  COMMON_PATH.'library/WechatPay/%s/apiclient_cert.pem',
            'sslkey_path'   =>  COMMON_PATH.'library/WechatPay/%s/apiclient_key.pem',
            'ca_cert'   =>  COMMON_PATH.'library/WechatPay/%s/rootca.pem',
            'nonce_str' => self::nonceStr(),
            'client_ip' => '127.0.0.1', //客户终端ip, getClientAddress()
        ];
        return $config;
    }

    /**
     * 获取 WEB 配置数据
     * @return array
     */
    public function getWebConfig(){
        $config = [
            'appid' => 'wx7df0b39cf0d68a33',
            'mch_id' => '1291964801',
            'key' => 'b021a99e1ejcf9ba13be8c26d9cdcbf8',
            'secret' => '02e03bd2d443d99efbd6fd53455bf44d',
            'device_info' => self::TYPE_WEB
        ];

//        $config['appid'] = 'wx7df0b39cf0d68a33';
//        $config['mch_id'] = '1291964801';
//        $config['key'] = 'b021a99e1ejcf9ba13be8c26d9cdcbf8';
//        $config['secret'] = '02e03bd2d443d99efbd6fd53455bf44d';
//        $config['device_info'] = self::TYPE_WEB;

        return $config;
    }

    /**
     * 获取 APP 配置数据
     * @return array
     */
    public function getAppConfig(){
        $config = [
            'appid' => 'wx1fe92bac2345429d',
            'mch_id' => '1301860901',
            'key' => 'NIrYI1uhCHjWioJeapq1Se7oDEt699u9',
            'secret' => '81993c30db578e5705f81a26e33964ba',
            'device_info' => self::TYPE_APP
        ];
//        $config['appid'] = 'wx1fe92bac2345429d';
//        $config['mch_id'] = '1301860901';
//        $config['key'] = 'NIrYI1uhCHjWioJeapq1Se7oDEt699u9';
//        $config['secret'] = '81993c30db578e5705f81a26e33964ba';
//        $config['device_info'] = self::TYPE_APP;

        return $config;
    }

    public static function nonceStr($length = 32)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $str = '';
        for ( $i = 0; $i < $length; $i++ )  {
            $str .= substr($chars, mt_rand(0, strlen($chars)-1), 1);
        }
        return $str;
    }

    /**
     * 初始化参数配置
     * @return $this
     */
    public function initConfig(){
        $postData = $this->postXmlData;
        $config = $this->getBaseConfig();
        $webConfig = $this->getWebConfig();
        $appConfig = $this->getAppConfig();

        $strCertFolder = $this->certs_path;
        $config['sslcert_path'] = sprintf($config['sslcert_path'], $strCertFolder);
        $config['sslkey_path'] = sprintf($config['sslkey_path'], $strCertFolder);
        $config['ca_cert'] = sprintf($config['ca_cert'], $strCertFolder);
        $config['refund_fee_type'] = 'CNY';
        $config['notify_url'] = self::URL_NOTIFY;
        if($this->trade_type == self::TYPE_WEB){
            $config = array_merge($config, $webConfig);  //配置数据
        }
        if($this->trade_type == self::TYPE_APP){
            $config = array_merge($config, $appConfig);  //配置数据
        }
        unset($config['client']);
        $config = array_merge($config, $postData);  //配置数据
        $this->config = $config;
        return $this;
    }

    /**
     * 确认签名
     * @param array $params
     * @return bool
     */
    public function verifySign($params = []){
        if(empty($params)){
            $params = $this->postXmlData;
        }

        ksort($params);
        reset($params);
        $arr = [];
        foreach($params as $k=>$v){
            if(!empty($v) && $k != 'sign'){
                $arr[] = $k.'='.$v;
            }
        }
        $string = implode('&', $arr);
        $string = $string.'&key='. self::$key;//app
        $sign = strtoupper(md5($string));
        return $params['sign'] === $sign;
    }
}
