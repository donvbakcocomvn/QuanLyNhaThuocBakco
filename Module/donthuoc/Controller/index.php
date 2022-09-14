<?php

namespace Module\donthuoc\Controller;

use LengthException;
use Model\Common;
use Model\OptionsService;
use Module\cart\Model\DonHangChiTiet;
use Module\donthuoc\Model\DonThuoc;
use Module\donthuoc\Model\DonThuoc\FormDonThuoc;
use Module\donthuoc\Permission;
use Module\donthuoc\Model\DonThuocDetail;
use Module\quanlythuoc\Model\SanPham;

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

    function index()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DonThuoc_DS]);
        $modelItem = new DonThuoc();
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

    public function capnhatsoluong()
    {
        // var_dump($_POST);
        $data = json_decode(file_get_contents('php://input'), JSON_OBJECT_AS_ARRAY);
        // var_dump($data);
        $donthuocdetail = new DonThuocDetail();
        $thuoc = DonThuocDetail::DsThuoc()[$data["index"]];
  
        $thuoc["Sang"] = floatval($data["sang"]);
        $thuoc["Trua"] = floatval($data["trua"]);
        $thuoc["Chieu"] = floatval($data["chieu"]);
        $thuoc["SoNgaySDThuoc"] = $data["ngaydungthuoc"];
        // $thuoc["GhiChu"] = $data["Ghichu"];
        // var_dump($thuoc["Sang"]);
        // var_dump($thuoc["Trua"]);
        // var_dump($thuoc["Chieu"]);
        // die();
        $donthuocdetail->CapNhatThuoc($thuoc, $data["index"]);
        $thuoc = DonThuocDetail::DsThuoc()[$data["index"]];
        
        echo json_encode($thuoc, JSON_UNESCAPED_UNICODE);
    }

    public function capnhatngaydungthuoc()
    {
        $number = $this->getParams(0);
        $_SESSION["SoNgaySDThuoc"] = $number;
        $DsThuoc = DonThuocDetail::DsThuoc();
        $donthuocdetail = new DonThuocDetail();
        foreach ($DsThuoc as $key => $value) {
            if (isset($value["SoNgaySDThuoc"])) {
                $value["SoNgaySDThuoc"] = $number;
                $donthuocdetail->CapNhatThuoc($value, $key);
            }
        }
    }

    public function capnhatthuoc()
    {

        header('Content-Type: application/json; charset=utf-8');
        $id = $this->getParams(0);
        $index = $this->getParams(1);
        $donthuocdetail = new DonThuocDetail();
        $sanpham = new SanPham($id);
        // cap nhat don thuoc
        $_sanpham = $sanpham->GetById($id);
        // var_dump($_sanpham);
        $_sanpham["SoNgaySDThuoc"] = $_SESSION["SoNgaySDThuoc"] ?? 0;
        $result = $donthuocdetail->checkDsThuoc($_sanpham);
        if ($result == null) {
            echo json_encode(new DonThuocDetail());
            return;
        }
        $donthuocdetail->CapNhatThuoc($_sanpham, $index);
        // echo $sanpham->DonViTinh();
        echo json_encode(DonThuocDetail::DsThuoc()[$index], JSON_UNESCAPED_UNICODE);
    }

    public function getgiathuoc()
    {
        $donthuocdetail = new DonThuocDetail();
        $id = $this->getParams(0);
        $index = $this->getParams(1);
        $thuoc = DonThuocDetail::DsThuoc()[$index]["Id"];
        if ($thuoc == null) {
            echo json_encode(new DonThuocDetail());
            return;
        }
        $sanpham = new SanPham($thuoc);
        echo json_encode(DonThuocDetail::DsThuoc()[$index]);
        return;
    }

    /**
     *
     * @return mixed
     */
    function post()
    {
        // $isnew = \Model\Request::Get("isnew", null);
        // if ($isnew != null) {
        //     DonThuocDetail::ClearSession();
        // }
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DonThuoc_Post]);
        try {
            if (\Model\Request::Post(FormDonThuoc::$ElementsName, null)) {
                $itemForm = \Model\Request::Post(FormDonThuoc::$ElementsName, null);
                $donthuoc = new DonThuoc();

                $item["Id"] = $donthuoc->CreatId();
                $item["IdBenhNhan"] = $itemForm["IdBenhNhan"];
                $item["NameBN"] = $donthuoc->GetNameById($itemForm["IdBenhNhan"]);
                $item["Ngaysinh"] = Common::ForMatDMY($donthuoc->GetNgaySinhById($itemForm["IdBenhNhan"]));
                $item["Gioitinh"] = $donthuoc->GetGioiTinhById($itemForm["IdBenhNhan"]);
                // $item["ThoiGianKham"] = Common::ForMatDMY($itemForm["ThoiGianKham"]);
                $item["ChanDoanBenh"] = $itemForm["ChanDoanBenh"];
                $item["ThuocLoaiDon"] = $itemForm["ThuocLoaiDon"];
                $item["TongNgayDung"] = $itemForm["TongNgayDung"];
                $donthuoc->Post($item);
                // var_dump($item);
                foreach (DonThuocDetail::DsThuoc() as $mathuoc => $thuoc) {
                    $sp = new SanPham();
                    if (isset($thuoc["Id"]) == true) {
                        $itemDetail["IdDetail"] = DonThuocDetail::CreatIdDetail();
                        $itemDetail["IdDonThuoc"] = $item["Id"];
                        $itemDetail["IdThuoc"] = $thuoc["Id"];
                        $itemDetail["SoNgaySDThuoc"] = $thuoc["SoNgaySDThuoc"];
                        $itemDetail["DVT"] = $thuoc["DVTTitle"];
                        $itemDetail["SoLuong"] = $thuoc["Soluong"];
                        $itemDetail["CachDung"] = $sp->GetCDTById($thuoc["Id"]);
                        $itemDetail["Sang"] = $thuoc["Sang"];
                        $itemDetail["Trua"] = $thuoc["Trua"];
                        $itemDetail["Chieu"] = $thuoc["Chieu"];
                        $itemDetail["GiaBan"] = $thuoc["Giaban"];
                        $itemDetail["GhiChu"] = $thuoc["Ghichu"] ?? "";
                        $detail = new DonThuocDetail();
                        $detail->Post($itemDetail);
                        // var_dump($thuoc);
                    }
                    DonThuocDetail::ClearSession();
                }
                // new \Model\Error(\Model\Error::success, "Đã Thêm Toa Thuốc");
                // \Model\Common::ToUrl("/index.php?module=donthuoc&controller=index&action=index");
            }
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }
        $isnew = \Model\Request::Get("isnew", null);
        if ($isnew != null) {
            DonThuocDetail::ClearSession();
        }
        $this->View();
    }
    function put()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DonThuoc_Put]);
        try {
            if (\Model\Request::Post(FormDonThuoc::$ElementsName, null)) {
                $itemForm = \Model\Request::Post(FormDonThuoc::$ElementsName, null);
                $donthuoc = new DonThuoc();
                $item["Id"] = $_GET["id"]; // Lấy được Id đơn thuốc
                $a = $donthuoc->GetById($item["Id"]); // Lấy ra đơn thuốc theo Id
                // var_dump($a);
                $item["IdBenhNhan"] = $itemForm["IdBenhNhan"];
                $item["NameBN"] = $donthuoc->GetNameById($itemForm["IdBenhNhan"]);
                $item["Ngaysinh"] = Common::ForMatDMY($donthuoc->GetNgaySinhById($itemForm["IdBenhNhan"]));
                $item["Gioitinh"] = $donthuoc->GetGioiTinhById($itemForm["IdBenhNhan"]);
                $item["ChanDoanBenh"] = $itemForm["ChanDoanBenh"];
                $item["ThuocLoaiDon"] = $itemForm["ThuocLoaiDon"];
                $item["TongNgayDung"] = $itemForm["TongNgayDung"];
                $item["ThoiGianKham"] = $a["ThoiGianKham"];
                $donthuoc->Put($item);
                $detail = new DonThuocDetail();

                $detail->DeleteDetail($item["Id"]);
                // var_dump($item);
                foreach (DonThuocDetail::DsThuoc() as $mathuoc => $thuoc) {
                    $sp = new SanPham();
                    if (isset($thuoc["Id"]) == true) {
                        $itemDetail["IdDetail"] = DonThuocDetail::CreatIdDetail();
                        $itemDetail["IdDonThuoc"] = $item["Id"];
                        $itemDetail["IdThuoc"] = $thuoc["Id"];
                        $itemDetail["SoNgaySDThuoc"] = $thuoc["SoNgaySDThuoc"];
                        $itemDetail["DVT"] = $thuoc["DVTTitle"];
                        $itemDetail["SoLuong"] = $thuoc["Soluong"];
                        $itemDetail["CachDung"] = $sp->GetCDTById($thuoc["Id"]);
                        $itemDetail["Sang"] = $thuoc["Sang"];
                        $itemDetail["Trua"] = $thuoc["Trua"];
                        $itemDetail["Chieu"] = $thuoc["Chieu"];
                        $itemDetail["GiaBan"] = $thuoc["Giaban"];
                        $itemDetail["GhiChu"] = $thuoc["Ghichu"];
                        $detail = new DonThuocDetail();
                        $detail->Post($itemDetail);
                        // var_dump($thuoc);
                    }
                    DonThuocDetail::ClearSession();
                }
                new \Model\Error(\Model\Error::success, "Đã Sửa Toa Thuốc");
                \Model\Common::ToUrl("/index.php?module=donthuoc&controller=index&action=index");
            }
            // DonThuocDetail::ClearSession();
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }
        $id = \Model\Request::Get("id", null);
        if ($id == null) {
        }
        $DM = new DonThuoc();
        $data["donthuoc"] = $DM->GetById($id);
        DonThuocDetail::setDsThuoc($id);
        $this->View($data);
    }


    function viewdonthuoc()
    {
        $id = \Model\Request::Get("id", null);
        if ($id == null) {
        }
        $DM = new DonThuoc();
        $data["donthuoc"] = $DM->GetById($id);
        DonThuocDetail::setDsThuoc($id);
        $this->View($data);
    }

    /**
     *
     * @return mixed
     */
    function copy()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DonThuoc_Put]);

        try {
            if (\Model\Request::Post(FormDonThuoc::$ElementsName, null)) {
                $itemForm = \Model\Request::Post(FormDonThuoc::$ElementsName, null);
                $donthuoc = new DonThuoc();
                $item["Id"] = $donthuoc->CreatId();
                $item["IdBenhNhan"] = $itemForm["IdBenhNhan"];
                $item["NameBN"] = $donthuoc->GetNameById($itemForm["IdBenhNhan"]);
                $item["Ngaysinh"] = Common::ForMatDMY($donthuoc->GetNgaySinhById($itemForm["IdBenhNhan"]));
                // $item["ThoiGianKham"] = Common::ForMatDMY($itemForm["ThoiGianKham"]);
                $item["Gioitinh"] = $donthuoc->GetGioiTinhById($itemForm["IdBenhNhan"]);
                $item["ChanDoanBenh"] = $itemForm["ChanDoanBenh"];
                $item["ThuocLoaiDon"] = $itemForm["ThuocLoaiDon"];
                $item["TongNgayDung"] = $itemForm["TongNgayDung"];
                $donthuoc->Post($item);
                // var_dump($item);
                foreach (DonThuocDetail::DsThuoc() as $mathuoc => $thuoc) {
                    $sp = new SanPham();
                    if (isset($thuoc["Id"]) == true) {
                        $itemDetail["IdDetail"] = DonThuocDetail::CreatIdDetail();
                        $itemDetail["IdDonThuoc"] = $item["Id"];
                        $itemDetail["IdThuoc"] = $thuoc["Id"];
                        $itemDetail["SoNgaySDThuoc"] = $thuoc["SoNgaySDThuoc"];
                        $itemDetail["DVT"] = $thuoc["DVTTitle"];
                        $itemDetail["SoLuong"] = $thuoc["Soluong"];
                        $itemDetail["CachDung"] = $sp->GetCDTById($thuoc["Id"]);
                        $itemDetail["Sang"] = $thuoc["Sang"];
                        $itemDetail["Trua"] = $thuoc["Trua"];
                        $itemDetail["Chieu"] = $thuoc["Chieu"];
                        $itemDetail["GiaBan"] = $thuoc["Giaban"];
                        $itemDetail["GhiChu"] = $thuoc["Ghichu"] ?? "";
                        $detail = new DonThuocDetail();
                        $detail->Post($itemDetail);
                        // var_dump($thuoc);
                    }
                    DonThuocDetail::ClearSession();
                }
                new \Model\Error(\Model\Error::success, "Copy Đơn Thuốc Thành Công");
                $idToaThuoc = $_GET['id'];
                $IdBn = $donthuoc->GetIdBnById($idToaThuoc);
                \Model\Common::ToUrl("/index.php?module=benhnhan&controller=index&action=detail&id=$IdBn");
            }
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }

        $id = \Model\Request::Get("id", null);
        if ($id == null) {
        }
        $DM = new DonThuoc();
        $data["donthuoc"] = $DM->GetById($id);
        DonThuocDetail::setDsThuoc($id);
        $this->View($data);
    }


    public function delete()
    {
        try {
            \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy]);
            $Id = \Model\Request::Get("id", null);
            if ($Id) {
                $donthuoc = new DonThuoc();
                $donthuoc->Delete($Id);
                $donthuocdetail = new DonThuocDetail();
                $donthuocdetail->DeleteDetail($Id);
                new \Model\Error(\Model\Error::success, "Đã Xóa Đơn Thuốc");
            }
        } catch (\Exception $ex) {
            new \Model\Error(\Model\Error::danger, $ex->getMessage());
        }
        \Model\Common::ToUrl("/index.php?module=donthuoc&controller=index&action=index");
    }
}
