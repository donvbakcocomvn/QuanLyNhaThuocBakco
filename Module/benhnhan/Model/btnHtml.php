<?php

namespace Module\benhnhan\Model;

use Module\benhnhan\Permission;

class btnHtml
{

    public function __construct()
    {
    }


    static function btnExportKhachHang()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, Permission::QLT_BenhNhan_Export]) == false) {
            return;
        }
    ?>
        <a class="btn btn-warning" href="/index.php?module=benhnhan&controller=index&action=export">
            <i class="fa fa-filter"></i> Export</a>
    <?php
    }

    public static function btnViewKhachHang()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, Permission::QLT_BenhNhan_DS]) == false) {
            return;
        }
    ?>
        <a class="btn btn-primary" href="/benhnhan">
            <i class="fa fa-plus"></i> Xem danh mục</a>
    <?php
    }

    public static function btnThemKhachHang()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, Permission::QLT_BenhNhan_Post]) == false) {
            return;
        }
    ?>
        <a class="btn btn-success" href="index.php?module=benhnhan&controller=index&action=post">
            <i class="fa fa-plus"></i> Thêm mới</a>
    <?php
    }

    public static function btnSuaKhachHang($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, Permission::QLT_BenhNhan_Put]) == false) {
            return;
        }
    ?>
        <a class="btn btn-success" href="/index.php?module=benhnhan&controller=index&action=put&id=<?php echo $id; ?>">
            Sửa
        </a>
    <?php
    }

    public static function btnXoaKhachHang($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, Permission::QLT_BenhNhan_Delete]) == false) {
            return;
        }
    ?>
        <a class="btn btn-danger" title="Bạn có muốn xóa danh mục này?" href="/index.php?module=benhnhan&controller=index&action=delete&id=<?php echo $id; ?>">
            Xóa
        </a>
<?php
    }
}
