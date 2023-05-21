<?php
namespace Module\quanlythuoc\Controller;

use Model\Request;

class baocao extends \Application implements \Controller\IControllerBE
{

    public function __construct()
    {
        new \Controller\backend();
        self::$_Theme = "backend";
    }
    public function index()
    {
        $baoCao = new \Module\quanlythuoc\Model\BaoCao();
        $fromDate = Request::Get("FromDate", "");
        $toDate = Request::Get("ToDate", "");
        $xuatNhap = Request::Get("Type", "");
        $data = $baoCao->GetSoLanNhapThuoc($fromDate, $toDate, $xuatNhap);
        $this->View(["Item" => $data]);
    }

    /**
     * @return mixed
     */
    public function post()
    {

    }

    /**
     * @return mixed
     */
    public function put()
    {

    }
    public function delete()
    {

    }
}


?>