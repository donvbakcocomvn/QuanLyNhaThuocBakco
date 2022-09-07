<?php

namespace Module\donthuoc\Model\DonThuoc;

interface iFormDonThuoc {

    //put your code here
    public function Id($val = null);
    public function IdBenhNhan($val = null);
    public function Name($val = null);
    public function GioiTinh($val = null);
    public function NgaySinh($val = null); 
    public function ThoiGianKham($val = null);
    public function ChanDoanBenh($val = null);
    public function ThuocLoaiDon($val = null);
    public function TongNgayDung($val = null);
}
