<?php

namespace Module\toathuoc\Controller;

use Model\Common;
use Module\toathuoc\Permission;

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
        Common::ToUrl("/toathuoc/index");

    }
    function uninstall() {
        Permission::uninstall();
        Common::ToUrl("/toathuoc/index");
    }
}
