<?php

namespace Model;
class ThongKe extends DB{
    public function GetSpCanhBao()
    {
        $sql = "SELECT `Id`,`Name`, `Namebietduoc`, `Solo`, `Gianhap`, `Giaban`, `DVT`, `Ngaysx`, `HSD`, `Tacdung`, `Cochetacdung`, `Ghichu`, `Soluong`, `NhaSX`, `NuocSX`,`CachDung`, `Canhbao` FROM `lap1_qlthuoc_thuoc`WHERE `Soluong` < `Canhbao` ORDER BY `Name` ASC;";
        $result = $this->GetRows($sql);
        return $result;
    }

    public function GetThuoc1000()
    {
        $sql = "SELECT * FROM `lap1_qlthuoc_thuoc` WHERE `Soluong` = 1000 ORDER BY `Name` ASC";
        $result = $this->GetRows($sql);
        return $result;
    }

    public static function GetSumXuat()
    {
        $thongke = new ThongKe();
        $sql = "SELECT SUM(`SoLuong`) AS Tong FROM `lap1_qlthuoc_phieuxuatnhap_chitiet` WHERE `XuatNhap` = -1 AND `IsDelete` = 0;";
        $result = $thongke->GetRow($sql);
        return $result['Tong'];
    }

    public static function GetSumNhap()
    {
        $thongke = new ThongKe();
        $sql = "SELECT SUM(`SoLuong`) AS Tong FROM `lap1_qlthuoc_phieuxuatnhap_chitiet` WHERE `XuatNhap` = 1 AND `IsDelete` = 0;";
        $result = $thongke->GetRow($sql);
        return $result['Tong'];
    }

    public static function GetSumSLTong()
    {
        $thongke = new ThongKe();
        $sql = "SELECT SUM(`Soluong`) AS Tong FROM `lap1_qlthuoc_thuoc`;";
        $result = $thongke->GetRow($sql);
        return $result['Tong'];
    }

    public static function GetAllPhieuNhap()
    {
        $thongke = new ThongKe();
        $sql = "SELECT * FROM `lap1_qlthuoc_phieuxuatnhap` WHERE `XuatNhap` = 1 ORDER BY `NgayNhap` DESC;";
        $result = $thongke->GetRows($sql);
        return $result;
    }

    public static function TongNhapTheoThuoc()
    {
        $thongke = new ThongKe();
        $sql = "SELECT `IdThuoc`, SUM(`SoLuong`)AS TongSoLuong, SUM(`SoLuong` * `Price`) AS TongGia  FROM `lap1_qlthuoc_phieuxuatnhap_chitiet` WHERE `XuatNhap` = 1 AND `IsDelete` = 0 GROUP BY `IdThuoc`";
        $result = $thongke->GetRows($sql);
        return $result;
    }

    public static function LichSuNhapById($id)
    {
        $thongke = new ThongKe();
        $sql = "SELECT b.NgayNhap, a.IdThuoc,a.SoLo,a.NhaSanXuat,a.SoLuong,a.NuocSanXuat, a.Price, a.SoLuong * a.Price AS 'Tong' FROM `lap1_qlthuoc_phieuxuatnhap_chitiet` AS a, `lap1_qlthuoc_phieuxuatnhap` b WHERE a.IdPhieu = b.IdPhieu and a.XuatNhap = b.XuatNhap and a.IdThuoc = '$id' ORDER BY b.NgayNhap DESC; ";
        $result = $thongke->GetRows($sql);
        return $result;
    }


}
