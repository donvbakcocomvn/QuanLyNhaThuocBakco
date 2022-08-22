<?php

namespace Module\baocao;

class Functions {

    //put your code here

    static function menulayout($module) {
        ?>
        <li class="<?php echo \Application::$_Module == "baocao" ? 'active' : '' ?> treeview">
            <a href="#">
                <i class="fa fa-info"></i> <span>Báo Cáo</span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/baocao/index/day" >Báo Cáo Ngày</a></li>
                <li><a href="/baocao/index/month" >Báo Cáo Tuần</a></li>
                <li><a href="/baocao/index/year" >Báo Cáo Tháng</a></li>
            </ul>
        </li>
        <?php
    }

}
