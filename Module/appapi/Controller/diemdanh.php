<?php

namespace Module\appapi\Controller;

class diemdanh extends \Application {

    public function __construct() {

    }

    function checkbyqrcode() {
        $code = \Model\Request::Post("Code", []);
        $codeDecode = base64_decode($code);
        $codeDecode = explode("|", $codeDecode);
        $user = new \Model\UserService();
        $codeDecode[0] = \Model\Common::TextInputNoHtml($codeDecode[0]);
        $item = new \Model\User($user->GetByUsername($codeDecode[0]));

        echo json_encode($item->ToArray());
    }

}
