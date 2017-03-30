<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
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
    /**
     * 订单编码
     * @var string
     */
    protected $increment_id = '';
    /**
     * 订单编号
     * @var int
     */
    protected $order_id = 0;
    /**
     * 当前订单
     * @var
     */
    protected $order;

    /**
     * 写入日志
     *
     * @param mixed $message
     */
    protected function wlog($message = '', $title = "默认说明"){
        $log = "\r\n\r\n## " . date("Y-m-d H:i:s") . " " . $title . " \r\n";
        $path = dirname(dirname(__CLASS__));
        $filename = ROOT_PATH . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR . basename(__CLASS__) . '.log';
        @error_log( $log . print_r($_SERVER, true), 3, $filename );
    }

    /**
     * 检查订单状态，订单是否已经支付，订单是否已经失败
     * @param Request $request
     * @return string
     */
    public function checkStatus(Request $request){
        $result = ['status' => 0, 'message' => ''];
        if ($request->isMethod('post')) {
            $paymentMethod = '';
            $postData = $request->input();
            if(isset($postData['paymentMethod'])){
                $paymentMethod = strtolower(trim($postData['paymentMethod']));
            }
            if(in_array($paymentMethod, $this->enableMethod)){
                $this->paymentMethod = $paymentMethod;
                //调用 paymentModel->setMethod($paymentMethod)->setData($postData)->checkStatus()->toArray()->toString();
            }
        }

        return json_encode($result);
    }


    /**
     * 退款操作
     * @param Request $request
     * @return string
     */
    public function refund(Request $request){
        $result = ['status' => 0, 'message' => ''];
        if ($request->isMethod('post')) {
            $paymentMethod = '';
            $postData = $request->input();
            if(isset($postData['paymentMethod'])){
                $paymentMethod = strtolower(trim($postData['paymentMethod']));
            }
            if(in_array($paymentMethod, $this->enableMethod)){
                $this->paymentMethod = $paymentMethod;
                //调用 paymentModel->setMethod($paymentMethod)->setData($postData)->refund()->toArray()->toString();
            }
        }

        return json_encode($result);
    }

    /**
     * 对订单数据进行签名
     * @param Request $request
     * @return string
     */
    public function sign(Request $request){
        $result = ['status' => 0, 'message' => ''];
        if ($request->isMethod('post')) {
            $paymentMethod = '';
            $postData = $request->input();
            if(isset($postData['paymentMethod'])){
                $paymentMethod = strtolower(trim($postData['paymentMethod']));
            }
            if(in_array($paymentMethod, $this->enableMethod)){
                $this->paymentMethod = $paymentMethod;
                //调用 paymentModel->setMethod($paymentMethod)->setData($postData)->sign()->toArray()->toString();
            }
        }

        return json_encode($result);
    }

    /**
     * 获取表单提交的内容， 并转化为数组
     * @return array|bool
     */
    public function inputXmlToArray(){
        $xml = file_get_contents("php://input");
        $xml = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
        if ($xml === false){
            return false;
        }
        $data = [];
        foreach ($xml as $key => $val){
            $data[$key] = (string)$val;
        }
        return $data;
    }

    //========== For Weixin BOF =========================================
    /**
     * 微信支付
     */
    public function weixin(){}

    /**
     * 微信回调
     */
    public function weixinNotify(){}
    //========== For Weixin EOF =========================================


    //========== For Alipay BOF
    /**
     * 支付宝支付
     */
    public function alipay(){}

    /**
     * 支付宝回调
     */
    public function alipayNotify(){}
    //========== For Alipay EOF
}
