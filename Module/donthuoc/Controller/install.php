<?php

namespace Module\donthuoc\Controller;

use Model\Common;
use Module\donthuoc\Permission;

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
        Common::ToUrl("/donthuoc/index");

    }
    function uninstall() {
        Permission::uninstall();
        Common::ToUrl("/donthuoc/index");
    }
}
