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
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy, "Giao_Thuoc"]);
        try {
            $idDonThuoc = \Model\Request::Get("id", null);
            $donthuoc = new DonThuoc($idDonThuoc);
            $ModelDonThuoc["Id"] = $donthuoc->Id;
            $ModelDonThuoc["Status"] = 3;
            $dt = new DonThuoc();
            $dt->Put($ModelDonThuoc);
            $Phieu["TongTien"] = $donthuoc->TongTien();
            $Phieu["DoViCungCap"] = "";
            $Phieu["IdPhieu"] = $idDonThuoc;
            $Phieu["XuatNhap"] = -1;
            $Phieu["NoiDungPhieu"] = "Đơn thuốc " . $donthuoc->ChanDoanBenh . " của " . $donthuoc->NameBN;
            $Phieu["GhiChu"] = "Đơn thuốc " . $donthuoc->ChanDoanBenh . " của " . $donthuoc->NameBN;
            $Phieu["NgayNhap"] = Date("Y-m-d H:i:s", time());
            $Phieu["CreateRecord"] = Date("Y-m-d H:i:s", time());
            $Phieu["UpdateRecord"] = Date("Y-m-d H:i:s", time());
            $Phieu["IsDelete"] = 0;
            $phieuXuatNhap = new \Module\quanlythuoc\Model\PhieuXuatNhap();
            $_phieuXN = $phieuXuatNhap->GetByIdPhieu($idDonThuoc);
            if ($_phieuXN == null) {
                $phieuXuatNhap->Post($Phieu);
            } else {
                $Phieu["Id"] = $_phieuXN["Id"];
                $phieuXuatNhap->Put($Phieu);
            }
            // xóa chi tiết đơn theo mã phiếu
            $phieuXuatNhapChiTiet = new \Module\quanlythuoc\Model\PhieuXuatNhapChiTiet();
            $phieuXuatNhapChiTiet->XoaChiTietPhieuNhap($Phieu["IdPhieu"]);
            foreach ($donthuoc->DanhSachThuoc() as $key => $thuoc) {
                $idThuoc = $thuoc["IdThuoc"];
                $itemFormDetail["IdPhieu"] = $Phieu["IdPhieu"];
                $itemFormDetail["IdThuoc"] = $idThuoc;
                $itemFormDetail["SoLuong"] = $thuoc["SoLuong"];
                $itemFormDetail["NhaSanXuat"] = $thuoc["NhaSanXuat"] ?? "";
                $itemFormDetail["SoLo"] = $thuoc["SoLo"] ?? "";
                $itemFormDetail["NuocSanXuat"] = $thuoc["NuocSanXuat"] ?? "";
                $itemFormDetail["HanSuDung"] = Date("Y-m-d H:i:s", time() + 3600 * 24 * 100);
                $itemFormDetail["Price"] = $thuoc["GiaBan"];
                $itemFormDetail["XuatNhap"] = -1;
                $itemFormDetail["CreateRecord"] = Date("Y-m-d H:i:s", time());
                $itemFormDetail["UpdateRecord"] = Date("Y-m-d H:i:s", time());
                $itemFormDetail["GhiChu"] = $thuoc["GhiChu"];
                $itemFormDetail["IsDelete"] = 0;
                $PhieuXuatNhapChiTiet = new \Module\quanlythuoc\Model\PhieuXuatNhapChiTiet();
                $PhieuXuatNhapChiTiet->Post($itemFormDetail);
            }
            new \Model\Error(\Model\Error::success, "Đã Giao Thuốc");
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
        var_dump($_SESSION["DetailThuoc"]);
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
        $params["loaidonthuoc"] = isset($_REQUEST["loaidonthuoc"]) ? \Model\Common::TextInput($_REQUEST["loaidonthuoc"]) : "";

        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachTaiKhoan = $modelItem->GetItems($params, $indexPage, $pageNumber, $total);
        if (isset($_REQUEST["export"])) {
            $this->ExportByFilter($params);
        }
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

    private  function ExportByFilter($params)
    {
        $modelItem = new DonThuoc();
        $item = $modelItem->GetAll($params);
        // var_dump($item);
        $data[] = [
            "Mã đơn thuốc",
            "Mã bệnh nhân",
            "Tên bệnh nhân",
            "Giới tính",
            "Ngày sinh",
            "Thời gian khám",
            "Chẩn đoán bệnh",
            "Thuộc loại đơn",
            "Số ngày dùng thuốc"
        ];
        if ($item) {
            foreach ($item as $row) {
                $benhnhan = new BenhNhan($row["IdBenhNhan"]);
                $donthuoc = new DonThuoc($row["Id"]);
                $row["GioiTinh"] = $benhnhan->Gioitinh();
                $row["NgaySinh"] = Common::ForMatDMY($row["NgaySinh"]);
                $row["ThuocLoaiDon"] = $donthuoc->ThuocLoaiDon();
                $row["TongNgayDung"] = $row["TongNgayDung"] . ' ' . 'ngày';
                // unset($row["ThoiGianKham"]);
                unset($row["Status"]);
                unset($row["IsDelete"]);
                unset($row["CreateRecord"]);
                unset($row["UpdateRecord"]);
                $data[] = $row;

                $data[] = [
                    "Mã Thuốc",
                    "Số Ngày Dùng Thuốc",
                    "Đơn Vị Tính",
                    "Số Lượng",
                    "Cách Dùng",
                    "Giá Bán",
                    "Ghi Chú",
                ];
                $dsThuoc = $donthuoc->DanhSachThuoc();
                foreach ($dsThuoc as $key => $value) {
                    $_item1 = [];
                    $_item1[] = $value["IdThuoc"];
                    $_item1[] = $value["SoNgaySDThuoc"];
                    $_item1[] = $value["DVT"];
                    $_item1[] = $value["SoLuong"];
                    $_item1[] = $value["CachDung"];
                    $_item1[] = $value["GiaBan"];
                    $_item1[] = $value["GhiChu"];
                    $data[] = $_item1;
                    $_item2 = [];
                    $_item2[] = "Sáng:";
                    $_item2[] = $value["Sang"];
                    $_item2[] = "Chiều";
                    $_item2[] = $value["Trua"];
                    $_item2[] = "Tối";
                    $_item2[] = $value["Chieu"];
                    $data[] = $_item2;
                }
                $data[] = [];
            }
            \Module\quanlythuoc\Model\SanPham::ExportBangKe($data, "public/thongke/ExportToaThuoc.xlsx");
        }
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
        $params["keyword"] = isset($_REQUEST["keyword"]) ? \Model\Common::TextInput($_REQUEST["keyword"]) : "";
        $params["danhmuc"] = isset($_REQUEST["danhmuc"]) ? \Model\Common::TextInput($_REQUEST["danhmuc"]) : "";
        $params["isShow"] = isset($_REQUEST["isShow"]) ? \Model\Common::TextInput($_REQUEST["isShow"]) : "";
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

        $thuoc["Sang"] = floatval($data["sang"] ?? 0);
        $thuoc["Trua"] = floatval($data["trua"] ?? 0);
        $thuoc["Chieu"] = floatval($data["chieu"] ?? 0);
        $thuoc["SoNgaySDThuoc"] = $data["ngaydungthuoc"];
        $thuoc["Ghichu"] = $data["ghichu"];
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

        if ($_sanpham["SLHienTai"] <= 0) {
            echo json_encode(new DonThuocDetail());
            return;
        }
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
            // DonThuocDetail::ClearSession();
            if (\Model\Request::Post(FormDonThuoc::$ElementsName, null) && \Model\Request::Post(FormBenhNhan::$ElementsName, null)) {

                if (DonThuocDetail::DsThuoc() == false) {
                    throw new Exception("Chưa có thuốc.");
                }
                $benhnhan = new BenhNhan();
                $itemBenhNhan = \Model\Request::Post(FormBenhNhan::$ElementsName, null);
                $itemBN["Id"] = $benhnhan->CreatId();
                $itemBN["Name"] = $itemBenhNhan["Name"];
                $itemBN["Gioitinh"] = $itemBenhNhan["Gioitinh"];
                $ngay = intval($itemBenhNhan["NgaySinh"]);
                $ngay = max($ngay, 1);
                $ngay = min($ngay, 31);
                $thang = intval($itemBenhNhan["ThangSinh"]);
                $thang = max($thang, 1);
                $thang = min($thang, 12);
                $nam = $itemBenhNhan["NamSinh"] ?? date('Y');
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
                    // DonThuocDetail::ClearSession();
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
            // DonThuocDetail::ClearSession();
            if (\Model\Request::Post(FormDonThuoc::$ElementsName, null) && \Model\Request::Post(FormBenhNhan::$ElementsName, null)) {
                $idphieu = \Model\Request::Get("id", null);
                $donthuoc = new DonThuoc($idphieu);
                // var_dump($donthuoc);

                $benhnhan = new BenhNhan($donthuoc->IdBenhNhan);
                $itemBenhNhan = \Model\Request::Post(FormBenhNhan::$ElementsName, null);
                $itemBN["Id"] = $benhnhan->Id;
                $itemBN["Name"] = $itemBenhNhan["Name"];
                $itemBN["Gioitinh"] = $itemBenhNhan["Gioitinh"];
                $ngay = $itemBenhNhan["NgaySinh"] ?? '01';
                $thang = $itemBenhNhan["ThangSinh"] ?? '01';
                $nam = $itemBenhNhan["NamSinh"] ?? date('Y');
                // $itemBN["Ngaysinh"] = date('Y-m-d', strtotime($nam . '-' . $thang . '-' . $ngay));
                $itemBN["Ngaysinh"] = $nam . '-' . $thang . '-' . $ngay;
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

                foreach (DonThuocDetail::DsThuoc() as $mathuoc => $thuoc) {
                    // var_dump($thuoc);
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
                        $detail = new DonThuocDetail();
                        $detail->Post($itemDetail);
                        // var_dump($thuoc);
                        // die();
                    }
                    DonThuocDetail::ClearSession();
                }
                new \Model\Error(\Model\Error::success, "Đã Lưu Toa Thuốc");
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
        if (isset($_GET["isnew"])) {
            DonThuocDetail::setDsThuoc($id);
            Common::ToUrl("/donthuoc/index/put/?id={$id}");
        }
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
            DonThuocDetail::ClearSession();
            if (\Model\Request::Post(FormDonThuoc::$ElementsName, null) && \Model\Request::Post(FormBenhNhan::$ElementsName, null)) {
                $benhnhan = new BenhNhan();
                $itemBenhNhan = \Model\Request::Post(FormBenhNhan::$ElementsName, null);

                $itemBN["Id"] = $itemBenhNhan["Id"] ?? $benhnhan->CreatId();
                $itemBN["Name"] = $itemBenhNhan["Name"];
                $itemBN["Gioitinh"] = $itemBenhNhan["Gioitinh"];
                $ngay = $itemBenhNhan["NgaySinh"] ? $itemBenhNhan["NgaySinh"] : '01';
                $thang = $itemBenhNhan["ThangSinh"] ? $itemBenhNhan["ThangSinh"] : '01';
                $nam = $itemBenhNhan["NamSinh"] ?? date('Y');
                $itemBN["Ngaysinh"] = $nam . '-' . $thang . '-' . $ngay;
                $itemBN["CMND"] = $itemBenhNhan["CMND"];
                $itemBN["Address"] = $itemBenhNhan["Address"];
                $itemBN["TinhThanh"] = $itemBenhNhan["TinhThanh"] ?? '';
                $itemBN["QuanHuyen"] = $itemBenhNhan["QuanHuyen"] ?? '';
                $itemBN["PhuongXa"] = $itemBenhNhan["PhuongXa"] ?? '';
                $itemBN["Phone"] = $itemBenhNhan["Phone"];
                if ($itemBenhNhan["Id"] == "") {
                    $itemBN["Id"] = $benhnhan->CreatId();
                    $benhnhan->Post($itemBN);
                }
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
                // tạo benh nhân
                if ($itemDonThuoc) {
                    $donthuoc->Post($itemDonThuoc);
                }
                $detail = new DonThuocDetail();
                $iddonthuoc = \Model\Request::Get("id", null);
                $DonThuocModel = new DonThuoc($iddonthuoc);
                $detail->DeleteDetail($DonThuocModel->Id);
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
                        $detail = new DonThuocDetail();
                        $detail->Post($itemDetail);
                    }
                    DonThuocDetail::ClearSession();
                }
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

        if (isset($_GET["isnew"])) {
            DonThuocDetail::setDsThuoc($id);
            Common::ToUrl("/donthuoc/index/copy/?id={$id}&isnewbn=1");
        }  

        $this->View($data);
    }
    public function copydonbyid(){
		$id = \Model\Request::Get("id", null);
		DonThuocDetail::setDsThuoc($id);
		Common::ToUrl("/donthuoc/index/copy/?id={$id}");
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
        \Model\Common::ToUrl($_SERVER["HTTP_REFERER"]);
    }
}
