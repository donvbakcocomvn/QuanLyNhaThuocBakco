<?php

namespace Module\khachhang\Controller;

use Model\Common;
use Module\khachhang\Permission;

class install extends \Application  {

    public function __construct() {
        /**
         * kiem tra đăng nhap
         * @param {type} parameter
         */
        new \Controller\backend();
        self::$_Theme = "backend";
    }

    function index() {
    }

    function install() {
        Permission::install();
        Common::ToUrl("/khachhang/index");

    }
    function uninstall() {
        Permission::uninstall();
        Common::ToUrl("/khachhang/index");
    }
}
