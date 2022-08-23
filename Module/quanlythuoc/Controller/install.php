<?php

namespace Module\quanlythuoc\Controller;

use Model\Common;
use Module\quanlysanpham\Model\DanhMuc\FormDanhMuc;
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
        Common::ToUrl("/quanlythuoc/sanpham");

    }
    function uninstall() {
        Permission::uninstall();
        Common::ToUrl("/quanlythuoc/sanpham");

    }
	 
}
