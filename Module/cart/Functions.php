<?php

namespace Module\cart;

class Functions {

    //put your code here
    public function __construct() {
        
    }

    static function menulayout($module) {
        echo $module;
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "Module_baiviet"]) == true) {
            ?> 
            <li class="treeview <?php echo $module == 'giaodien' ? 'active' : '' ?>">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Giao Diện</span> 
                </a>
                <ul class="treeview-menu">
                    <li><a href="/giaodien/slider/"><i class="fa fa-circle-o"></i> Banner Động</a></li>
                    <li><a href="/giaodien/menu/"><i class="fa fa-circle-o"></i> Menu</a></li>

                </ul>
            </li>
            <?php
        }
    }

}
