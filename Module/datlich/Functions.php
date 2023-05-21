<?php

namespace Module\congty;

class Functions {

    //put your code here

    static function menulayout($module) {

        if (\Model\Permission::CheckPremision([\Model\User::Admin, "NhanVienView"]) == true) {
            ?>
            <li class="treeview <?php echo ($module == 'congty') && (\Application::$_Controller == 'index') ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Công Ty</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/congty/index/"><i class="fa fa-user"></i> Cơ Cấu Tổ Chức</a></li>
                </ul>
            </li>
            <?php
        }
    }

}
