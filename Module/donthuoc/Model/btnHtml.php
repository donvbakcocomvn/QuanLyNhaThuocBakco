<?php

namespace Module\donthuoc\Model;

use Module\donthuoc\Permission;

class btnHtml
{

    public function __construct()
    {
    }

    public static function btnchitiet($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin,\Model\User::QuanLy, Permission::QLT_DonThuoc_Detail]) == false) {
            return;
        }
    ?>
        <a class="btn btn-primary" href="/index.php?module=donthuoc&controller=index&action=viewdonthuoc&id=<?php echo $id; ?>">
            Chi tiết
        </a>
    <?php
    }

    public static function btnViewToaThuoc()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DonThuoc_DS]) == false) {
            return;
        }
    ?>
        <a class="btn btn-primary" href="/donthuoc">
            <i class="fa fa-plus"></i> Xem danh mục</a>
    <?php
    }

    public static function btnThemDonThuoc()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy,Permission::QLT_DonThuoc_Post]) == false) {
            return;
        }
    ?>
        <a class="btn btn-primary" href="/index.php?module=donthuoc&controller=index&action=post&isnew=1">
            <i class="fa fa-plus"></i> Thêm Toa Thuốc Mới</a>
    <?php
    }

    public static function btnCapNhatNgayDung()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy,Permission::QLT_DonThuoc_Put]) == false) {
            return;
        }
    ?>
        <button class="btn btn-success" id="btn-capnhattongngaydungthuoc">
            Cập Nhật
        </button>
    <?php
    }

    public static function btnSuaDonThuoc($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy,Permission::QLT_DonThuoc_Put]) == false) {
            return;
        }
    ?>
        <a class="btn btn-success no-print" href="/index.php?module=donthuoc&controller=index&action=put&id=<?php echo $id; ?>">
            Sửa đơn
        </a>
    <?php
    }

    public static function btnCopyDonThuoc($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy,Permission::QLT_DonThuoc_Copy]) == false) {
            return;
        }
    ?>
        <a class="btn btn-warning" href="/index.php?module=donthuoc&controller=index&action=copy&id=<?php echo $id; ?>">
            Copy
        </a>
    <?php
    }

    public static function btnXoaDonThuoc($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy,Permission::QLT_DonThuoc_Delete]) == false) {
            return;
        }
    ?>
        <a class="btn btn-danger" title="Bạn có muốn xóa danh mục này?" href="/index.php?module=donthuoc&controller=index&action=delete&id=<?php echo $id; ?>">
            Xóa
        </a>
<?php
    }
}
