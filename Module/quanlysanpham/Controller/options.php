<?php

namespace Module\quanlysanpham\Controller;

class options extends \Application implements \Controller\IControllerBE {

    public function __construct() {
        /**
         * kiem tra đăng nhap
         * @param {type} parameter
 */
        new \Controller\backend();
        self::$_Theme = "backend";
    }

    function index() {
        $this->View();
    }

    public function delete() {
        
    }

    public function post() {
        $this->View();
    }

    public function put() {
        $this->View();
    }

}
