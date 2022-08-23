<?php

namespace Module\quanlysanpham\Model;

class btnHtml {

    public function __construct() {
        
    } 

    static function btnThemSanPham() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "quanlysanpham_sanpham_them"]) == false) {
            return;
        }
        ?> 
        <li class="active"><a href="/index.php?module=quanlysanpham&controller=sanpham&action=post">
                <i class="fa fa-plus"></i>Thêm Mới</a>
        </li>
        <?php
    }

    public static function btnViewSanPham() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "quanlysanpham_sanpham_them"]) == false) {
            return;
        }
        ?> 
        <li><a href="/quanlysanpham/sanpham/index/">
                <i class="fa fa-list-alt"></i>Danh Sách Sản Phẩm</a>
        </li>

        <?php
    }

    public static function btnViewDanhMuc() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "quanlysanpham_danhmuc_view"]) == false) {
            return;
        }
        ?> 
        <li><a href="/index.php?module=quanlysanpham&controller=danhmuc&action=index">
                <i class="fa fa-list-alt"></i>Danh Muc</a>
        </li>

        <?php
    }

    public static function btnViewOptions() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "quanlysanpham_options_view"]) == false) {
            return;
        }
        ?> 
        <li><a href="/index.php?module=quanlysanpham&controller=options&action=index">
                <i class="fa fa-list-alt"></i>Thuộc Tính</a>
        </li>
        <?php
    }

    public static function btnThemDanhMuc() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "quanlysanpham_danhmuc_post"]) == false) {
            return;
        }
        ?> 
        <a class="btn btn-success" href="/index.php?module=quanlysanpham&controller=danhmuc&action=post">
            <i class="fa fa-plus"></i> Thêm mới</a> 
        <?php
    }

    public static function btnSuaDanhMuc($id) {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "quanlysanpham_danhmuc_put"]) == false) {
            return;
        }
        ?> 
        <a class="btn btn-success" href="/index.php?module=quanlysanpham&controller=danhmuc&action=put&id=<?php echo $id; ?>">
            Sửa
        </a> 
        <?php
    }

    public static function btnXoaDanhMuc($id) {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "quanlysanpham_danhmuc_delete"]) == false) {
            return;
        }
        ?> 
        <a class="btn btn-danger" title="Bạn có muốn xóa danh mục này?" href="/index.php?module=quanlysanpham&controller=danhmuc&action=delete&id=<?php echo $id; ?>">
            Xóa
        </a> 
        <?php
    }

}
