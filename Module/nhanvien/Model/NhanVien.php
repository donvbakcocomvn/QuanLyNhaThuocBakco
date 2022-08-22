<?php

namespace Module\nhanvien\Model;

class NhanVien extends \Model\User {

    //put your code here

    public function __construct($user = null) {
        parent::__construct($user);
    }

    function btnSua($content = null, $class = null) {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "NhanVienSua"]) == false) {
            return;
        }
        if ($content === null) {
            $content = "Sửa";
        }
        if ($class === null) {
            $class = "btn btn-sm btn-primary";
        }

        $btn = <<<BTNSUA
                <a class="{$class}"  href="/nhanvien/index/put/{$this->Id}" >{$content}</a>

BTNSUA;
        return $btn;
    }

}
