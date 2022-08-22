<?php

namespace Module\qrcode\Controller;

class index extends \Application {

    public function __construct() {
        new \Controller\backend();
    }

    function index() {

        $this->View();
    }

}
