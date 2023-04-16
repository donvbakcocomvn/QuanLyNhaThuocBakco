<?php

namespace Module\quanlythuoc\Controller;

use Model\Common;
use Model\Error;
use Model\Request;
use Module\cart\Model\DonHang;
use Module\quanlythuoc\Model\PhieuXuatNhap as ModelPhieuXuatNhap;
use Module\quanlythuoc\Model\PhieuXuatNhap\FormPhieuXuatNhap;
use Module\quanlythuoc\Model\SanPham;
use Module\quanlythuoc\Permission;
use PhpOffice\PhpSpreadsheet\Writer\Exception;


class phieuxuatnhap extends \Application implements \Controller\IControllerBE
{

    public function __construct()
    {
        /**
         * kiem tra đăng nhap
         * @param {type} parameter
         */
        new \Controller\backend();
        self::$_Theme = "backend";
    }

    function index()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_Phieu_DS]);
        $modelItem = new \Module\quanlythuoc\Model\PhieuXuatNhap();
        $params["keyword"] = isset($_REQUEST["keyword"]) ? \Model\Common::TextInput($_REQUEST["keyword"]) : "";
        $params["danhmuc"] = isset($_REQUEST["danhmuc"]) ? \Model\Common::TextInput($_REQUEST["danhmuc"]) : "";
        $params["SearchXuatNhap"] = isset($_REQUEST["SearchXuatNhap"]) ? \Model\Common::TextInput($_REQUEST["SearchXuatNhap"]) : "";
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

    public function capnhatdanhsachsanpham()
    {
        header('Content-Type: application/json; charset=utf-8');
        $id = $this->getParams(0);
        $index = $this->getParams(1);

        $thuoc = \Module\quanlythuoc\Model\PhieuXuatNhap::GetThuocPhieuNhap($index);

        $donthuocdetail = new \Module\quanlythuoc\Model\PhieuXuatNhap();
        $sanpham = new SanPham($id);
        $_sanpham = $sanpham->GetById($id);
        $_sanpham["Soluong"] = $donthuocdetail->GetThuocPhieuXuatNhap($index)["Soluong"] ?? 1;
        $_sanpham["Solo"] = $donthuocdetail->GetThuocPhieuXuatNhap($index)["Solo"] ?? "";
        $_sanpham["Soluong"] = max($_sanpham["Soluong"], 1);
        $_sanpham["HSD"] = $thuoc["HSD"] ?? date("Y-m-d", time());
        $_sanpham["Giaban"] = floatval($_sanpham["Giaban"] ?? 0);
        $_sanpham["Gianhap"] = floatval($_sanpham["Gianhap"] ?? 0);
        $_sanpham["ThanhTien"] = floatval($_sanpham["Giaban"] * $_sanpham["Soluong"]);
        $_sanpham["TongTien"] = \Module\quanlythuoc\Model\PhieuXuatNhap::TongTien();
        // $_sanpham["HSD"] = null;
        $_sanpham["DVTTitle"] = $sanpham->DonViTinh();
        $donthuocdetail->CapNhatSanPham($_sanpham, $index);
        echo json_encode(\Module\quanlythuoc\Model\PhieuXuatNhap::DSThuocPhieuNhap()[$index], JSON_UNESCAPED_UNICODE);
    }
    public function lamlai()
    {
        ModelPhieuXuatNhap::DeleteAllThuocPhieuNhap();
        ModelPhieuXuatNhap::SetPostForm(null);
    }

    public function capnhatsanpham()
    {
        header('Content-Type: application/json; charset=utf-8');
        $dataRequest = json_decode(file_get_contents('php://input'), JSON_OBJECT_AS_ARRAY);
        // var_dump($dataRequest);
        $index = intval($dataRequest["index"]);
        $donthuocdetail = new \Module\quanlythuoc\Model\PhieuXuatNhap();
        $sanpham = new SanPham(\Module\quanlythuoc\Model\PhieuXuatNhap::DSThuocPhieuNhap()[$index]);
        $_sanpham = $sanpham->GetById($sanpham->Id);
        $_sanpham["Soluong"] = intval($dataRequest["soLuong"]);
        $_sanpham["NhaSX"] = $dataRequest["nhaSanXuat"] ?? "";
        $_sanpham["NuocSX"] = $dataRequest["nuocSanXuat"] ?? "";
        $_sanpham["Solo"] = $dataRequest["soLo"] ?? "";
        if ($dataRequest["hsd"] != "") {
            $_sanpham["HSD"] = date("Y-m-d", strtotime($dataRequest["hsd"]));
        }
        $_sanpham["Gianhap"] = floatval($_sanpham["Gianhap"] ?? 0);
        $_sanpham["Giaban"] = floatval($dataRequest["gia"]);
        $donthuocdetail->CapNhatSanPham($_sanpham, $index);
        $_sanpham["ThanhTien"] = $_sanpham["Giaban"] * $_sanpham["Soluong"];
        $_sanpham["TongTien"] = \Module\quanlythuoc\Model\PhieuXuatNhap::TongTien();
        // lưu danh sách sản phẩm
        echo json_encode($_sanpham, JSON_UNESCAPED_UNICODE);
    }

    public function ThemSanPham()
    {
        // $MaSP = \Model\Request::Get("id", []);
        // $index = \Model\Request::Get("index", []);
        \Module\quanlythuoc\Model\PhieuXuatNhap::ThemThuocPhieuXuatNhap([]);
    }


    public function DeleteSP()
    {
        $index = $this->getParams(0);
        // echo $index;
        unset($_SESSION["DSThuocPhieuNhap"][$index]);
        return $_SESSION["DSThuocPhieuNhap"];
    }

    public function isdelete()
    {
        if (\Model\Request::Get("id", [])) {
            $DSMaBenhNhan = \Model\Request::Get("id", []);
            $modelItem = new \Module\quanlythuoc\Model\PhieuXuatNhap();
            $modelItem->isDelete([$DSMaBenhNhan]);
        }
        if (\Model\Request::Post("SanPham", [])) {
            $DSMaBenhNhan = \Model\Request::Post("SanPham", []);
            $DSMaBenhNhan = array_keys($DSMaBenhNhan);
            $modelItem = new \Module\quanlythuoc\Model\PhieuXuatNhap();
            $modelItem->isDelete($DSMaBenhNhan);
        }
        \Model\Common::ToUrl($_SERVER["HTTP_REFERER"]);
    }

    function detail()
    {
        try {
            $id = $this->getParams(0);
            if ($id == null || $id == "") {
                throw new Exception("Không có mã phiếu xuất");
            }
            $SP = new \Module\quanlythuoc\Model\PhieuXuatNhap();
            $data["data"] = $SP->GetById($id);
            $this->View($data);
        } catch (Exception $ex) {
            new Error(Error::danger, $ex->getMessage());
            Common::ToUrl("/quanlythuoc/phieuxuatnhap/");
        }
    }

    function post()
    {
        if (isset($_GET["isnews"])) {
            ModelPhieuXuatNhap::DeleteAllThuocPhieuNhap();
            ModelPhieuXuatNhap::SetPostForm([]);
            Common::ToUrl("/quanlythuoc/phieuxuatnhap/post");
        }
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_Phieu_Post]);
        try {
            if (\Model\Request::Post(FormPhieuXuatNhap::$ElementsName, null)) {
                $itemForm = \Model\Request::Post(FormPhieuXuatNhap::$ElementsName, null);
                $phieuXuatNhap = new \Module\quanlythuoc\Model\PhieuXuatNhap();
                $phieuDB = $phieuXuatNhap->GetById($itemForm["IdPhieu"]);
                if ($phieuDB != null) {
                    throw new Exception("Đã có mã phiếu này.");
                }
                $Phieu["TongTien"] = ModelPhieuXuatNhap::TongTien();
                $Phieu["DoViCungCap"] = $itemForm["DoViCungCap"] ?? "";
                $Phieu["IdPhieu"] = $itemForm["IdPhieu"];
                $Phieu["XuatNhap"] = $itemForm["XuatNhap"];

                $Phieu["NoiDungPhieu"] = $itemForm["NoiDungPhieu"];
                $Phieu["GhiChu"] = $itemForm["GhiChu"];
                $Phieu["NgayNhap"] = Date("Y-m-d", strtotime($itemForm["NgayNhap"]));
                $Phieu["CreateRecord"] = Date("Y-m-d H:i:s", time());
                $Phieu["UpdateRecord"] = Date("Y-m-d H:i:s", time());
                $Phieu["IsDelete"] = 0;
                // var_dump($Phieu);
                // die();
                $phieuXuatNhap = new \Module\quanlythuoc\Model\PhieuXuatNhap();
                $phieuXuatNhap->Post($Phieu);

                foreach (ModelPhieuXuatNhap::DSThuocPhieuNhap() as $maphieu => $_phieu) {

                    if ($_phieu) {
                        if (isset($_phieu["Id"]) == true) {
                            $itemFormDetail["IdPhieu"] = $itemForm["IdPhieu"];
                            $itemFormDetail["IdThuoc"] = $_phieu["Id"];
                            $itemFormDetail["SoLuong"] = $_phieu["SoLuong"];
                            $itemFormDetail["SoLo"] = $_phieu["Solo"];
                            $itemFormDetail["HanSuDung"] = date("Y-m-d", strtotime($_phieu["HSD"]));
                            $itemFormDetail["NhaSanXuat"] = $_phieu["NhaSanXuat"];
                            $itemFormDetail["NuocSanXuat"] = $_phieu["NuocSanXuat"];
                            $itemFormDetail["Price"] = $_phieu["Giaban"];
                            $itemFormDetail["XuatNhap"] = $itemForm["XuatNhap"];
                            $itemFormDetail["CreateRecord"] = Date("Y-m-d", time());
                            $itemFormDetail["UpdateRecord"] = Date("Y-m-d", time());
                            $itemFormDetail["GhiChu"] = "";
                            $itemFormDetail["IsDelete"] = 0;
                            $SanPham = new \Module\quanlythuoc\Model\PhieuXuatNhapChiTiet();
                            $SanPham->Post($itemFormDetail);
                        }
                    }
                }
                $dm = new SanPham();
                $dm->DongBoThuocNhap();
                ModelPhieuXuatNhap::DeleteAllThuocPhieuNhap();
                ModelPhieuXuatNhap::SetPostForm([]);
                $phieu = new ModelPhieuXuatNhap($itemFormDetail["IdPhieu"]);
                new \Model\Error(\Model\Error::success, "Đã Thêm Phiếu");
                \Model\Common::ToUrl("/quanlythuoc/phieuxuatnhap/detail/" . $phieu->Id . "");
            }
        } catch (\Exception $exc) {
            new Error(Error::danger, $exc->getMessage());
        }
        ModelPhieuXuatNhap::AddThuocPhieuNhapDefault();
        $this->View();
    }

    public function setformdefault()
    {
        header('Content-Type: application/json; charset=utf-8');
        $dataRequest = json_decode(file_get_contents('php://input'), JSON_OBJECT_AS_ARRAY);
        $dataRequest["IdPhieu"] = trim($dataRequest["IdPhieu"]);
        if ($dataRequest["IdPhieu"] == "") {
            $dataRequest["IdPhieu"] = ModelPhieuXuatNhap::getIdPhieu();
        }
        ModelPhieuXuatNhap::SetPostForm($dataRequest);
        $phieuNhap = new ModelPhieuXuatNhap($dataRequest["IdPhieu"]);
        $Status = $phieuNhap->IdPhieu == null ? "1" : "0";

        echo json_encode(["IdPhieu" => $dataRequest["IdPhieu"], "Status" => $Status]);
    }

    /**
     *
     * @return mixed
     */
    function put()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_Phieu_Put]);

        try {
            if (\Model\Request::Post(FormPhieuXuatNhap::$ElementsName, null)) {

                $itemHtml = \Model\Request::Post(FormPhieuXuatNhap::$ElementsName, null);
                $phieu = new \Module\quanlythuoc\Model\PhieuXuatNhap();
                $itemForm["Id"] = $itemHtml["Id"];
                $itemForm["IdThuoc"] = $itemHtml["IdThuoc"];
                $itemForm["SoLuong"] = $itemHtml["SoLuong"];
                $itemForm["SoLo"] = $itemHtml["SoLo"];
                $itemForm["NhaSanXuat"] = $itemHtml["NhaSanXuat"];
                $itemForm["NuocSanXuat"] = $itemHtml["NuocSanXuat"];
                $itemForm["Gianhap"] = $itemHtml["Gianhap"];
                $itemForm["XuatNhap"] = $itemHtml["XuatNhap"];
                $itemForm["NoiDungPhieu"] = $itemHtml["NoiDungPhieu"];
                $itemForm["GhiChu"] = $itemHtml["GhiChu"];
                $itemForm["NgayNhap"] = $itemHtml["NgayNhap"];
                $phieu->Put($itemForm);
                $dm = new SanPham();
                $dm->DongBoThuocNhap();
                new \Model\Error(\Model\Error::success, "Đã Sửa Phiếu");
                // \Model\Common::ToUrl("/index.php?module=quanlythuoc&controller=danhmuc&action=index");
            }
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }
        $id = Request::Get("id", null);
        if ($id == null) {
        }
        $DM = new ModelPhieuXuatNhap($id);
        $data["phieuData"] = $DM->GetById($id);
        $data["phieuData"]["NgayNhap"] = date("Y-m-d", strtotime($data["phieuData"]["NgayNhap"]));
        \Module\quanlythuoc\Model\PhieuXuatNhap::DeleteAllThuocPhieuNhap();
        foreach ($DM->PhieuChiTiet() as $key => $value) {
            \Module\quanlythuoc\Model\PhieuXuatNhap::ThemDSThuocPhieuNhap($value, $key);
        }


        $this->View($data);
    }


    public function delete()
    {
        try {
            \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_Phieu_Delete]);
            $Id = \Model\Request::Get("id", null);
            if ($Id) {
                $DanhMuc = new PhieuXuatNhap();
                $DanhMuc->Delete($Id);
                new \Model\Error(\Model\Error::success, "Đã Xóa Phiếu");
            }
        } catch (\Exception $ex) {
            new \Model\Error(\Model\Error::danger, $ex->getMessage());
        }
        \Model\Common::ToUrl("/quanlythuoc/phieuxuatnhap/index");
    }
}