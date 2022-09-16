<?php

namespace Module\quanlythuoc\Model\PhieuXuatNhap;

interface iFormPhieuXuatNhapChiTiet
{

    //put your code here
    public function Id($val = null);
    public function IdPhieu($val = null);
    public function IdThuoc($val = null);
    public function SoLuong($val = null);
    public function SoLo($val = null);
    public function HanSuDung($val = null);
    public function NhaSanXuat($val = null);
    public function NuocSanXuat($val = null);
    public function Price($val = null);
    public function XuatNhap($val = null);
    public function CreateRecord($val = null);
    public function UpdateRecord($val = null);
    public function GhiChu($val = null);
    public function IsDelete($val = null);
}
