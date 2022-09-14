<?php

namespace Module\quanlythuoc\Controller;

use Model\Common;
use Model\Error;
use Model\Request;
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
        $donthuocdetail = new \Module\quanlythuoc\Model\PhieuXuatNhap();
        $sanpham = new SanPham($id);
        $_sanpham = $sanpham->GetById($id);
        $_sanpham["Soluong"] = 0;
        $_sanpham["DVTTitle"] = $sanpham->DonViTinh();
        $donthuocdetail->CapNhatSanPham($_sanpham, $index);
        echo json_encode(\Module\quanlythuoc\Model\PhieuXuatNhap::DSThuocPhieuNhap()[$index], JSON_UNESCAPED_UNICODE);
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
        $_sanpham["NhaSX"] =  $dataRequest["nhaSanXuat"];
        $_sanpham["NuocSX"] =  $dataRequest["nuocSanXuat"];
        $_sanpham["Solo"] =  $dataRequest["soLo"];
        $_sanpham["Gianhap"] =  $dataRequest["gia"];
        $_sanpham["Giaban"] =  $dataRequest["gia"];
        $donthuocdetail->CapNhatSanPham($_sanpham, $index);
        echo json_encode(\Module\quanlythuoc\Model\PhieuXuatNhap::DSThuocPhieuNhap()[$index], JSON_UNESCAPED_UNICODE);
    }

    public function ThemSanPham()
    {
        // $MaSP = \Model\Request::Get("id", []);
        // $index = \Model\Request::Get("index", []);
        $_SESSION["DSThuocPhieuNhap"][] = [];
        return $_SESSION["DSThuocPhieuNhap"];
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
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_Phieu_Post]);
        try {
            if (\Model\Request::Post(FormPhieuXuatNhap::$ElementsName, null)) {
                $itemForm = \Model\Request::Post(FormPhieuXuatNhap::$ElementsName, null);
                $phieuXuatNhap = new \Module\quanlythuoc\Model\PhieuXuatNhap();
                $phieuDB =  $phieuXuatNhap->GetById($itemForm["IdPhieu"]);

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
                    $itemFormDetail["IdPhieu"] = $Phieu["IdPhieu"];
                    $itemFormDetail["IdThuoc"] = $_phieu["Id"];
                    $itemFormDetail["SoLuong"] = $_phieu["SoLuong"];
                    $itemFormDetail["SoLo"] = $_phieu["SoLo"];
                    $itemFormDetail["NhaSanXuat"] = $_phieu["NhaSanXuat"];
                    $itemFormDetail["NuocSanXuat"] = $_phieu["NuocSanXuat"];
                    $itemFormDetail["Price"] = floatval($_phieu["Gianhap"]);
                    $itemFormDetail["XuatNhap"] = $itemForm["XuatNhap"];
                    $itemFormDetail["CreateRecord"] = Date("Y-m-d", time());
                    $itemFormDetail["UpdateRecord"] = Date("Y-m-d", time());
                    $itemFormDetail["GhiChu"] = "";
                    $itemFormDetail["IsDelete"] = 0;
                    $SanPham = new \Module\quanlythuoc\Model\PhieuXuatNhapChiTiet();
                    $SanPham->Post($itemFormDetail);
                }

                ModelPhieuXuatNhap::DeleteAllThuocPhieuNhap();
                // new \Model\Error(\Model\Error::success, "Đã Thêm Phiếu");
                \Model\Common::ToUrl("/quanlythuoc/phieuxuatnhap/detail/?id=" . $itemFormDetail["IdPhieu"] . "");
            }
        } catch (\Exception $exc) {
            new  Error(Error::danger, $exc->getMessage());
        }
        $this->View();
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
                $DanhMuc = new \Module\quanlythuoc\Model\PhieuXuatNhap();
                $DanhMuc->Delete($Id);
                new \Model\Error(\Model\Error::success, "Đã Xóa Danh Mục");
            }
        } catch (\Exception $ex) {
            new \Model\Error(\Model\Error::danger, $ex->getMessage());
        }
        \Model\Common::ToUrl("/index.php?module=quanlythuoc&controller=phieuxuatnhap&action=index");
    }
}