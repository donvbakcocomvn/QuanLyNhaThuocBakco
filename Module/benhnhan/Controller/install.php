<?php

namespace Module\benhnhan\Controller;

use Model\Common;
use Module\quanlythuoc\Permission;

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
        Common::ToUrl("/benhnhan/index");

    }
    function uninstall() {
        Permission::uninstall();
        Common::ToUrl("/benhnhan/index");
    }
}
