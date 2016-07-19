<?php
class Newsxx extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    public function get_news_view()
    {
        $helloworld_view = "HelloWorld!";
        return $helloworld_view;
    }
}