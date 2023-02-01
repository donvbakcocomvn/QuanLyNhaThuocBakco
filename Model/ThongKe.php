<?php

namespace Model;

class ThongKe extends DB
{
    public function DSThuocTongKho($params, $indexPage, $pageNumber, &$total)
    {
        self::$TableName = prefixTable . "qlthuoc_thuoc";
        $name = isset($params["keyword"]) ? $params["keyword"] : '';
        $danhmuc = isset($params["danhmuc"]) ? $params["danhmuc"] : null;
        $isShow = isset($params["isShow"]) ? $params["isShow"] : null;
        $isShowSql = "and `isShow` >= 0 ";
        $danhmucSql = "";
        if ($isShow) {
            $isShowSql = "and `isShow` = '{$isShow}' ";
        }
        if ($danhmuc) {
            $danhmucSql = "and `DanhMucId` = '{$danhmuc}' ";
        }
        // self::$Debug = true;
        $where = " (`Name` like '%{$name}%' or `Id` like '%{$name}%' or `Idloaithuoc` like '%{$name}%' {$danhmucSql}) and `isDelete` = 0";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function ThuocTonKho($params, $indexPage, $pageNumber, &$total)
    {
        self::$TableName = prefixTable . "qlthuoc_thuoc";
        $name = isset($params["keyword"]) ? $params["keyword"] : '';
        $danhmuc = isset($params["danhmuc"]) ? $params["danhmuc"] : null;
        $isShow = isset($params["isShow"]) ? $params["isShow"] : null;
        $isShowSql = "and `isShow` >= 0 ";
        $danhmucSql = "";
        if ($isShow) {
            $isShowSql = "and `isShow` = '{$isShow}' ";
        }
        if ($danhmuc) {
            $danhmucSql = "and `DanhMucId` = '{$danhmuc}' ";
        }
        // self::$Debug = true;
        $where = " (`Name` like '%{$name}%' or `Id` like '%{$name}%' or `Idloaithuoc` like '%{$name}%' {$danhmucSql}) and `isDelete` = 0 ORDER BY `Name` DESC ";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function PhieuXuatKho($params, $indexPage, $pageNumber, &$total)
    {
        self::$TableName = prefixTable . "qlthuoc_phieuxuatnhap";
        $name = isset($params["keyword"]) ? $params["keyword"] : '';
        $danhmuc = isset($params["danhmuc"]) ? $params["danhmuc"] : null;
        $isShow = isset($params["isShow"]) ? $params["isShow"] : null;
        $isShowSql = "and `isShow` >= 0 ";
        $indateSql = "";
        $danhmucSql = "";
        if ($isShow) {
            $isShowSql = "and `isShow` = '{$isShow}' ";
        }
        if ($danhmuc) {
            $danhmucSql = "and `DanhMucId` = '{$danhmuc}' ";
        }
        // self::$Debug = true;
        $where = " (`NoiDungPhieu` like '%{$name}%' or `IdPhieu` like '%{$name}%' {$danhmucSql}) and `isDelete` = 0 and `XuatNhap` = -1 ";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function DanhSachNhapChiTiet($params, $indexPage, $pageNumber, &$total)
    {
        self::$TableName = prefixTable . "qlthuoc_phieuxuatnhap_chitiet";
        $name = isset($params["keyword"]) ? $params["keyword"] : '';
        $danhmuc = isset($params["danhmuc"]) ? $params["danhmuc"] : null;
        $isShow = isset($params["isShow"]) ? $params["isShow"] : null;
        $isShowSql = "and `isShow` >= 0 ";
        $indateSql = "";
        $danhmucSql = "";
        if ($isShow) {
            $isShowSql = "and `isShow` = '{$isShow}' ";
        }
        if ($danhmuc) {
            $danhmucSql = "and `DanhMucId` = '{$danhmuc}' ";
        }
        // self::$Debug = true;
        $where = " (`IdThuoc` like '%{$name}%' {$danhmucSql}) and `isDelete` = 0 and `XuatNhap` = 1 ";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function DanhSachXuatChiTiet($params, $indexPage, $pageNumber, &$total)
    {
        self::$TableName = prefixTable . "qlthuoc_phieuxuatnhap_chitiet";
        $name = isset($params["keyword"]) ? $params["keyword"] : '';
        $danhmuc = isset($params["danhmuc"]) ? $params["danhmuc"] : null;
        $isShow = isset($params["isShow"]) ? $params["isShow"] : null;
        $isShowSql = "and `isShow` >= 0 ";
        $indateSql = "";
        $danhmucSql = "";
        if ($isShow) {
            $isShowSql = "and `isShow` = '{$isShow}' ";
        }
        if ($danhmuc) {
            $danhmucSql = "and `DanhMucId` = '{$danhmuc}' ";
        }
        // self::$Debug = true;
        $where = " (`IdThuoc` like '%{$name}%' {$danhmucSql}) and `isDelete` = 0 and `XuatNhap` = -1 ";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function PhieuNhapKho($params, $indexPage, $pageNumber, &$total)
    {
        self::$TableName = prefixTable . "qlthuoc_phieuxuatnhap";
        $name = isset($params["keyword"]) ? $params["keyword"] : '';
        $danhmuc = isset($params["danhmuc"]) ? $params["danhmuc"] : null;
        $isShow = isset($params["isShow"]) ? $params["isShow"] : null;
        $isShowSql = "and `isShow` >= 0 ";
        $indateSql = "";
        $danhmucSql = "";
        if ($isShow) {
            $isShowSql = "and `isShow` = '{$isShow}' ";
        }
        if ($danhmuc) {
            $danhmucSql = "and `DanhMucId` = '{$danhmuc}' ";
        }
        // self::$Debug = true;
        $where = " (`NoiDungPhieu` like '%{$name}%' or `IdPhieu` like '%{$name}%' {$danhmucSql}) {$indateSql} and `isDelete` = 0 and `XuatNhap` =1 ";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function GetThuocSapHet($params, $indexPage, $pageNumber, &$total)
    {
        self::$TableName = prefixTable . "qlthuoc_thuoc";
        $name = isset($params["keyword"]) ? $params["keyword"] : '';
        $danhmuc = isset($params["danhmuc"]) ? $params["danhmuc"] : null;
        $isShow = isset($params["isShow"]) ? $params["isShow"] : null;
        $isShowSql = "and `isShow` >= 0 ";
        $danhmucSql = "";
        if ($isShow) {
            $isShowSql = "and `isShow` = '{$isShow}' ";
        }
        if ($danhmuc) {
            $danhmucSql = "and `DanhMucId` = '{$danhmuc}' ";
        }
        // self::$Debug = true;
        $where = " (`Name` like '%{$name}%' {$danhmucSql})and `SLHienTai` <= `Canhbao` and `isDelete` = 0 ";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function GetBenhNhanTrongNgay($params, $indexPage, $pageNumber, &$total)
    {
        self::$TableName = prefixTable . "benhnhan";
        $name = isset($params["keyword"]) ? $params["keyword"] : '';
        $fromdate = isset($params["fromdate"]) ? $params["fromdate"] : null;
        $todate = isset($params["todate"]) ? $params["todate"] : null;
        $indate = isset($params["indate"]) ? $params["indate"] : null;
        $danhmuc = isset($params["danhmuc"]) ? $params["danhmuc"] : null;
        $isShow = isset($params["isShow"]) ? $params["isShow"] : null;
        $isShowSql = "and `isShow` >= 0 ";
        $indateSql = "";
        $danhmucSql = "";
        if ($indate) {
            $indateSql = " and `CreateRecord` LIKE '%$indate%'";
        }
        if ($isShow) {
            $isShowSql = "and `isShow` = '{$isShow}' ";
        }
        if ($danhmuc) {
            $danhmucSql = "and `DanhMucId` = '{$danhmuc}' ";
        }
        // self::$Debug = true;
        $where = " (`Name` like '%{$name}%' or `Phone` like '%{$name}%' or `Address` like '%{$name}%' {$danhmucSql}) {$indateSql} and `isDelete` = 0 ";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function GetDonThuocTrongNgay($params, $indexPage, $pageNumber, &$total)
    {
        self::$TableName = prefixTable . "toathuoc";
        $name = isset($params["keyword"]) ? $params["keyword"] : '';
        $fromdate = isset($params["fromdate"]) ? $params["fromdate"] : null;
        $todate = isset($params["todate"]) ? $params["todate"] : null;
        $indate = isset($params["indate"]) ? $params["indate"] : null;
        $danhmuc = isset($params["danhmuc"]) ? $params["danhmuc"] : null;
        $isShow = isset($params["isShow"]) ? $params["isShow"] : null;
        $isShowSql = "and `isDelete` = 0 ";
        $indateSql = "";
        $danhmucSql = "";
        if ($indate) {
            $indateSql = " and `CreateRecord` LIKE '%$indate%'";
        }
        if ($isShow) {
            $isShowSql = "and `isDelete` = '{$isShow}' ";
        }
        if ($danhmuc) {
            $danhmucSql = "and `DanhMucId` = '{$danhmuc}' ";
        }
        // self::$Debug = true;
        $where = " (`NameBN` like '%{$name}%' {$danhmucSql}) {$indateSql} {$isShowSql} ORDER BY `CreateRecord` DESC";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function GetDSThuocSapHetHan($params, $indexPage, $pageNumber, &$total)
    {
        self::$TableName = prefixTable . "qlthuoc_phieuxuatnhap_chitiet";
        $name = isset($params["keyword"]) ? $params["keyword"] : '';
        $danhmuc = isset($params["danhmuc"]) ? $params["danhmuc"] : null;
        $isShow = isset($params["isShow"]) ? $params["isShow"] : null;
        $isShowSql = "and `isShow` >= 0 ";
        $indateSql = "";
        $danhmucSql = "";
        if ($isShow) {
            $isShowSql = "and `isShow` = '{$isShow}' ";
        }
        if ($danhmuc) {
            $danhmucSql = "and `DanhMucId` = '{$danhmuc}' ";
        }
        // self::$Debug = true;
        $where = " (`IdThuoc` like '%{$name}%' {$danhmucSql}) {$indateSql} and DATEDIFF(`HanSuDung`,CURDATE()) >= 0 AND DATEDIFF(`HanSuDung`,CURDATE()) <= 60 AND `XuatNhap` = 1";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function GetDSThuocTonExport()
    {
        $table = prefixTable;
        $sql = "SELECT `Id`, `Idloaithuoc`, `Name`, `SLHienTai` FROM `{$table}qlthuoc_thuoc` ORDER BY `Name` DESC";
        $result = $this->GetRows($sql);
        return $result;
    }

    public function GetDSTongThuocTrongKhoExport()
    {
        $table = prefixTable;
        $sql = "SELECT `Id`, `Idloaithuoc`, `Name`, `SLHienTai` + `Soluong` AS 'TongThuoc' FROM `{$table}qlthuoc_thuoc`";
        $result = $this->GetRows($sql);
        return $result;
    }

    public function GetDSBNTrongNgay()
    {
        $date = date('Y-m-d', time());
        $sql = "SELECT `Id`, `Name`, `Gioitinh`, `Ngaysinh`, `CMND`, `Address`, `Phone`,`TinhThanh`, `QuanHuyen`, `PhuongXa` FROM `lap1_benhnhan` WHERE `CreateRecord` LIKE '%$date%' and `isDelete` = 0 limit 0,10";
        $result = $this->GetRows($sql);
        return $result;
    }

    public function GetDSDonThuocTrongNgay()
    {
        $date = date('Y-m-d', time());
        $sql = "SELECT `Id`, `IdBenhNhan`, `NameBN`, `GioiTinh`, `NgaySinh`, `ThoiGianKham`, `ChanDoanBenh`, `ThuocLoaiDon`, `TongNgayDung` FROM `lap1_toathuoc` WHERE `ThoiGianKham` LIKE '%$date%'";
        $result = $this->GetRows($sql);
        return $result;
    }

    public function GetDSXuatNhapExportChiTiet($xuatnhap)
    {
        $sql = "SELECT `IdPhieu`, `IdThuoc`, `SoLo`, `NhaSanXuat`, `SoLuong`, `NuocSanXuat`, `Price`, `Price`*`SoLuong` as `Tong` FROM `lap1_qlthuoc_phieuxuatnhap_chitiet` WHERE `isDelete` = 0 and `XuatNhap` = '$xuatnhap'";
        $result = $this->GetRows($sql);
        return $result;
    }

    public function GetDSPhieuXuatNhapExport($xuatnhap)
    {
        $sql = "SELECT `IdPhieu`,`DoViCungCap`, `NoiDungPhieu`, `NgayNhap`,`TongTien`,`GhiChu` FROM `lap1_qlthuoc_phieuxuatnhap` WHERE `XuatNhap` = '$xuatnhap' ORDER BY `NgayNhap` ASC;";
        $result = $this->GetRows($sql);
        return $result;
    }

    public static function GetDSPhieuNhap($xuatnhap)
    {
        $thongke = new ThongKe();
        $sql = "SELECT * FROM `lap1_qlthuoc_phieuxuatnhap` WHERE `XuatNhap` = '$xuatnhap' ORDER BY `NgayNhap` ASC";
        $result = $thongke->GetRows($sql);
        return $result;
    }

    public function GetSpCanhBao()
    {
        $sql = "SELECT `Id`,`Name`, `Namebietduoc`, `Solo`, `Gianhap`, `Giaban`, `DVT`, `Ngaysx`, `HSD`, `Tacdung`, `Cochetacdung`, `Ghichu`, `Soluong`, `NhaSX`, `NuocSX`,`CachDung`, `Canhbao` FROM `lap1_qlthuoc_thuoc`WHERE `Soluong` < `Canhbao` ORDER BY `Name` ASC";
        $result = $this->GetRows($sql);
        return $result;
    }

    public static function GetSumSLPhieuXuat()
    {
        $thongke = new ThongKe();
        $sql = "SELECT COUNT(*) as 'TongRow' FROM `lap1_qlthuoc_phieuxuatnhap` WHERE `XuatNhap` = -1";
        $result = $thongke->GetRow($sql);
        return $result['TongRow'];
    }

    public static function GetSumSLPhieuNhap()
    {
        $thongke = new ThongKe();
        $sql = "SELECT COUNT(*) as 'TongRow' FROM `lap1_qlthuoc_phieuxuatnhap` WHERE `XuatNhap` = 1";
        $result = $thongke->GetRow($sql);
        return $result['TongRow'];
    }

    public static function TotalThuocsaphet()
    {
        $thongke = new ThongKe();
        $sql = "SELECT COUNT(*) as `Total` FROM `lap1_qlthuoc_thuoc` WHERE `SLHienTai` <= `Canhbao` and `isDelete` = 0";
        $result = $thongke->GetRow($sql);
        return $result['Total'];
    }

    public static function TotalThuocTong()
    {
        $thongke = new ThongKe();
        $sql = "SELECT COUNT(*) as `Total` FROM `lap1_qlthuoc_thuoc` WHERE `isDelete` = 0";
        $result = $thongke->GetRow($sql);
        return $result['Total'];
    }

    public static function TotalBNTrongNgay($date)
    {
        $thongke = new ThongKe();
        $sql = "SELECT COUNT(*) as `Total` FROM `lap1_benhnhan` WHERE `CreateRecord` LIKE '%$date%' and `isDelete` = 0";
        $result = $thongke->GetRow($sql);
        return $result['Total'];
    }

    public static function TotalThuocSapHetHan()
    {
        $thongke = new ThongKe();
        $sql = "SELECT COUNT(*) as `Total` FROM `lap1_qlthuoc_phieuxuatnhap_chitiet` WHERE DATEDIFF(`HanSuDung`,CURDATE()) >= 0 AND DATEDIFF(`HanSuDung`,CURDATE()) <= 60 AND `XuatNhap` = 1";
        $result = $thongke->GetRow($sql);
        return $result['Total'];
    }

    public static function TotalDonThuocTrongNgay($date)
    {
        $thongke = new ThongKe();
        $sql = "SELECT COUNT(*) as `Total` FROM `lap1_toathuoc` WHERE `CreateRecord` LIKE '%$date%'";
        $result = $thongke->GetRow($sql);
        return $result['Total'];
    }

    public static function TongNhapTheoThuoc()
    {
        $thongke = new ThongKe();
        $sql = "SELECT `IdThuoc`,`XuatNhap`, SUM(`SoLuong`)AS TongSoLuong, SUM(`SoLuong` * `Price`) AS TongGia  FROM `lap1_qlthuoc_phieuxuatnhap_chitiet` WHERE `XuatNhap` = 1 AND `IsDelete` = 0 GROUP BY `IdThuoc`";
        $result = $thongke->GetRows($sql);
        return $result;
    }

    public static function TongXuatTheoThuoc()
    {
        $thongke = new ThongKe();
        $sql = "SELECT `IdThuoc`,`XuatNhap`, SUM(`SoLuong`)AS TongSoLuong, SUM(`SoLuong` * `Price`) AS TongGia  FROM `lap1_qlthuoc_phieuxuatnhap_chitiet` WHERE `XuatNhap` = -1 AND `IsDelete` = 0 GROUP BY `IdThuoc`";
        $result = $thongke->GetRows($sql);
        return $result;
    }

    public static function GetTongThuocNhapAndCode()
    {
        $thongke = new ThongKe();
        $sql = "SELECT `IdThuoc`, SUM(`SoLuong`) as 'Tong' FROM `lap1_qlthuoc_phieuxuatnhap_chitiet` WHERE `XuatNhap` = 1 and `IsDelete` = 0 GROUP BY `IdThuoc`";
        $result = $thongke->GetRows($sql);
        return $result;
    }

    public static function GetTongThuocXuatAndCode()
    {
        $thongke = new ThongKe();
        $sql = "SELECT `IdThuoc`, SUM(`SoLuong`) as 'Tong' FROM `lap1_qlthuoc_phieuxuatnhap_chitiet` WHERE `XuatNhap` = -1 and `IsDelete` = 0 GROUP BY `IdThuoc`";
        $result = $thongke->GetRows($sql);
        return $result;
    }

    public static function GetTongXuatNhap()
    {
        $thongke = new ThongKe();
        $prefixTable = prefixTable;
        $sql = "Select `IdThuoc`, 
        SUM(CASE When `XuatNhap`= 1 Then`SoLuong` Else 0 End ) as 'TongSLNhap', 
        SUM(CASE When `XuatNhap`= -1 Then `SoLuong` Else 0 End ) as 'TongSLXuat'
        from  `{$prefixTable}qlthuoc_phieuxuatnhap_chitiet`
        Where `IsDelete`=0
        GROUP BY `IdThuoc`";
        $result = $thongke->GetRows($sql);
        return $result;
    }
    public static function GetTongXuatNhapById($idThuoc)
    {
        $thongke = new ThongKe();
        $table = prefixTable;
        $sql = "Select `IdThuoc`, 
        SUM(CASE When `XuatNhap`= 1 Then`SoLuong` Else 0 End ) as 'TongSLNhap', 
        SUM(CASE When `XuatNhap`= -1 Then `SoLuong` Else 0 End ) as 'TongSLXuat'
        from  `{$table}qlthuoc_phieuxuatnhap_chitiet`
        Where `IsDelete`=0 and `IdThuoc` = '{$idThuoc}'
        GROUP BY `IdThuoc`";
        $result = $thongke->GetRow($sql);
        return $result;
    }
}
