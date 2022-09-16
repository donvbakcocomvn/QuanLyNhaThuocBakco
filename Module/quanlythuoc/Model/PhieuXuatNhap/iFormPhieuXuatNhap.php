<?php

namespace Module\quanlythuoc\Model\PhieuXuatNhap;

interface iFormPhieuXuatNhap
{

    //put your code here
    public function Id($val = null);
    public function IdPhieu($val = null);
    public function TongTien($val = null);
    public function DonViCungCap($val = null); 
    public function XuatNhap($val = null);
    public function NoiDungPhieu($val = null);
    public function GhiChu($val = null);
    public function NgayNhap($val = null);
    public function CreateRecord($val = null);
    public function UpdateRecord($val = null);
    public function IsDelete($val = null);
}
