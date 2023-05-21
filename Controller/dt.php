<?php

namespace Controller;

use Module\benhnhan\Model\BenhNhan;
use Module\datlich\Model\DatLich;
use Module\donthuoc\Model\DonThuoc;

class dt extends \Application
{

    public function __construct()
    {
        self::$_Theme = "ViewPublic";
    }

    function index()
    {
        $this->View();
    }
    public function printbn()
    {
        $this->View();

    }
    function detail()
    {
        $id = \Model\Request::Get("id", "");
        $item = new DonThuoc($id);
        $this->View(["Item" => $item]);
    }
    function bn()
    {
        $id = \Model\Request::Get("id", "");
        $item = new BenhNhan($id);
        $this->View(["Item" => (array) $item]);
    }
    function ph()
    {
        $id = \Model\Request::Get("id", "");
        $item = new DatLich($id);
        $this->View(["Item" => (array) $item]);
    }

    function loi404()
    {
        $this->View();
    }

}