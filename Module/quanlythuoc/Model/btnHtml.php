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
        if (\Model\Permission::CheckPremision([\Model\User::Admin, Permission::QLT_Thuoc_Post, Permission::QLT_Thuoc_Put,Permission::QLT_DanhMuc_Delete, Permission::QLT_DanhMuc_Import]) == false) {
            return;
        }
    ?>
        <a class="btn btn-warning" href="/index.php?module=quanlythuoc&controller=sanpham&action=import">
            <i class="fa fa-filter"></i> Import</a>
    <?php
    }

    static function btnThemSanPham()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, Permission::QLT_Thuoc_Post]) == false) {
            return;
        }
    ?>
        <a class="btn btn-info" href="/index.php?module=quanlythuoc&controller=sanpham&action=post">
            <i class="fa fa-plus"></i> Thêm mới</a>
    <?php
    }

    public static function btnViewSanPham()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, Permission::QLT_Thuoc_DS]) == false) {
            return;
        }
    ?>
        <a class="btn btn-success" href="/index.php?module=quanlythuoc&controller=sanpham&action=index">
            <i class="fa fa-plus"></i> Xem danh sách thuốc</a>
    <?php
    }

    public static function btnSuaSanPham($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, Permission::QLT_Thuoc_Put]) == false) {
            return;
        }
    ?>
        <a class="btn btn-success" href="/index.php?module=quanlythuoc&controller=sanpham&action=put&id=<?php echo $id; ?>">
            Sửa
        </a>
    <?php
    }

    public static function btnChiSanPham($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, Permission::QLT_Thuoc_Put]) == false) {
            return;
        }
    ?>
        <a class="btn btn-warning" href="/index.php?module=quanlythuoc&controller=sanpham&action=detail&id=<?php echo $id; ?>">
            Chi Tiết
        </a>
    <?php
    }

    public static function btnXoaSanPham($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, Permission::QLT_Thuoc_Delete]) == false) {
            return;
        }
    ?>
        <a class="btn btn-danger" title="Bạn có muốn xóa danh mục này?" href="/index.php?module=quanlythuoc&controller=sanpham&action=isdelete&id=<?php echo $id; ?>">
            Xóa
        </a>
    <?php
    }

    public static function btnViewDanhMuc()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, Permission::QLT_DanhMuc_DS]) == false) {
            return;
        }
    ?>
        <a class="btn btn-primary" href="/index.php?module=quanlythuoc&controller=danhmuc&action=index">
            <i class="fa fa-plus"></i> Xem danh mục</a>
    <?php
    }

    public static function btnThemDanhMuc()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, Permission::QLT_DanhMuc_Post]) == false) {
            return;
        }
    ?>
        <a class="btn btn-success" href="/index.php?module=quanlythuoc&controller=danhmuc&action=post">
            <i class="fa fa-plus"></i> Thêm mới</a>
    <?php
    }

    public static function btnSuaDanhMuc($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, Permission::QLT_DanhMuc_Put]) == false) {
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
        if (\Model\Permission::CheckPremision([\Model\User::Admin, Permission::QLT_DanhMuc_Delete]) == false) {
            return;
        }
    ?>
        <a class="btn btn-danger" title="Bạn có muốn xóa danh mục này?" href="/index.php?module=quanlythuoc&controller=danhmuc&action=delete&id=<?php echo $id; ?>">
            Xóa
        </a>
<?php
    }
}
