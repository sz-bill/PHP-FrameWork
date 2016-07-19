<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
    const M = 'news';
    protected $_model,$_layout,$_view;
    public function __construct(){
        parent::__construct();
        $this->_model = self::M;
        $this->_layout= self::M;
        $this->_view = self::M;
    }
    /**
    * 指定模板
    * 
    */
    public function index()
    {
        #$this->load->helper('news.xml');
        #$this->_getXML('news'); 
        $this->load->model('Newsxx'); 
        $abc = $this->Newsxx->get_news_view();
        $data = array(
            'aaaaaa' => array(
                                'pppppp1' => 'aaaaaaaaa',
                                'pppppp2' => 'bbbbbbbbbbb',
                                'pppppp3' => 'ccccccccccccc',
                                'pppppp4' => 'dddddddddddd',
                                'pppppp5' => 'eeeeeeeeeeeeeeeee',
                                'pppppp6' => 'fffffffffffff',
                                'pppppp7' => 'ggggggggggggg',
                                'pppppp8' => 'eeeeeeeeeeee',
                                'pppppp9' => 'wwwwwwwwwwwww',
                                'pppppp10' => 'qqqqqqqqqqqqqqqq'
                            ),
            'pppppp2' => $abc,
            'pppppp3' => 'ccccccccccccc',
            'pppppp4' => 'dddddddddddd',
            'pppppp5' => 'eeeeeeeeeeeeeeeee',
            'pppppp6' => 'fffffffffffff',
            'pppppp7' => 'ggggggggggggg',
            'pppppp8' => 'eeeeeeeeeeee',
            'pppppp9' => 'wwwwwwwwwwwww',
            'pppppp10' => 'qqqqqqqqqqqqqqqq'
        );
        #$this->assignData('aaaaaa', $data);
        #$this->setLayout('test')->setTemplate('news')->toView();
        $this->load->view('y06/'.$this->_view, $data);
    }
    private function toView(){
        $data = $this->getData();
        $this->load->view('y06/'.$this->_view, $this->getData());
    }
    
}
