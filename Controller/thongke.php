<?php

namespace Controller;

use Model\ThongKe as ModelThongKe;
use Model\Common;
use Model\Notions;
use Module\quanlythuoc\Model\SanPham;

class thongke extends \Application
{


    public function __construct()
    {
        new backend();
        self::$_Theme = "backend";
        // \Model\Permission::Check([\Model\User::Admin, md5(quanlyusers::class . "_view")]);
        //336bdbdba15a2836969cb534cc56f9df
    }

    function index()
    {
        $this->View();
    }

    function thuocsaphet()
    {
        $this->View();
    }

    function exportthuocsaphet()
    {
        $thongke = new \Model\ThongKe();
        $sp = new SanPham();
        $item = $thongke->GetSpCanhBao();
        var_dump($item);
        // $data[] = ["BẢNG KÊ THUỐC PHÒNG KHÁM PHƯƠNG UYÊN"];
        $data[] = [
            "Mã thuốc","Tên Thuốc", "Tên biệt dược", "Số lô", "Giá nhập","Giá Bán","Đơn vị tính", "Ngày sản xuất", "Hạn sử dụng","Tác dụng","Cơ chế tác dụng", "Ghi chú","Số lượng", "Nhà sản xuất", "Nước sản xuất","Cách dùng thuốc", "Số lượng cảnh báo"
        ];
        if ($item) {
            foreach ($item as $row) {
                $row["Giaban"] = Common::ViewPrice($row["Giaban"]);
                $row["Gianhap"] = Common::ViewPrice($row["Gianhap"]);
                $row["Ngaysx"] = Common::ForMatDMY($row["Ngaysx"]);
                $row["HSD"] = Common::ForMatDMY($row["HSD"]);
                $row["CachDung"] = $sp->GetDesByVal($row["CachDung"], 'cachdungthuoc');
                $row["DVT"] = $sp->GetDesByVal($row["DVT"], 'donvitinh');
                $row["NuocSX"] = Notions::GetById($row["NuocSX"]);
                // $row["DVT"] = $sp->DonViTinh($row["DVT"]);
                // var_dump($row["DVT"]);
                $data[] = $row;
            }
            \Module\quanlythuoc\Model\SanPham::ExportBangKe($data, "public/thongke/ExportThuocSapHet.xlsx");
        }
    }

    function thuocbang1000()
    {
        $this->View();
    }
}
