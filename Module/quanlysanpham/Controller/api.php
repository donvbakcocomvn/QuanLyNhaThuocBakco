<?php

namespace Module\quanlysanpham\Controller;

class api extends \Application {

    //put your code here

    public function __construct() {
        new \Controller\backend();
//        header('Content-type: application/json; charset=utf-8');
    }

    function index() {
        echo json_encode($_REQUEST, JSON_UNESCAPED_UNICODE);
    }

    function xoattbanhang() {
        $id = \Model\Request::Get("id", null);
        $spsl = new \Module\quanlysanpham\Model\SanPhamSoLuong();
        $spsl->Delete($id);
    }

    function luutatcattbanhang() {
        $ThongTinBanHang = \Model\Request::Post("ThongTinBanHang", []);
        foreach ($ThongTinBanHang as $item) {
            $id = $item["Id"];
            $soluong = $item["SoLuong"];
            $gia = $item["Gia"];
            $SanPhamSoLuong = new \Module\quanlysanpham\Model\SanPhamSoLuong();
            $model = $SanPhamSoLuong->GetById($id);
            $model["SoLuong"] = $soluong;
            $model["Gia"] = $gia;
            $SanPhamSoLuong->Put($model);
        }
    }

    function luuttbanhang() {

        $id = \Model\Request::Post("Id", "");
        $soluong = \Model\Request::Post("SoLuong", "");
        $gia = \Model\Request::Post("Gia", "");
        $SanPhamSoLuong = new \Module\quanlysanpham\Model\SanPhamSoLuong();
        $model = $SanPhamSoLuong->GetById($id);
        $model["SoLuong"] = $soluong;
        $model["Gia"] = $gia;
        $SanPhamSoLuong->Put($model);
    }

    function GetThongTinBanHang() {
        $idSanPham = $_REQUEST["id"];
        $SanPhamSoLuong = new \Module\quanlysanpham\Model\SanPhamSoLuong();
        $items = $SanPhamSoLuong->GetByIdSanPhan($idSanPham);
        foreach ($items as $k => $item) {
            $_item = new \Module\quanlysanpham\Model\SanPhamSoLuong($item);
            $items[$k]["Option1Detail"] = $_item->Option1();
            $items[$k]["Option2Detail"] = $_item->Option2();
        }
        echo \Model\Response::ToJson($items);
    }

    function getsanphambyid() {
        $SanPham = new \Module\quanlysanpham\Model\SanPham(\Model\Request::Get("id", ""));
        $item = $SanPham->ToArray();
        echo \Model\Response::ToJson($item);
    }

    function DanhSachLoaiThuocTinhSanPham() {
        $SPThuocTinh = new \Module\quanlysanpham\Model\SanPhamLoaiThuocTinh();
        $total = 0;
        $items = $SPThuocTinh->GetItems("", 1, 100, $total);
        echo \Model\Response::ToJson($items);
    }

    function dsthuoctinhchitiet() {
        \Model\Response::ToJson($_POST["loaithuocTinh"]);
        $loaithuocTinh = $_POST["loaithuocTinh"];
        $spth = new \Module\quanlysanpham\Model\SanPhamThuocTinhChiTiet();
        $items = $spth->GetItemsByType($loaithuocTinh);
        foreach ($items as $k => $v) {
            $SPThuocTinh = new \Module\quanlysanpham\Model\SanPhamThuocTinh($v["IdThuocTinh"]);
            $items[$k]['ThuocTinh'] = $SPThuocTinh->ToAray();
        }
        echo \Model\Response::ToJson($items);
    }

    function XoaThuocTinhChiTiet() {
        $id = $_REQUEST["id"];
        $spth = new \Module\quanlysanpham\Model\SanPhamThuocTinhChiTiet();
        $spth->Delete($id);
    }

