<?php

namespace Module\nhanvien\Controller;

use Module\nhanvien\Model\Form\FormLichLamViec;

class lichlamviec extends \Application implements \Controller\IControllerBE {

    public function __construct() {
        new \Controller\backend();
        self::$_Theme = "backend";
    }

    public function index() {
        \Model\Permission::Check([\Model\User::Admin, "NhanVienView"]);
        $modelUsers = new \Model\UserService();
        $params["keyword"] = isset($_GET["keyword"]) ? \Model\Common::TextInput($_GET["keyword"]) : "";
        $params["CongTy"] = isset($_GET["CongTy"]) ? \Model\Common::TextInput($_GET["CongTy"]) : "";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachTaiKhoan = $modelUsers->GetItems($params, $indexPage, $pageNumber, $total);
        $data["Items"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;
        $this->View($data);
    }

    public function savelichlamviec() {
        if (\Model\Request::Post(FormLichLamViec::$FormName, [])) {
            try {
                $lichLamViec = \Model\Request::Post(FormLichLamViec::$FormName, []);
                $modelLichLamViec = new \Module\nhanvien\Model\LichLamViec();
//                if (!isset($lichLamViec["Id"])) {
//                    $modelLichLamViec->Post($lichLamViec);
//                }
                if ($lichLamViec["Id"] != "") {
                    $modelLichLamViec->Put($lichLamViec);
                } else {
                    $modelLichLamViec->Post($lichLamViec);
                }
            } catch (\Exception $exc) {
                new \Model\Error("danger", $exc->getMessage());
            }
        }
        \Model\Common::ToUrl($_SERVER["HTTP_REFERER"]);
    }

    public function delete() {

    }

    public function post() {

    }

    public function put() {


        $this->View();
    }

    function caidatnhanh() {
        $begin = $_POST["TuNgay"];
        $end = $_POST["DenNgay"];
        $DsNgay = \Model\Common::FromDateToDateToList($begin, $end);

        foreach ($DsNgay as $value) {
            foreach ($_POST["Thu"] as $key => $value1) {
                $keydate = \Model\Common::NameDateByDate($value, true);
                if ($keydate == $key) {
                    echo $value . "<br>";
                    $modelLichLamViec = new \Module\nhanvien\Model\LichLamViec();
                    $LichLamViec["Ngay"] = $value;
                    $LichLamViec["IdNhanVien"] = $_POST["LichLamViec"]["IdNhanVien"];
                    $LichLamViec["CaLamViec"] = $_POST["LichLamViec"]["CaLamViec"];
                    $item = $modelLichLamViec->GetByDayIdNhanVien($LichLamViec["Ngay"], $LichLamViec["IdNhanVien"]);
                    if ($item) {
                        $item["CaLamViec"] = $LichLamViec["CaLamViec"];
                        $modelLichLamViec->Put($item);
                        echo "sửa";
                    } else {

                        $modelLichLamViec->Post($LichLamViec);
                        echo "Thêm";
                    }
                }
            }
        }
        \Model\Common::ToUrl($_SERVER["HTTP_REFERER"]);
    }

}
