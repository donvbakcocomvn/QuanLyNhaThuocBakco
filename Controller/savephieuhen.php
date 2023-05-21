<?php

namespace Controller;

use Model\Common;
use Model\Request;
use Module\congty\Model\DatLich;

class savephieuhen extends \Application
{

    public function __construct()
    {
        self::$_Theme = "ViewPublic";
    }

    function index()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $dl = new DatLich();
        $data["Code"] = time();
        $dl->Post($data);
        
    }

    function viewdonthuoc()
    {
        $alias = \Model\Request::Get("param", "");
        $pages = new \Module\baiviet\Model\Pages\PagesService();
        $item = $pages->GetByAlias($alias);
        if ($item == null) {
            \Model\Common::ToUrl("/index/loi404");
        }
        $this->View(["Item" => $item]);
    }

    function loi404()
    {
        $this->View();
    }

}