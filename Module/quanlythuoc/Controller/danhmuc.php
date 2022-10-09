<?php

namespace Module\quanlythuoc\Controller;

use Model\Common;
use Module\quanlythuoc\Model\DanhMuc as ModelDanhMuc;
use Module\quanlythuoc\Model\DanhMuc\FormDanhMuc;
use Module\quanlythuoc\Permission;


class danhmuc extends \Application implements \Controller\IControllerBE
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

        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DanhMuc_DS]);
        $modelItem = new ModelDanhMuc();
        $params["idDM"] = isset($_REQUEST["idDM"]) ? \Model\Common::TextInput($_REQUEST["idDM"]) : "";
        $params["name"] = isset($_REQUEST["name"]) ? \Model\Common::TextInput($_REQUEST["name"]) : "";
        $params["link"] = isset($_REQUEST["link"]) ? \Model\Common::TextInput($_REQUEST["link"]) : "";
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
    function post()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DanhMuc_Post]);
        try {
            if (\Model\Request::Post(FormDanhMuc::$ElementsName, null)) {
                $itemForm = \Model\Request::Post(FormDanhMuc::$ElementsName, null);
                $itemForm["Id"] = $itemForm["Id"];
                $itemForm["Name"] = $itemForm["Name"];
                $itemForm["Link"] = $itemForm["Link"] ? Common::getslug($itemForm["Link"]) : Common::getslug($itemForm["Name"]);
                $itemForm["GhiChu"] = $itemForm["GhiChu"];

                $danhmuc = new ModelDanhMuc();
                $danhmuc->Post($itemForm);
                new \Model\Error(\Model\Error::success, "Thêm danh mục thuốc thành công");
                // \Model\Common::ToUrl("/index.php?module=quanlythuoc&controller=danhmuc&action=put&id=" . $itemForm["Code"]);
                \Model\Common::ToUrl("/index.php?module=quanlythuoc&controller=danhmuc&action=index");
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
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DanhMuc_Put]);

        try {
            if (\Model\Request::Post(FormDanhMuc::$ElementsName, null)) {

                $itemHtml = \Model\Request::Post(FormDanhMuc::$ElementsName, null);

                $model["Id"] = $itemHtml["Id"];
                $model["Name"] = $itemHtml["Name"];
                $model["Link"] = $itemHtml["Link"];
                $model["GhiChu"] = strip_tags($itemHtml["GhiChu"]);

                $dm = new ModelDanhMuc();
                $dm->Put($model);
                new \Model\Error(\Model\Error::success, "Đã Sửa Danh Mục");
                // \Model\Common::ToUrl("/index.php?module=quanlythuoc&controller=danhmuc&action=index");
            }
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }

        $id = \Model\Request::Get("id", null);
        if ($id == null) {
        }
        $DM = new ModelDanhMuc();
        $data["data"] = $DM->GetById($id);
        $this->View($data);
    }


    public function delete()
    {
        try {
            \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DanhMuc_Delete]);
            $Id = \Model\Request::Get("id", null);
            if ($Id) {
                $DanhMuc = new ModelDanhMuc();
                $DanhMuc->Delete($Id);
                new \Model\Error(\Model\Error::success, "Đã Xóa Danh Mục");
            }
        } catch (\Exception $ex) {
            new \Model\Error(\Model\Error::danger, $ex->getMessage());
        }
        \Model\Common::ToUrl("/index.php?module=quanlythuoc&controller=danhmuc&action=index");
    }

    public function isdelete()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DanhMuc_Delete]);
        try {
            if (\Model\Request::Get("id", [])) {
                $DSMaDanhMuc = \Model\Request::Get("id", []);
                $modelDanhMuc = new ModelDanhMuc();
                $modelDanhMuc->isDelete([$DSMaDanhMuc]);
            }
            new \Model\Error(\Model\Error::success, "Xóa danh mục thuốc thành công");
        } catch (\Exception $exc) {
            new \Model\Error(\Model\Error::danger, $exc->getMessage());
        }
        \Model\Common::ToUrl($_SERVER["HTTP_REFERER"]);
    }

    function GetByName()
    {
    }

    function GetByNameBietDuoc()
    {
    }
}
