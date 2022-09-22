<?php

namespace Controller;

use Model\ThongKe;
use PFBC\View;

class backend extends \Application {

    /**
     * kiểm tra dăng nhap
     * @param {type} parameter
     */
    public function __construct() {

        $_SESSION[QuanLy] = isset($_SESSION[QuanLy]) ? $_SESSION[QuanLy] : null;
        /**
         * chưa đăng nhap
         * @param {type} parameter
         */
//        var_dump($_SESSION[QuanLy]);
        if ($_SESSION[QuanLy] == null) {
            /**
             * chuyển qua trang dăng nhap
             * @param {type} parameter
             */
            \Model\Common::ToUrl(LoginPage);
            //
        }
        self::$_Theme = "backend";
        /**
         * đang nhap thanh cong
         * @param {type} parameter
         */
    }

    function index() {

        $this->View();
    }

    // function livesearch()
    // {

    // }

    function nhapkho() {

        $this->View();
    }

    function dsnhapchitiet()
    {
        $modelItem = new ThongKe();
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

    function dsxuatchitiet()
    {
        $this->View();
    }
    

    function xuatkho() {

        $this->View();
    }

    function lichsunhap()
    {
        $idThuoc = $this->getParams(0);
        // echo $idThuoc;
        $this->View($id = ['id']);
    }

    function lichsuxuat()
    {
        $idThuoc = $this->getParams(0);
        // echo $idThuoc;
        $this->View($id = ['id']);
    }

    function qrcode() {

        $this->View();
    }

    function logout() {

        $_SESSION[QuanLy] = null;
        unset($_COOKIE['Token']);
        setcookie("Token", null, -1, "/");
        \Model\Common::ToUrl(LoginPage);
    }

}
