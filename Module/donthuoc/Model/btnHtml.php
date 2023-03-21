<?php

namespace Module\donthuoc\Model;

use Module\donthuoc\Permission;

class btnHtml
{

    public function __construct()
    {
    }

    public static function btnsoanthuoc($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy]) == false) {
            return;
        }
?>
        <a type="button" class="btn btn-default text-blue btn-outline-primary" href="/index.php?module=donthuoc&controller=index&action=soanthuoc&id=<?php echo $id; ?>">
            Soạn đơn
        </a>
    <?php
    }

    public static function btnhoanthanhsoandon($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, "Giao_Thuoc"]) == false) {
            return;
        }
        $donThuoc = new DonThuoc($id);
        if ($donThuoc->Status == 3) {
            return;
        }
    ?>
        <a onclick="return confirm('Bạn đã giao thuốc cho bệnh nhân?')" class="btn btn-info no-print" href="/index.php?module=donthuoc&controller=index&action=giaothuoc&id=<?php echo $id; ?>">
            Giao thuốc
        </a>
    <?php
    }

    public static function btnchitiet($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DonThuoc_Detail]) == false) {
            return;
        }
    ?>
        <a class="btn btn-default" <?php echo \Model\FormRender::ToolTip("Chi tiết đơn thuốc"); ?> href="/index.php?module=donthuoc&controller=index&action=viewdonthuoc&id=<?php echo $id; ?>">
            <i class="fa fa-eye text-yellow"></i>
            <span>Chi tiết đơn thuốc</span>
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
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DonThuoc_Post]) == false) {
            return;
        }
    ?>
        <a class="btn btn-info" <?php echo \Model\FormRender::ToolTip("Thêm đơn thuốc mới"); ?> href="/index.php?module=donthuoc&controller=index&action=post&isnew=1">
            <i class="fa fa-plus"></i> Thêm đơn thuốc</a>
    <?php
    }

    public static function btnExportBySearch()
    {
        // $keyword = isset($_GET["keyword"]) ? \Model\Common::TextInput($_GET["keyword"]) : "";
        // $fromdate = isset($_GET["fromdate"]) ? \Model\Common::TextInput($_GET["fromdate"]) : "";
        // $todate = isset($_GET["todate"]) ? \Model\Common::TextInput($_GET["todate"]) : "";
        // $status = isset($_GET["status"]) ? \Model\Common::TextInput($_GET["status"]) : "";
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy]) == false) {
            return;
        }
    ?>
        <button class="btn btn-success" name="btnExport" type="submit" <?php echo \Model\FormRender::ToolTip("Export danh sách theo bộ lọc tìm kiếm"); ?>>
            <i class="fa fa-filter"></i>&nbsp;Export danh sách</button>
    <?php
    }

    public static function btnCapNhatNgayDung()
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DonThuoc_Put, Permission::QLT_DonThuoc_Post, Permission::QLT_DonThuoc_Copy]) == false) {
            return;
        }
    ?>
        <button type="button" <?php echo \Model\FormRender::ToolTip("Cập nhật tổng ngày dùng thuốc"); ?> class="btn btn-info" id="btn-capnhattongngaydungthuoc">
            Cập nhật
        </button>
    <?php
    }

    public static function btnSuaDonThuoc($id)
    {
        if (
            \Model\Permission::CheckPremision([
                \Model\User::Admin,
                \Model\User::QuanLy,
                Permission::QLT_DonThuoc_Put
            ]) == false
        ) {
            return;
        }
    ?>
        <a class="btn btn-default no-print" <?php echo \Model\FormRender::ToolTip("Sửa đơn thuốc"); ?> href="/index.php?module=donthuoc&isnew=1&controller=index&action=put&id=<?php echo $id; ?>">
            <i class="fa fa-pencil text-blue"></i>
            <span>Sửa đơn thuốc</span>
        </a>
    <?php
    }

    public static function btnCopyDonThuoc($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DonThuoc_Copy]) == false) {
            return;
        }
    ?>
        <a class="btn  " <?php echo \Model\FormRender::ToolTip("Sao chép đơn thuốc"); ?> href="/donthuoc/index/copy/?id=<?php echo $id; ?>">
            <i class="fa fa-files-o"></i>
            <span>Sao chép đơn thuốc</span>
        </a>
        <a class="btn " <?php echo \Model\FormRender::ToolTip("Sao chép đơn thuốc cho bệnh nhân khác"); ?> href="/donthuoc/index/copy/?id=<?php echo $id; ?>&isnew=1">
            <i class="fa fa-files-o"></i>
            <span>Sao chép đơn thuốc cho bệnh nhân khác</span>
        </a>
    <?php
    }

    public static function btnXoaDonThuoc($id)
    {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Model\User::QuanLy, Permission::QLT_DonThuoc_Delete]) == false) {
            return;
        }
    ?>
        <a class="btn   btn-danger" title="Bạn có muốn xóa đơn thuốc này?" href="/donthuoc/index/delete/?id=<?php echo $id; ?>">
            <i class="fa fa-times"></i> <span>Xóa</span> 
        </a>
<?php
    }
}
