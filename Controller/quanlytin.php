<?php

namespace Controller;

use Model\TinTuc;

class quanlytin extends \Application implements IControllerBE {

    public function __construct() {

        self::$_Theme = "backend";
    }

    function index() {
        self::$_Layout = "news";
        $DanhSachTin = [
            1, 2, 3, 4, 5, 6, 7
        ];
        $this->View(["DanhSachTin" => $DanhSachTin]);
    }

    public function delete() {
        $this->View();
    }

    public function post() {

        $this->View();
    }

    /**
     * tai danh sach bai viet
     * @param {type} parameter
     */
    public function loaddanhsach() {
        $this->PartialView();
    }

    /**
     * sửa bài viết
     * @param {type} parameter
     */
    public function put() {

        $this->View();
    }

}
