<?php

namespace Module\nhanvien;

class Functions {

    public function __construct() {

    }

    static function menulayout($module) {

        if (\Model\Permission::CheckPremision([\Model\User::Admin, "NhanVienView"]) == true) {
            ?>
            <li class="treeview <?php echo ($module == 'nhanvien') && (\Application::$_Controller == 'index') ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Nhân Viên</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/nhanvien/index/"><i class="fa fa-user"></i> Danh Sách Nhân Viên</a></li>


                </ul>
            </li>
            <?php
        }
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "LichLamViecView"]) == true) {
            ?>
            <li class="treeview <?php echo ($module == 'nhanvien') && (in_array(\Application::$_Controller, ["calamviec", "lichlamviec"])) ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Lịch Làm Việc</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/nhanvien/lichlamviec/index/"><i class="fa fa-user"></i> Lịch làm việc</a></li>
                    <li><a href="/nhanvien/calamviec/index/"><i class="fa fa-user"></i> Ca làm việc</a></li>
                </ul>
            </li>
            <?php
        }
    }

}
