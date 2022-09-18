<?php

namespace Controller;

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

    function nhapkho() {

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
