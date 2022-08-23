<?php

namespace Module\quanlythuoc\Controller;

use Module\quanlythuoc\Permission;

class danhmuc extends \Application implements \Controller\IControllerBE {

    public function __construct() {
        /**
         * kiem tra đăng nhap
         * @param {type} parameter
         */
        new \Controller\backend();
        self::$_Theme = "backend";
    }

    function index() {

        \Model\Permission::Check([\Model\User::Admin,\Model\User::QuanLy, Permission::QLT_DanhMuc_DS]);
        $modelItem = new \Module\quanlysanpham\Model\SanPham();
        $params["keyword"] = isset($_REQUEST["keyword"]) ? \Model\Common::TextInput($_REQUEST["keyword"]) : "";
        $params["danhmuc"] = isset($_REQUEST["danhmuc"]) ? \Model\Common::TextInput($_REQUEST["danhmuc"]) : "";
        $params["isShow"] = isset($_REQUEST["isShow"]) ? \Model\Common::TextInput($_REQUEST["isShow"]) : "";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachTaiKhoan = $modelItem->GetItems($params, $indexPage, $pageNumber, $total);
        $data["items"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;

        $this->View($data);
    }

	/**
	 *
	 * @return mixed
	 */
	function post() {
        \Model\Permission::Check([\Model\User::Admin,\Model\User::QuanLy, Permission::QLT_DanhMuc_Post]);
        $this->View();
	}
	
	/**
	 *
	 * @return mixed
	 */
	function put() {
        \Model\Permission::Check([\Model\User::Admin,\Model\User::QuanLy, Permission::QLT_DanhMuc_Put]);
        $this->View();
	}
	
	/**
	 *
	 * @return mixed
	 */
	function delete() {
        \Model\Permission::Check([\Model\User::Admin,\Model\User::QuanLy, Permission::QLT_DanhMuc_Delete]);
	}

    function GetByName() {
	}

    function GetByNameBietDuoc() {
	}
}
