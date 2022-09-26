<?php

namespace Module\benhnhan\Controller;

use Model\Common;
use Module\benhnhan\Model\BenhNhan as ModelBenhNhan;
use Module\benhnhan\Model\BenhNhan\FormBenhNhan;
use Module\benhnhan\Permission;
use Model\OptionsService;
use Module\benhnhan\Model\BenhNhan;

class index extends \Application implements \Controller\IControllerBE
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

    function export()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy]);
        $benhnhan = new BenhNhan();
        $item = $benhnhan->GetDSBenhNhanExport();
        // var_dump($item);
        // $data[] = ["BẢNG KÊ THUỐC PHÒNG KHÁM PHƯƠNG UYÊN"];
        $data[] = [
            "Mã bệnh nhân", "Tên bệnh nhân", "Giới tính", "Ngày sinh", "CMND/CCCD", "Số điện thoại", "Địa chỉ", "Tỉnh/thành Phố", "Quận/huyện", "Phưỡng/xã"
        ];
        if ($item) {
            foreach ($item as $row) {
                $row["Gioitinh"] = $benhnhan->Gioitinh();
                $row["Ngaysinh"] = Common::ForMatDMY($row["Ngaysinh"]);
                // $row["TinhThanh"] = $row["TinhThanh"];
                // $row["QuanHuyen"] = Common::ViewNumber($row["SLNhap"]);
                // $row["PhuongXa"] = Common::ViewNumber($row["SLHienTai"]);
                $data[] = $row;
            }
            \Module\quanlythuoc\Model\SanPham::ExportBangKe($data, "public/Excel/ExportDanhSachBenhNhan.xlsx");
        }
    }

    function index()
    {

        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_BenhNhan_DS]);
        $modelItem = new ModelBenhNhan();
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
        // var_dump($data);
        $this->View($data);
    }

    function detail()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_BenhNhan_Detail]);

        try {
            if (\Model\Request::Post(FormBenhNhan::$ElementsName, null)) {

                $itemHtml = \Model\Request::Post(FormBenhNhan::$ElementsName, null);
                $model["Id"] = $_GET['id'];
                $model["Name"] = $itemHtml["Name"];
                $model["Gioitinh"] = $itemHtml["Gioitinh"];
                $model["Ngaysinh"] = $itemHtml["Ngaysinh"];
                $model["CMND"] = $itemHtml["CMND"];
                $model["Address"] = $itemHtml["Address"];
                $model["TinhThanh"] = $itemHtml["TinhThanh"];
                $model["QuanHuyen"] = $itemHtml["QuanHuyen"];
                $model["PhuongXa"] = $itemHtml["PhuongXa"];
                $model["Phone"] = $itemHtml["Phone"];
                $model["UpdateRecord"] = date("Y-m-d H:i:s", time());
                // phpinfo();
                $benhnhan = new ModelBenhNhan();
                $benhnhan->Put($model);
                new \Model\Error(\Model\Error::success, "Đã cập nhật thông tin khách hàng");
                // \Model\Common::ToUrl("/index.php?module=quanlythuoc&controller=danhmuc&action=index");
            }
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }
        $id = \Model\Request::Get("id", null);
        if ($id == null) {
        }
        $DM = new ModelBenhNhan();
        $data["data"] = $DM->GetById($id);
        $this->View($data);
    }

    /**
     *
     * @return mixed
     */
    function post()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_BenhNhan_Post]);
        try {
            if (\Model\Request::Post(FormBenhNhan::$ElementsName, null)) {
                $op = new OptionsService();
                $nameGioiTinh = $op->GetGroupsToSelect("gioitinh");

                $itemForm = \Model\Request::Post(FormBenhNhan::$ElementsName, null);
                $itemForm["Id"] = $itemForm["Id"];
                $itemForm["Name"] = $itemForm["Name"];
                $itemForm["Gioitinh"] = $itemForm["Gioitinh"];
                $itemForm["Ngaysinh"] = $itemForm["Ngaysinh"];
                $itemForm["CMND"] = $itemForm["CMND"];
                $itemForm["Address"] = $itemForm["Address"];
                $itemForm["TinhThanh"] = $itemForm["TinhThanh"];
                $itemForm["QuanHuyen"] = $itemForm["QuanHuyen"];
                $itemForm["PhuongXa"] = $itemForm["PhuongXa"];
                $itemForm["Phone"] = $itemForm["Phone"];
                $benhnhan = new ModelBenhNhan();
                $benhnhan->Post($itemForm);
                new \Model\Error(\Model\Error::success, "Thêm Thông Tin Khách Hàng Thành Công");
                \Model\Common::ToUrl("/index.php?module=benhnhan&controller=index&action=index");
                
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
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_BenhNhan_Put]);

        try {
            if (\Model\Request::Post(FormBenhNhan::$ElementsName, null)) {

                $itemHtml = \Model\Request::Post(FormBenhNhan::$ElementsName, null);

                // $op = new OptionsService();
                // $nameGioiTinh = $op->GetGroupsToSelect("gioitinh");
                
                // $model["GhiChu"] = strip_tags($itemHtml["GhiChu"]);
                $model["Id"] = $itemHtml["Id"];
                $model["Name"] = $itemHtml["Name"];
                $model["Gioitinh"] = $itemHtml["Gioitinh"];
                $model["Ngaysinh"] = $itemHtml["Ngaysinh"];
                $model["CMND"] = $itemHtml["CMND"];
                $model["Address"] = $itemHtml["Address"];
                $model["TinhThanh"] = $itemHtml["TinhThanh"];
                $model["QuanHuyen"] = $itemHtml["QuanHuyen"];
                $model["PhuongXa"] = $itemHtml["PhuongXa"];
                $model["UpdateRecord"] = date("Y-m-d H:i:s", time());
                $model["Phone"] = $itemHtml["Phone"];
                $benhnhan = new ModelBenhNhan();
                $benhnhan->Put($model);
                new \Model\Error(\Model\Error::success, "Đã Sửa Thông Tin");
                // \Model\Common::ToUrl("/index.php?module=quanlythuoc&controller=danhmuc&action=index");
            }
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }

        $id = \Model\Request::Get("id", null);
        if ($id == null) {
        }
        $DM = new ModelBenhNhan();
        $data["data"] = $DM->GetById($id);
        $this->View($data);
    }


    public function delete()
    {
        try {
            \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_BenhNhan_Delete]);
            $Id = \Model\Request::Get("id", null);
            if ($Id) {
                $DanhMuc = new ModelBenhNhan();
                $DanhMuc->Delete($Id);
                new \Model\Error(\Model\Error::success, "Đã Xóa Danh Mục");
            }
        } catch (\Exception $ex) {
            new \Model\Error(\Model\Error::danger, $ex->getMessage());
        }
        \Model\Common::ToUrl("/index.php?module=benhnhan&controller=index&action=index");
    }

    public function isdelete()
    {
        if (\Model\Request::Get("id", [])) {
            $DSMaBenhNhan = \Model\Request::Get("id", []);
            $modelItem = new ModelBenhNhan();
            $modelItem->isDelete([$DSMaBenhNhan]);
        }
        if (\Model\Request::Post("SanPham", [])) {
            $DSMaBenhNhan = \Model\Request::Post("SanPham", []);
            $DSMaBenhNhan = array_keys($DSMaBenhNhan);
            $modelItem = new ModelBenhNhan();
            $modelItem->isDelete($DSMaBenhNhan);
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
