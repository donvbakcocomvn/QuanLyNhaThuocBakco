<?php

namespace Controller;

class index extends \Application {

    public function __construct() {
        new backend();
        self::$_Theme = "backend";
    }   

    function index() {
        $this->View();
    }

    function pages() {
        $alias = \Model\Request::Get("param", "");
        $pages = new \Module\baiviet\Model\Pages\PagesService();
        $item = $pages->GetByAlias($alias);
        if ($item == null) {
            \Model\Common::ToUrl("/index/loi404");
        }
        $this->View(["Item" => $item]);
    }

    function loi404() {
        $this->View();
    }

}
