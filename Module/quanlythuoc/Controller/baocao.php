<?php
namespace Module\quanlythuoc\Controller;

use Model\Request;
use Module\quanlythuoc\Model\SanPham;

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
    public function thuoc()
    {
        $baoCao = new \Module\quanlythuoc\Model\BaoCao();
        $idThuoc = $this->getParams(0);
        $fromDate = Request::Get("FromDate", "");
        $toDate = Request::Get("ToDate", "");
        $xuatNhap = Request::Get("Type", "1");
        $data = $baoCao->GetSoLanNhapTheoThuoc($idThuoc, $fromDate, $toDate, $xuatNhap);
        $thuoc = new SanPham($idThuoc);
        $this->View(["Item" => $data, "Thuoc" => (array) $thuoc]);
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