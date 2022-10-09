<?php

namespace Module\benhnhan\Model;

use Module\benhnhan\Permission;
use Module\donthuoc\Permission as DonthuocPermission;

class btnHtml
{

    public function __construct()
    {
    }

    public static function btnViewKhachHangTrongNgay()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_BenhNhan_DS]) == false) {
            return;
        }
?>
        <a class="btn btn-warning" <?php echo \Model\FormRender::ToolTip("Danh sách bệnh nhân trong ngày hôm nay"); ?> href="/thongke/benhnhantrongngay">
            <i class="fa fa-list-alt"></i> Bệnh nhân trong ngày </a>
    <?php
    }

    public static function btnchitiet($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_BenhNhan_Detail]) == false) {
            return;
        }
    ?>
        <a class="btn btn-default" <?php echo \Model\FormRender::ToolTip("Thông tin chi tiết"); ?> href="/index.php?module=benhnhan&controller=index&action=detail&id=<?php echo $id; ?>">
            <i class="fa fa-eye text-yellow"></i>
        </a>
    <?php
    }

    public static function btnViewKhachHang()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, DonthuocPermission::QLT_DonThuoc_Copy, DonthuocPermission::QLT_DonThuoc_Delete,DonthuocPermission::QLT_DonThuoc_Detail,DonthuocPermission::QLT_DonThuoc_DS,DonthuocPermission::QLT_DonThuoc_Export,DonthuocPermission::QLT_DonThuoc_Post,DonthuocPermission::QLT_DonThuoc_Put]) == false) {
            return;
        }
    ?>
        <a class="btn btn-primary" href="/benhnhan" <?php echo \Model\FormRender::ToolTip("Danh sách thông tin tất cả bệnh nhân"); ?>>
            &nbsp;<i class="fa fa-th-list"></i> Danh sách bệnh nhân</a>
    <?php
    }

    public static function btnThemKhachHang()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_BenhNhan_Post]) == false) {
            return;
        }
    ?>
        <a class="btn btn-info" href="/index.php?module=benhnhan&controller=index&action=post">
            <i class="fa fa-plus"></i> Thêm mới</a>
    <?php
    }

    public static function btnSuaKhachHang($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_BenhNhan_Put]) == false) {
            return;
        }
    ?>
        <a class="btn btn-default" <?php echo \Model\FormRender::ToolTip("Sửa bệnh nhân"); ?> href="/index.php?module=benhnhan&controller=index&action=put&id=<?php echo $id; ?>">
            <i class="fa fa-pencil text-blue"></i>
        </a>
    <?php
    }

    public static function btnExport()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_BenhNhan_Delete,Permission::QLT_BenhNhan_Detail,Permission::QLT_BenhNhan_Post,Permission::QLT_BenhNhan_Put,Permission::QLT_BenhNhan_DS]) == false) {
            return;
        }
    ?>
        <a class="btn btn-success" <?php echo \Model\FormRender::ToolTip("Export danh sách bệnh nhân ra Excel"); ?> href="/index.php?module=benhnhan&controller=index&action=export">
            <i class="fa fa-filter"></i> Export</a>
        </a>
    <?php
    }

    public static function btnXoaKhachHang($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_BenhNhan_Delete]) == false) {
            return;
        }
    ?>
        <a class="btn btn-default" onclick="return confirm('Bạn có muốn xóa bệnh nhân này không ?')" <?php echo \Model\FormRender::ToolTip("Xóa bệnh nhân"); ?> title="Bạn có muốn xóa danh mục này?" href="/index.php?module=benhnhan&controller=index&action=isdelete&id=<?php echo $id; ?>">
            <i class="fa fa-trash-o text-red"></i>
        </a>
<?php
    }
}
