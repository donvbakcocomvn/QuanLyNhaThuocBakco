<?php

namespace Module\quanlythuoc\Model;

use Module\quanlythuoc\Permission;

class btnHtml
{

    public function __construct()
    {
    }


    static function btnImportSanPham()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin,\Model\User::QuanLy, Permission::QLT_Thuoc_Import]) == false) {
            return;
        }
?>
        <a class="btn btn-warning" href="/index.php?module=quanlythuoc&controller=sanpham&action=import">
            <i class="fa fa-download"></i> Import</a>
    <?php
    }

    static function btnExportSanPham()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_Thuoc_Export]) == false) {
            return;
        }
    ?>
        <a class="btn btn-success" href="/index.php?module=quanlythuoc&controller=sanpham&action=export">
            <i class="fa fa-filter"></i> Export</a>
    <?php
    }

    static function btnThemSanPham()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_Thuoc_Post]) == false) {
            return;
        }
    ?>
        <a class="btn btn-info" href="/index.php?module=quanlythuoc&controller=sanpham&action=post">
            <i class="fa fa-plus"></i> Thêm mới</a>
    <?php
    }

    public static function btnViewSanPham()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_Thuoc_DS]) == false) {
            return;
        }
    ?>
        <a class="btn btn-sm btn-success" href="/index.php?module=quanlythuoc&controller=sanpham&action=index">
            <i class="fa fa-list"></i> Xem danh sách thuốc</a>
    <?php
    }

    public static function btnSuaSanPham($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_Thuoc_Put]) == false) {
            return;
        }
    ?>
        <a class="btn btn-sm btn-success" href="/index.php?module=quanlythuoc&controller=sanpham&action=put&id=<?php echo $id; ?>">
            Sửa
        </a>
    <?php
    }

    public static function btnDongBoSL()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy]) == false) {
            return;
        }
    ?>
        <a class="btn btn-primary" href="/index.php?module=quanlythuoc&controller=sanpham&action=dongboSL">
            Đồng bộ số lượng
        </a>
    <?php
    }

    public static function btnChiSanPham($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin,\Model\User::QuanLy, Permission::QLT_Thuoc_Detail]) == false) {
            return;
        }
    ?>
        <a class="btn btn-sm btn-warning" href="/index.php?module=quanlythuoc&controller=sanpham&action=detail&id=<?php echo $id; ?>">
            Chi Tiết
        </a>
    <?php
    }

    public static function btnXoaSanPham($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin,\Model\User::QuanLy, Permission::QLT_Thuoc_Delete]) == false) {
            return;
        }
    ?>
        <a class="btn btn-sm btn-danger" title="Bạn có muốn xóa danh mục này?" href="/index.php?module=quanlythuoc&controller=sanpham&action=isdelete&id=<?php echo $id; ?>">
            Xóa
        </a>
    <?php
    }

    public static function btnViewDanhMuc()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin,\Model\User::QuanLy, Permission::QLT_DanhMuc_DS]) == false) {
            return;
        }
    ?>
        <a class="btn btn-primary" href="/index.php?module=quanlythuoc&controller=danhmuc&action=index">
            <i class="fa fa-plus"></i> Xem danh mục</a>
    <?php
    }

    public static function btnThemDanhMuc()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DanhMuc_Post]) == false) {
            return;
        }
    ?>
        <a class="btn btn-primary" href="/index.php?module=quanlythuoc&controller=danhmuc&action=post">
            <i class="fa fa-plus"></i> Thêm mới</a>
    <?php
    }

    public static function btnSuaDanhMuc($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin,\Model\User::QuanLy, Permission::QLT_DanhMuc_Put]) == false) {
            return;
        }
    ?>
        <a class="btn btn-success" href="/index.php?module=quanlythuoc&controller=danhmuc&action=put&id=<?php echo $id; ?>">
            Sửa
        </a>
    <?php
    }

    public static function btnXoaDanhMuc($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DanhMuc_Delete]) == false) {
            return;
        }
    ?>
        <a class="btn btn-danger" title="Bạn có muốn xóa danh mục này?" href="/index.php?module=quanlythuoc&controller=danhmuc&action=isdelete&id=<?php echo $id; ?>">
            Xóa
        </a>
    <?php
    }

    public static function btnThemPhieuXuatNhap()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin,\Model\User::QuanLy, Permission::QLT_Phieu_Post]) == false) {
            return;
        }
    ?>
        <a class="btn btn-success" href="/index.php?module=quanlythuoc&controller=phieuxuatnhap&action=post&isnews=1">
            <i class="fa fa-plus"></i> Thêm Phiếu Mới
        </a>
    <?php
    }

    public static function btnSuaPhieuXuatNhap($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin,\Model\User::QuanLy, Permission::QLT_Phieu_Put]) == false) {
            return;
        }
    ?>
        <a class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Sửa phiếu" href="/index.php?module=quanlythuoc&controller=phieuxuatnhap&action=put&id=<?php echo $id; ?>">
            Sửa
        </a>
    <?php
    }

    public static function btnXoaPhieuXuatNhap($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin,\Model\User::QuanLy, Permission::QLT_Phieu_Delete]) == false) {
            return;
        }
    ?>
        <a class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa phiếu" title="Bạn có muốn xóa phiếu này?" href="/index.php?module=quanlythuoc&controller=phieuxuatnhap&action=isdelete&id=<?php echo $id; ?>">
            Xóa
        </a>
    <?php
    }

    public static function btnChiTietPhieuXuatNhap($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy,Permission::QLT_Phieu_Detail]) == false) {
            return;
        }
    ?>
        <a class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Xem phiếu" href="/quanlythuoc/phieuxuatnhap/detail/<?php echo $id; ?>">
            Chi Tiết
        </a>
<?php
    }
}
