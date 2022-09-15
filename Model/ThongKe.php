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

}
