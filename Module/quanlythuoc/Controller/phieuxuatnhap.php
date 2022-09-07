<?php

namespace Module\quanlythuoc\Controller;

use Model\Common;
use Module\quanlythuoc\Model\PhieuXuatNhap\FormPhieuXuatNhap;
use Module\quanlythuoc\Permission;


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
        $id = \Model\Request::Get("id", null);
        if ($id == null) {
        }
        $SP = new \Module\quanlythuoc\Model\PhieuXuatNhap();
        $data["data"] = $SP->GetById($id);
        $this->View($data);
    }

    function post()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_Phieu_Post]);
        try {
            if (\Model\Request::Post(FormPhieuXuatNhap::$ElementsName, null)) {
                $itemForm = \Model\Request::Post(FormPhieuXuatNhap::$ElementsName, null);
                $phieu = new \Module\quanlythuoc\Model\PhieuXuatNhap();
                $itemForm["IdPhieu"] = $phieu->CreatIdPhieu($itemForm["IdPhieu"]);
                $itemForm["IdThuoc"] = $itemForm["IdThuoc"];
                $itemForm["SoLuong"] = $itemForm["SoLuong"];
                $itemForm["SoLo"] = $itemForm["SoLo"];
                $itemForm["NhaSanXuat"] = $itemForm["NhaSanXuat"];
                $itemForm["NuocSanXuat"] = $itemForm["NuocSanXuat"];
                $itemForm["Price"] = $itemForm["Price"];
                $itemForm["XuatNhap"] = $itemForm["XuatNhap"];
                $itemForm["NoiDungPhieu"] = $itemForm["NoiDungPhieu"];
                $itemForm["GhiChu"] = $itemForm["GhiChu"];
                $itemForm["NgayNhap"] = Date("Y-m-d", strtotime($itemForm["NgayNhap"]));
                $phieu->Post($itemForm);
                new \Model\Error(\Model\Error::success, "Đã Thêm Phiếu");
                \Model\Common::ToUrl("/index.php?module=quanlythuoc&controller=phieuxuatnhap&action=index");

            }
        } catch (\Exception $exc) {
            echo $exc->getMessage();
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
                $itemForm["Price"] = $itemHtml["Price"];
                $itemForm["XuatNhap"] = $itemHtml["XuatNhap"];
                $itemForm["NoiDungPhieu"] = $itemHtml["NoiDungPhieu"];
                $itemForm["GhiChu"] = $itemHtml["GhiChu"];
                $itemForm["NgayNhap"] = $itemHtml["NgayNhap"];
                $phieu->Put($itemForm);
                // new \Model\Error(\Model\Error::success, "Đã Sửa Phiếu");
                // \Model\Common::ToUrl("/index.php?module=quanlythuoc&controller=danhmuc&action=index");
            }
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }

        $id = \Model\Request::Get("id", null);
        if ($id == null) {
        }
        $DM = new \Module\quanlythuoc\Model\PhieuXuatNhap();
        $data["data"] = $DM->GetById($id);
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