    private function TaoThongTinBanHang($IdSanPham) {
        $SanPham = new \Module\quanlysanpham\Model\SanPham($IdSanPham);
        $op1 = $SanPham->OptionsByIndex(1);
        $op1Item = $op1->ThuocTinhChiTiet();
        $op2 = $SanPham->OptionsByIndex(2);
        $op2Item = $op2->ThuocTinhChiTiet();
        if ($op1Item) {
            $SanPhamSL = new \Module\quanlysanpham\Model\SanPhamSoLuong();
            if ($op2Item) {
                foreach ($op1Item as $ttct) {
                    foreach ($op2Item as $ttct2) {
                        // có 2 option
                        $itemttct["Id"] = \Model\Common::uuid();
                        $itemttct["IdSanPham"] = $IdSanPham;
                        $itemttct["Option1"] = $ttct["Id"];
                        $itemttct["Option2"] = $ttct2["Id"];
                        $itemttct["SoLuong"] = 0;
                        $itemttct["Gia"] = 0;
                        try {
                            $SanPhamSL->Post($itemttct);
                        } catch (\Exception $exc) {
                            $exc->getTraceAsString();
                        }
                    }
                }
            } else {
                foreach ($op1Item as $ttct) {
                    $itemttct["Id"] = \Model\Common::uuid();
                    $itemttct["IdSanPham"] = $IdSanPham;
                    $itemttct["Option1"] = $ttct["Id"];
                    $itemttct["Option2"] = "";
                    $itemttct["SoLuong"] = 0;
                    $itemttct["Gia"] = 0;
                    try {
                        $SanPhamSL->Post($itemttct);
                    } catch (\Exception $exc) {
                        $exc->getTraceAsString();
                    }
                }
            }
        }

        $SanPhamSoLuong = new \Module\quanlysanpham\Model\SanPhamSoLuong();
        $items = $SanPhamSoLuong->GetByIdSanPhan($IdSanPham);
        foreach ($items as $k => $item) {
            $_item = new \Module\quanlysanpham\Model\SanPhamSoLuong($item);
            $items[$k]["Option1Detail"] = $_item->Option1();
            $items[$k]["Option2Detail"] = $_item->Option2();
        }
        echo \Model\Response::ToJson($items);
    }

    function testTaoThongTinBanHang() {
        $IdSanPham = $_GET["id"];
        $this->TaoThongTinBanHang($IdSanPham);
    }

    function themthuoctinhchitiet() {
        $model["Id"] = \Model\Common::uuid();
        $model["IdThuocTinh"] = $_POST["LoaiThuocTinh"];
        $model["Name"] = $_POST["TenThuocTinh"];

        $spth = new \Module\quanlysanpham\Model\SanPhamThuocTinhChiTiet();
        $spth->Post($model);
        echo \Model\Response::ToJson($model);
        // thêm vao bảng thuoc tinh chi tiết
        // sản phẩm nào
        $SPLTT = new \Module\quanlysanpham\Model\SanPhamLoaiThuocTinh($model["IdThuocTinh"]);
        $SanPham = new \Module\quanlysanpham\Model\SanPham($SPLTT->IdSanPham);
        $op1 = $SanPham->OptionsByIndex(1);
        $op1Item = $op1->ThuocTinhChiTiet();
        $op2 = $SanPham->OptionsByIndex(2);
        $op2Item = $op2->ThuocTinhChiTiet();
        var_dump($op1Item);
        var_dump($op2Item);

        // thuoc tinh thư 1 là gì 
        // thuoc tinh thư 2 là gì
    }

    function themthuoctinh() {
        $idThuocTinh = $_REQUEST["OptionsTypeId"];
        $idSanPham = $_REQUEST["IdSanPham"];
        $options = intval($_REQUEST["Options"]);
        $options = min($options, 2);
        $options = max($options, 0);
        $SPThuocTinh = new \Module\quanlysanpham\Model\SanPhamThuocTinh();
//        đã có 
        $item = $SPThuocTinh->GetBySanPhamOptionsType($idSanPham, $options);
        if ($item) {
            $item["OptionsTypeId"] = $idThuocTinh;
            $SPThuocTinh->Put($item);
        } else {
//         thêm   
            $model["Id"] = \Model\Common::uuid();
            $model["OptionsTypeId"] = $idThuocTinh;
            $model["IdSanPham"] = $idSanPham;
            $model["GhiChu"] = "";
            $model["Options"] = $options;
            $SPThuocTinh->Post($model);
        }

        \Model\Response::ToJson(["status" => "OK"]);
    }

    function xoathuoctinh() {
        $idSanPham = $_REQUEST["id"];
        $SPThuocTinh = new \Module\quanlysanpham\Model\SanPhamThuocTinh();
        $SPThuocTinh->DeleteById($idSanPham);
        echo \Model\Response::ToJson(["status" => "OK"]);
    }

    function DanhSachThuocTinhTheoSanPham() {
        // mã sản phẩm

        $idSanPham = $_REQUEST["id"];
        $SPThuocTinh = new \Module\quanlysanpham\Model\SanPhamThuocTinh();
        $items = $SPThuocTinh->GetItemsByIdSanPham($idSanPham);

        foreach ($items as $k => $item) {
            $SanPhamLoaiThuocTinh = new \Module\quanlysanpham\Model\SanPhamLoaiThuocTinh();
            $items[$k]["LoaiThuocTinh"] = $SanPhamLoaiThuocTinh->GetById($item["OptionsTypeId"]);
        }
        echo \Model\Response::ToJson($items);
    }

}
