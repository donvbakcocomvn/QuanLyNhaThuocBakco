<?php

namespace Module\donthuoc\Controller;

use LengthException;
use Model\Common;
use Model\FormRender;
use Model\OptionsService;
use Module\benhnhan\Model\BenhNhan;
use Module\benhnhan\Model\BenhNhan\FormBenhNhan;
use Module\cart\Model\DonHangChiTiet;
use Module\donthuoc\Model\DonThuoc;
use Module\donthuoc\Model\DonThuoc\FormDonThuoc;
use Module\donthuoc\Permission;
use Module\donthuoc\Model\DonThuocDetail;
use Module\quanlythuoc\Model\PhieuXuatNhap;
use Module\quanlythuoc\Model\PhieuXuatNhapChiTiet;
use Module\quanlythuoc\Model\SanPham;
use PhpOffice\PhpSpreadsheet\Exception;
use Model\Error;

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

    function soanthuoc()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy]);
        try {
            $idDonThuoc = \Model\Request::Get("id", null);
            $donthuoc = new DonThuoc($idDonThuoc);
            $ModelDonThuoc["Id"] = $donthuoc->Id;
            $ModelDonThuoc["Status"] = 2;
            $dt = new DonThuoc();
            $dt->Put($ModelDonThuoc);
            new \Model\Error(\Model\Error::success, "Chuyển sang trạng thái soạn thuốc");
            $itemDonThuoc = new DonThuoc($ModelDonThuoc["Id"]);
            \Model\Common::ToUrl("/donthuoc/index/viewdonthuoc/?id=" . $itemDonThuoc->Id . "");
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }
    }

    function giaothuoc()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy]);
        try {
            $idDonThuoc = \Model\Request::Get("id", null);
            $donthuoc = new DonThuoc($idDonThuoc);
            $ModelDonThuoc["Id"] = $donthuoc->Id;
            $ModelDonThuoc["Status"] = 3;
            $dt = new DonThuoc();
            $dt->Put($ModelDonThuoc);
            new \Model\Error(\Model\Error::success, "Hoàn thành việc soạn thuốc");
            $itemDonThuoc = new DonThuoc($ModelDonThuoc["Id"]);
            // \Model\Common::ToUrl("/donthuoc/index/viewdonthuoc/?id=" . $itemDonThuoc->Id . "");
            \Model\Common::ToUrl("/donthuoc/index/donchuaxuly/");
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }
    }

    public function themdong()
    {
        $_SESSION["DetailThuoc"][] = [];
        return $_SESSION["DetailThuoc"];
    }

    function DeleteSP()
    {
        $index = $this->getParams(0);
        unset($_SESSION["DetailThuoc"][$index]);
        return $_SESSION["DetailThuoc"];
    }

    function index()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DonThuoc_DS]);
        $modelItem = new DonThuoc();
        $params["keyword"] = isset($_REQUEST["keyword"]) ? \Model\Common::TextInput($_REQUEST["keyword"]) : "";
        $params["fromdate"] = isset($_REQUEST["fromdate"]) && $_REQUEST["fromdate"] != null ? date('Y-m-d H:i:s', strtotime($_REQUEST["fromdate"])) : "";
        $params["todate"] = isset($_REQUEST["todate"]) && $_REQUEST["todate"] != null ? date('Y-m-d H:i:s', strtotime($_REQUEST["todate"])) : "";
        $params["status"] = isset($_REQUEST["status"]) ? \Model\Common::TextInput($_REQUEST["status"]) : "";
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

    function export()
    {
    }

    function donthuoctrongngay()
    {
        $modelItem = new \Model\ThongKe();
        $params["id"] = isset($_REQUEST["id"]) ? \Model\Common::TextInput($_REQUEST["id"]) : "";
        $params["status"] = isset($_REQUEST["status"]) ? \Model\Common::TextInput($_REQUEST["status"]) : "";
        $params["nameBN"] = isset($_REQUEST["nameBN"]) ? \Model\Common::TextInput($_REQUEST["nameBN"]) : "";
        $params["indate"] = isset($_REQUEST["indate"]) ? date('Y-m-d', strtotime($_REQUEST["indate"])) : date('Y-m-d', time());
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachTaiKhoan = $modelItem->GetDonThuocTrongNgay($params, $indexPage, $pageNumber, $total);
        $data["items"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;
        $this->View($data);
    }

    function donchuaxuly()
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
        $DanhSachTaiKhoan = $modelItem->GetDonChuaXuLy($params, $indexPage, $pageNumber, $total);
        $data["items"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;
        $this->View($data);
    }

    function dondangxuly()
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
        $DanhSachTaiKhoan = $modelItem->GetDonDangXuLy($params, $indexPage, $pageNumber, $total);
        $data["items"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;
        $this->View($data);
    }

    function dondaxuly()
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
        $DanhSachTaiKhoan = $modelItem->GetDonDaXuLy($params, $indexPage, $pageNumber, $total);
        $data["items"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;
        $this->View($data);
    }

    function doncodinh()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DonThuoc_DS]);
        $modelItem = new DonThuoc();
        $params["nameBN"] = isset($_REQUEST["nameBN"]) ? \Model\Common::TextInput($_REQUEST["nameBN"]) : "";
        $params["gioitinh"] = isset($_REQUEST["gioitinh"]) ? \Model\Common::TextInput($_REQUEST["gioitinh"]) : "";
        $params["address"] = isset($_REQUEST["address"]) ? \Model\Common::TextInput($_REQUEST["address"]) : "";
        $params["phone"] = isset($_REQUEST["phone"]) ? \Model\Common::TextInput($_REQUEST["phone"]) : "";
        $params["chandoan"] = isset($_REQUEST["chandoan"]) ? \Model\Common::TextInput($_REQUEST["chandoan"]) : "";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachTaiKhoan = $modelItem->GetDonCoDinh($params, $indexPage, $pageNumber, $total);
        $data["items"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;
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
        $result = $donthuocdetail->CapNhatThuoc($thuoc, $data["index"]);
        if ($result == false) {
            echo json_encode(null, JSON_UNESCAPED_UNICODE);
            return;
        }
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
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DonThuoc_Post]);
        try {
            if (\Model\Request::Post(FormDonThuoc::$ElementsName, null) && \Model\Request::Post(FormBenhNhan::$ElementsName, null)) {

                if (DonThuocDetail::DsThuoc() == false) {
                    throw new Exception("Chưa có thuốc.");
                }
                $benhnhan = new BenhNhan();
                $itemBenhNhan = \Model\Request::Post(FormBenhNhan::$ElementsName, null);
                $itemBN["Id"] = $benhnhan->CreatId();
                $itemBN["Name"] = $itemBenhNhan["Name"];
                $itemBN["Gioitinh"] = $itemBenhNhan["Gioitinh"];
                $ngay = intval($itemBenhNhan["NgaySinh"]) ? intval($itemBenhNhan["NgaySinh"]) : 1;
                // $ngay = max($ngay, 1);
                // $ngay = min($ngay, 31);
                $thang = intval($itemBenhNhan["ThangSinh"]) ? intval($itemBenhNhan["ThangSinh"]) : 1;
                // $thang = max($thang, 1);
                // $thang = min($thang, 12);
                $nam = intval($itemBenhNhan["NamSinh"]) ?? date('Y');
                // $nam = max($nam, 1);
                // $nam = min($nam, date('Y'));
                $itemBN["Ngaysinh"] = date('Y-m-d', strtotime($nam . '-' . $thang . '-' . $ngay));
                $itemBN["CMND"] = $itemBenhNhan["CMND"];
                $itemBN["Address"] = $itemBenhNhan["Address"];
                $itemBN["TinhThanh"] = $itemBenhNhan["TinhThanh"] ?? '';
                $itemBN["QuanHuyen"] = $itemBenhNhan["QuanHuyen"] ?? '';
                $itemBN["PhuongXa"] = $itemBenhNhan["PhuongXa"] ?? '';
                $itemBN["Phone"] = $itemBenhNhan["Phone"];
                $benhnhan->Post($itemBN);

                $itemForm = \Model\Request::Post(FormDonThuoc::$ElementsName, null);
                $donthuoc = new DonThuoc();
                $itemDonThuoc["Id"] = $donthuoc->CreatId();
                $itemDonThuoc["IdBenhNhan"] = $itemBN["Id"];
                $itemDonThuoc["NameBN"] = $itemBN["Name"];
                $itemDonThuoc["Ngaysinh"] = $itemBN["Ngaysinh"];
                $itemDonThuoc["Gioitinh"] = $itemBN["Gioitinh"];
                $itemDonThuoc["ChanDoanBenh"] = $itemForm["ChanDoanBenh"];
                $itemDonThuoc["ThuocLoaiDon"] = $itemForm["ThuocLoaiDon"];
                $itemDonThuoc["TongNgayDung"] = $itemForm["TongNgayDung"];
                $itemDonThuoc["Status"] = 1;
                $donthuoc->Post($itemDonThuoc);

                $sum = 0;
                foreach (DonThuocDetail::DsThuoc() as $mathuoc => $thuoc) {
                    $sp = new SanPham();
                    if (isset($thuoc["Id"]) == true) {
                        $idThuoc = $thuoc["Id"];
                        $itemDetail["IdDetail"] = DonThuocDetail::CreatIdDetail();
                        $itemDetail["IdDonThuoc"] = $itemDonThuoc["Id"];
                        $itemDetail["IdThuoc"] = $idThuoc;
                        $itemDetail["SoNgaySDThuoc"] = $thuoc["SoNgaySDThuoc"];
                        $itemDetail["DVT"] = $thuoc["DVTTitle"];
                        $itemDetail["SoLuong"] = $thuoc["Soluong"];
                        $itemDetail["CachDung"] = $sp->GetCDTById($thuoc["Id"]);
                        $itemDetail["Sang"] = $thuoc["Sang"];
                        $itemDetail["Trua"] = $thuoc["Trua"];
                        $itemDetail["Chieu"] = $thuoc["Chieu"];
                        $itemDetail["GiaBan"] = $thuoc["Giaban"];
                        $itemDetail["GhiChu"] = $thuoc["Ghichu"] ?? "";
                        $sum += $itemDetail['SoLuong'] * $itemDetail['GiaBan'];
                        $detail = new DonThuocDetail();
                        $detail->Post($itemDetail);
                    }
                }
                $phieu = new PhieuXuatNhap();
                if ($itemDonThuoc["ThuocLoaiDon"] == 3) {
                    $Phieu["TongTien"] = $sum;
                    $Phieu["DoViCungCap"] = "";
                    $Phieu["IdPhieu"] = $phieu->getIdPhieu();
                    $Phieu["IdDonThuoc"] = $itemDonThuoc["Id"];
                    $Phieu["XuatNhap"] = -1;
                    $Phieu["NoiDungPhieu"] = "Đơn thuốc " . $itemDonThuoc['ChanDoanBenh'] . " của " . $itemDonThuoc["NameBN"];
                    $Phieu["GhiChu"] = "Đơn thuốc " . $itemDonThuoc['ChanDoanBenh'] . " của " . $itemDonThuoc["NameBN"];
                    $Phieu["NgayNhap"] = Date("Y-m-d H:i:s", time());
                    $Phieu["CreateRecord"] = Date("Y-m-d H:i:s", time());
                    $Phieu["UpdateRecord"] = Date("Y-m-d H:i:s", time());
                    $Phieu["IsDelete"] = 0;
                    $phieuXuatNhap = new \Module\quanlythuoc\Model\PhieuXuatNhap();
                    $phieuXuatNhap->Post($Phieu);
                    foreach (DonThuocDetail::DsThuoc() as $mathuoc => $thuoc) {
                        if (isset($thuoc["Id"]) == true) {
                            $idThuoc = $thuoc["Id"];
                            $itemFormDetail["IdPhieu"] = $Phieu["IdPhieu"];
                            $itemFormDetail["IdThuoc"] = $idThuoc;
                            $itemFormDetail["SoLuong"] = $thuoc["Soluong"];
                            $itemFormDetail["NhaSanXuat"] = "";
                            $itemFormDetail["SoLo"] = $thuoc["SoLo"] ?? "";
                            $itemFormDetail["NuocSanXuat"] = "";
                            $itemFormDetail["Price"] = $itemDetail["GiaBan"];
                            $itemFormDetail["XuatNhap"] = -1;
                            $itemFormDetail["CreateRecord"] = Date("Y-m-d H:i:s", time());
                            $itemFormDetail["UpdateRecord"] = Date("Y-m-d H:i:s", time());
                            $itemFormDetail["GhiChu"] = $itemDetail["GhiChu"];
                            $itemFormDetail["IsDelete"] = 0;
                            $SanPham = new \Module\quanlythuoc\Model\PhieuXuatNhapChiTiet();
                            $SanPham->Post($itemFormDetail);
                            $sp = new SanPham();
                            $sp->DongBoThuocNhapByID($idThuoc);
                        }
                    }
                }
                DonThuocDetail::ClearSession();
                new \Model\Error(\Model\Error::success, "Đã Thêm Toa Thuốc");
                $donthuoc = new DonThuoc($itemDonThuoc["Id"]);
                \Model\Common::ToUrl("/donthuoc/index/viewdonthuoc/?id=" . $donthuoc->Id . "");
            }
        } catch (\Exception $exc) {
            new Error(Error::danger, $exc->getMessage());
        }
        $isnew = \Model\Request::Get("isnew", null);
        if ($isnew != null) {
            DonThuocDetail::ClearSession();
            FormBenhNhan::SetFormData([]);
            Common::ToUrl('/index.php?module=donthuoc&controller=index&action=post');
        }
        $this->View();
    }

    public function saveFormKhachHang()
    {
        $benhNhan = $_POST['BenhNhan'];
        $donThuoc = $_POST['DonThuoc'];
        FormDonThuoc::SetFormData($donThuoc);
        FormBenhNhan::SetFormData($benhNhan);
        echo json_encode($_POST);
    }
    // Call API
    public function timkhachhang()
    {

        $benhNhan = $_POST['BenhNhan'];

        $name = $benhNhan["Name"];
        $phone = $benhNhan['Phone'];
        $bn = new BenhNhan();
        $a = $bn->GetByNameAndPhone($name, "");
        if ($a != null) {
            $a["NamSinh"] = date("Y", strtotime($a["Ngaysinh"]));
            $a["NgaySinh"] = date("d", strtotime($a["Ngaysinh"]));
            $a["ThangSinh"] = date("m", strtotime($a["Ngaysinh"]));
            FormBenhNhan::SetFormData($a);
        } else {
            FormBenhNhan::SetFormData($benhNhan);
        }

        echo json_encode($_POST);
    }
    function put()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DonThuoc_Put]);
        try {
            if (\Model\Request::Post(FormDonThuoc::$ElementsName, null) && \Model\Request::Post(FormBenhNhan::$ElementsName, null)) {
                $idphieu = \Model\Request::Get("id", null);
                $donthuoc = new DonThuoc($idphieu);

                $benhnhan = new BenhNhan($donthuoc->IdBenhNhan);
                $itemBenhNhan = \Model\Request::Post(FormBenhNhan::$ElementsName, null);
                $itemBN["Id"] = $benhnhan->Id;
                $itemBN["Name"] = $itemBenhNhan["Name"];
                $itemBN["Gioitinh"] = $itemBenhNhan["Gioitinh"];
                $ngay = intval($itemBenhNhan["NgaySinh"]) ? intval($itemBenhNhan["NgaySinh"]) : 1;
                $thang = intval($itemBenhNhan["ThangSinh"]) ? intval($itemBenhNhan["ThangSinh"]) : 1;
                $nam = intval($itemBenhNhan["NamSinh"]) ?? date('Y');
                $itemBN["Ngaysinh"] = date('Y-m-d', strtotime($nam . '-' . $thang . '-' . $ngay));
                $itemBN["CMND"] = $itemBenhNhan["CMND"];
                $itemBN["Address"] = $itemBenhNhan["Address"];
                $itemBN["TinhThanh"] = $itemBenhNhan["TinhThanh"] ?? '';
                $itemBN["QuanHuyen"] = $itemBenhNhan["QuanHuyen"] ?? '';
                $itemBN["PhuongXa"] = $itemBenhNhan["PhuongXa"] ?? '';
                $itemBN["Phone"] = $itemBenhNhan["Phone"];
                $benhnhan->Put($itemBN);

                $itemForm = \Model\Request::Post(FormDonThuoc::$ElementsName, null);
                $itemDonThuoc["Id"] = $donthuoc->Id;
                $itemDonThuoc["IdBenhNhan"] = $itemBN["Id"];
                $itemDonThuoc["NameBN"] = $itemBN["Name"];
                $itemDonThuoc["Ngaysinh"] = $itemBN["Ngaysinh"];
                $itemDonThuoc["Gioitinh"] = $itemBN["Gioitinh"];
                $itemDonThuoc["ChanDoanBenh"] = $itemForm["ChanDoanBenh"];
                $itemDonThuoc["ThuocLoaiDon"] = $itemForm["ThuocLoaiDon"];
                $itemDonThuoc["TongNgayDung"] = $itemForm["TongNgayDung"];
                $donthuocItem = new DonThuoc();
                $donthuocItem->Put($itemDonThuoc);
                $detail = new DonThuocDetail();
                $detail->DeleteDetail($donthuoc->Id);
                $sum = 0;
                foreach (DonThuocDetail::DsThuoc() as $mathuoc => $thuoc) {
                    $sp = new SanPham();
                    if (isset($thuoc["Id"]) == true) {
                        $idThuoc = $thuoc["Id"];
                        $itemDetail["IdDetail"] = DonThuocDetail::CreatIdDetail();
                        $itemDetail["IdDonThuoc"] = $itemDonThuoc["Id"];
                        $itemDetail["IdThuoc"] = $idThuoc;
                        $itemDetail["SoNgaySDThuoc"] = $thuoc["SoNgaySDThuoc"];
                        $itemDetail["DVT"] = $thuoc["DVTTitle"];
                        $itemDetail["SoLuong"] = $thuoc["Soluong"];
                        $itemDetail["CachDung"] = $sp->GetCDTById($thuoc["Id"]);
                        $itemDetail["Sang"] = $thuoc["Sang"];
                        $itemDetail["Trua"] = $thuoc["Trua"];
                        $itemDetail["Chieu"] = $thuoc["Chieu"];
                        $itemDetail["GiaBan"] = $thuoc["Giaban"];
                        $itemDetail["GhiChu"] = $thuoc["Ghichu"] ?? "";
                        $sum += $itemDetail['SoLuong'] * $itemDetail['GiaBan'];
                        $detail = new DonThuocDetail();
                        $detail->Post($itemDetail);
                    }
                }

                // Xóa phiếu xuất nhập
                $phieu = new PhieuXuatNhap();
                $phieuXuatNhap = $phieu->GetByIdDonThuoc($idphieu);
                $idphieuXuatNhap = $phieuXuatNhap["IdPhieu"];
                $phieu->DeleteByIdPhieu($idphieuXuatNhap);

                // Xóa phiếu xuất nhập chi tiết
                $phieuDetail = new PhieuXuatNhapChiTiet();
                $phieuDetailXuatNhap = $phieuDetail->GetByIdPhieu($idphieuXuatNhap);
                $phieuDetail->DeleteByIdPhieu($idphieuXuatNhap);
                // foreach ($phieuDetailXuatNhap as $key => $row) {
                //     echo $row['IdThuoc'] = $row['IdThuoc'];
                // }
                if ($itemDonThuoc["ThuocLoaiDon"] == 3) {
                    $Phieu["TongTien"] = $sum;
                    $Phieu["DoViCungCap"] = "";
                    $Phieu["IdPhieu"] = $phieu->getIdPhieu();
                    $Phieu["IdDonThuoc"] = $itemDonThuoc["Id"];
                    $Phieu["XuatNhap"] = -1;
                    $Phieu["NoiDungPhieu"] = "Đơn thuốc " . $itemDonThuoc['ChanDoanBenh'] . " của " . $itemDonThuoc["NameBN"];
                    $Phieu["GhiChu"] = "Đơn thuốc " . $itemDonThuoc['ChanDoanBenh'] . " của " . $itemDonThuoc["NameBN"];
                    $Phieu["NgayNhap"] = Date("Y-m-d H:i:s", time());
                    $Phieu["CreateRecord"] = Date("Y-m-d H:i:s", time());
                    $Phieu["UpdateRecord"] = Date("Y-m-d H:i:s", time());
                    $Phieu["IsDelete"] = 0;
                    $phieuXuatNhap = new \Module\quanlythuoc\Model\PhieuXuatNhap();
                    $phieuXuatNhap->Post($Phieu);
                    foreach (DonThuocDetail::DsThuoc() as $mathuoc => $thuoc) {
                        if (isset($thuoc["Id"]) == true) {
                            $idThuoc = $thuoc["Id"];
                            $itemFormDetail["IdPhieu"] = $Phieu["IdPhieu"];
                            $itemFormDetail["IdThuoc"] = $idThuoc;
                            $itemFormDetail["SoLuong"] = $thuoc["Soluong"];
                            $itemFormDetail["NhaSanXuat"] = "";
                            $itemFormDetail["SoLo"] = $thuoc["SoLo"] ?? "";
                            $itemFormDetail["NuocSanXuat"] = "";
                            $itemFormDetail["Price"] = $itemDetail["GiaBan"];
                            $itemFormDetail["XuatNhap"] = -1;
                            $itemFormDetail["CreateRecord"] = Date("Y-m-d H:i:s", time());
                            $itemFormDetail["UpdateRecord"] = Date("Y-m-d H:i:s", time());
                            $itemFormDetail["GhiChu"] = $itemDetail["GhiChu"];
                            $itemFormDetail["IsDelete"] = 0;
                            $SanPham = new \Module\quanlythuoc\Model\PhieuXuatNhapChiTiet();
                            $SanPham->Post($itemFormDetail);
                            $sp = new SanPham();
                        }
                    }
                }
                foreach (DonThuocDetail::DsThuoc() as $mathuoc => $thuoc) {
                    $idThuoc = $thuoc["Id"];
                    $sp->DongBoThuocNhapByID($idThuoc);
                }
                DonThuocDetail::ClearSession();
                new \Model\Error(\Model\Error::success, "Đã Thêm Toa Thuốc");
                $donthuoc = new DonThuoc($itemDonThuoc["Id"]);
                \Model\Common::ToUrl("/donthuoc/index/viewdonthuoc/?id=" . $donthuoc->Id . "");
            }
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }
        $id = \Model\Request::Get("id", null);
        if ($id == null) {
        }
        $DM = new DonThuoc();
        $data["donthuoc"] = $DM->GetById($id);
        // var_dump($data["donthuoc"]);
        DonThuocDetail::setDsThuoc($id);
        $this->View($data);
    }


    function viewdonthuoc()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DonThuoc_Detail, Permission::QLT_DonThuoc_DS, Permission::QLT_DonThuoc_Post, Permission::QLT_DonThuoc_Put]);
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
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DonThuoc_Copy]);
        try {
            if (\Model\Request::Post(FormDonThuoc::$ElementsName, null) && \Model\Request::Post(FormBenhNhan::$ElementsName, null)) {
                $benhnhan = new BenhNhan();
                $itemBenhNhan = \Model\Request::Post(FormBenhNhan::$ElementsName, null);
                $itemBN["Id"] = $benhnhan->CreatId();
                $itemBN["Name"] = $itemBenhNhan["Name"];
                $itemBN["Gioitinh"] = $itemBenhNhan["Gioitinh"];
                $ngay = intval($itemBenhNhan["NgaySinh"]) ?? 1;
                $thang = intval($itemBenhNhan["ThangSinh"]) ?? 1;
                $nam = intval($itemBenhNhan["NamSinh"]) ?? date('Y');
                $itemBN["Ngaysinh"] = date('Y-m-d', strtotime($nam . '-' . $thang . '-' . $ngay));
                $itemBN["CMND"] = $itemBenhNhan["CMND"];
                $itemBN["Address"] = $itemBenhNhan["Address"];
                $itemBN["TinhThanh"] = $itemBenhNhan["TinhThanh"] ?? '';
                $itemBN["QuanHuyen"] = $itemBenhNhan["QuanHuyen"] ?? '';
                $itemBN["PhuongXa"] = $itemBenhNhan["PhuongXa"] ?? '';
                $itemBN["Phone"] = $itemBenhNhan["Phone"];
                $benhnhan->Post($itemBN);
                $donthuoc = new DonThuoc();
                $itemForm = \Model\Request::Post(FormDonThuoc::$ElementsName, null);
                $itemDonThuoc["Id"] = $donthuoc->CreatId();
                $itemDonThuoc["IdBenhNhan"] = $itemBN["Id"];
                $itemDonThuoc["NameBN"] = $itemBN["Name"];
                $itemDonThuoc["Ngaysinh"] = $itemBN["Ngaysinh"];
                $itemDonThuoc["Gioitinh"] = $itemBN["Gioitinh"];
                $itemDonThuoc["ChanDoanBenh"] = $itemForm["ChanDoanBenh"];
                $itemDonThuoc["ThuocLoaiDon"] = $itemForm["ThuocLoaiDon"];
                $itemDonThuoc["TongNgayDung"] = $itemForm["TongNgayDung"];
                $itemDonThuoc["Status"] = 1;
                $donthuoc->Post($itemDonThuoc);
                $detail = new DonThuocDetail();
                $iddonthuoc = \Model\Request::Get("id", null);
                $DonThuocModel = new DonThuoc($iddonthuoc);
                $detail->DeleteDetail($DonThuocModel->Id);
                $sum = 0;
                foreach (DonThuocDetail::DsThuoc() as $mathuoc => $thuoc) {
                    $sp = new SanPham();
                    if (isset($thuoc["Id"]) == true) {
                        $idThuoc = $thuoc["Id"];
                        $itemDetail["IdDetail"] = DonThuocDetail::CreatIdDetail();
                        $itemDetail["IdDonThuoc"] = $itemDonThuoc["Id"];
                        $itemDetail["IdThuoc"] = $idThuoc;
                        $itemDetail["SoNgaySDThuoc"] = $thuoc["SoNgaySDThuoc"];
                        $itemDetail["DVT"] = $thuoc["DVTTitle"];
                        $itemDetail["SoLuong"] = $thuoc["Soluong"];
                        $itemDetail["CachDung"] = $sp->GetCDTById($thuoc["Id"]);
                        $itemDetail["Sang"] = $thuoc["Sang"];
                        $itemDetail["Trua"] = $thuoc["Trua"];
                        $itemDetail["Chieu"] = $thuoc["Chieu"];
                        $itemDetail["GiaBan"] = $thuoc["Giaban"];
                        $itemDetail["GhiChu"] = $thuoc["Ghichu"] ?? "";
                        $sum += $itemDetail['SoLuong'] * $itemDetail['GiaBan'];
                        $detail = new DonThuocDetail();
                        $detail->Post($itemDetail);
                    }
                }

                $phieu = new PhieuXuatNhap();
                if ($itemDonThuoc["ThuocLoaiDon"] == 3) {
                    $Phieu["TongTien"] = $sum;
                    $Phieu["DoViCungCap"] = "";
                    $Phieu["IdPhieu"] = $phieu->getIdPhieu();
                    $Phieu["IdDonThuoc"] = $itemDonThuoc["Id"];
                    $Phieu["XuatNhap"] = -1;
                    $Phieu["NoiDungPhieu"] = "Đơn thuốc " . $itemDonThuoc['ChanDoanBenh'] . " của " . $itemDonThuoc["NameBN"];
                    $Phieu["GhiChu"] = "Đơn thuốc " . $itemDonThuoc['ChanDoanBenh'] . " của " . $itemDonThuoc["NameBN"];
                    $Phieu["NgayNhap"] = Date("Y-m-d H:i:s", time());
                    $Phieu["CreateRecord"] = Date("Y-m-d H:i:s", time());
                    $Phieu["UpdateRecord"] = Date("Y-m-d H:i:s", time());
                    $Phieu["IsDelete"] = 0;
                    $phieuXuatNhap = new \Module\quanlythuoc\Model\PhieuXuatNhap();
                    $phieuXuatNhap->Post($Phieu);
                    foreach (DonThuocDetail::DsThuoc() as $mathuoc => $thuoc) {
                        if (isset($thuoc["Id"]) == true) {
                            $idThuoc = $thuoc["Id"];
                            $itemFormDetail["IdPhieu"] = $Phieu["IdPhieu"];
                            $itemFormDetail["IdThuoc"] = $idThuoc;
                            $itemFormDetail["SoLuong"] = $thuoc["Soluong"];
                            $itemFormDetail["NhaSanXuat"] = "";
                            $itemFormDetail["SoLo"] = $thuoc["SoLo"] ?? "";
                            $itemFormDetail["NuocSanXuat"] = "";
                            $itemFormDetail["Price"] = $itemDetail["GiaBan"];
                            $itemFormDetail["XuatNhap"] = -1;
                            $itemFormDetail["CreateRecord"] = Date("Y-m-d H:i:s", time());
                            $itemFormDetail["UpdateRecord"] = Date("Y-m-d H:i:s", time());
                            $itemFormDetail["GhiChu"] = $itemDetail["GhiChu"];
                            $itemFormDetail["IsDelete"] = 0;
                            $SanPham = new \Module\quanlythuoc\Model\PhieuXuatNhapChiTiet();
                            $SanPham->Post($itemFormDetail);
                            $sp = new SanPham();
                            $sp->DongBoThuocNhapByID($idThuoc);
                        }
                    }
                }
                DonThuocDetail::ClearSession();
                new \Model\Error(\Model\Error::success, "Đã sao chép đơn thuốc");
                $donthuoc = new DonThuoc($itemDonThuoc["Id"]);
                \Model\Common::ToUrl("/donthuoc/index/viewdonthuoc/?id=" . $donthuoc->Id . "");
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
            \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DonThuoc_Delete]);
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
