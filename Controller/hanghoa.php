<?php

namespace Controller;

class hanghoa extends \Application implements IControllerBE {

    public function __construct() {
        new backend();
        self::$_Theme = "backend1";
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, \Model\User::QuanLySanPham]);
    }

    function index() {
//        $abc = "asdas";
//        $abc1 = "asdas";
        
        $this->View();
    }

    public function delete() {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy]);
    }

    public function post() {
        
    }

    public function put() {
        
    }

}
