<?php

namespace Model;
class ThongKe extends DB{

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

    public function GetThuoc1000()
    {
        $sql = "SELECT * FROM `lap1_qlthuoc_thuoc` WHERE `Soluong` = 1000 ORDER BY `Name` ASC";
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

    public static function LichSuNhapChiTiet()
    {
        $thongke = new ThongKe();
        $sql = "SELECT b.NgayNhap, a.IdThuoc,a.SoLo,a.NhaSanXuat,a.SoLuong,a.NuocSanXuat, a.Price, a.SoLuong * a.Price AS 'Tong' FROM `lap1_qlthuoc_phieuxuatnhap_chitiet` AS a, `lap1_qlthuoc_phieuxuatnhap` b WHERE a.IdPhieu = b.IdPhieu and a.XuatNhap = 1 and b.XuatNhap = 1 ORDER BY a.IdThuoc ASC";
        $result = $thongke->GetRows($sql);
        return $result;
    }

    public static function LichSuXuatById($id)
    {
        $thongke = new ThongKe();
        $sql = "SELECT b.NgayNhap, a.IdThuoc,a.SoLo,a.NhaSanXuat,a.SoLuong,a.NuocSanXuat, a.Price, a.SoLuong * a.Price AS 'Tong' FROM `lap1_qlthuoc_phieuxuatnhap_chitiet` AS a, `lap1_qlthuoc_phieuxuatnhap` b WHERE a.IdPhieu = b.IdPhieu and a.XuatNhap = -1 and b.XuatNhap = -1 and a.IdThuoc = '$id' ORDER BY b.NgayNhap DESC";
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
        // $sql = "SELECT `TongNhap`.`IdThuoc`, `TongSLNhap`,`TongSLXuat` FROM (SELECT `IdThuoc`, SUM(`SoLuong`) as 'TongSLNhap' FROM `lap1_qlthuoc_phieuxuatnhap_chitiet` WHERE `XuatNhap` = 1 and `IsDelete` = 0 GROUP BY `IdThuoc`) AS TongNhap JOIN (SELECT `IdThuoc`, SUM(`SoLuong`) as 'TongSLXuat' FROM `lap1_qlthuoc_phieuxuatnhap_chitiet` WHERE `XuatNhap` = -1 and `IsDelete` = 0 GROUP BY `IdThuoc`) AS TongXuat ON `TongNhap`.`IdThuoc` = `TongXuat`.`IdThuoc`";

        $sql = "Select `IdThuoc`, 
        SUM(CASE When `XuatNhap`= 1 Then`SoLuong` Else 0 End ) as 'TongSLNhap', 
        SUM(CASE When `XuatNhap`= -1 Then `SoLuong` Else 0 End ) as 'TongSLXuat'
        from  `lap1_qlthuoc_phieuxuatnhap_chitiet`
        Where `IsDelete`=0
        GROUP BY `IdThuoc`";
        $result = $thongke->GetRows($sql);
        return $result;
    }

}
