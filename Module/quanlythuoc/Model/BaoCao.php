<?php
namespace Module\quanlythuoc\Model;

class BaoCao extends PhieuXuatNhapChiTiet
{

    public function __construct($dm = null)
    {
        parent::__construct($dm);
    }

    public function GetSoLanNhapThuoc($fromDate, $toDate, $xuatNhap = null)
    {
        $sqlXuatNhap = "";
        if ($xuatNhap) {
            $sqlXuatNhap = "and `XuatNhap` ='{$xuatNhap}'";
        }
        $where = "`CreateRecord` > '{$fromDate}' 
        and `CreateRecord` < '{$toDate}'
        {$sqlXuatNhap}
        GROUP BY `IdThuoc`";
        return $this->Select($where, ["COUNT(`IdThuoc`) as `SoLan`", "IdThuoc"]);
    }

}


?>