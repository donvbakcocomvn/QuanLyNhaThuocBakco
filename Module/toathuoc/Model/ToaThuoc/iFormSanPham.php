<?php
namespace Module\quanlysanpham\Model\SanPham;
interface iFormSanPham {

    static public function Id($val = null);

    static public function Name($val = null);

    static public function DanhMucId($val = null);

    static public function Alias($val = null);
    static public function Des($val = null);
    static public function Title($val = null);
    static public function Keyword($val = null);

    static public function Username($val = null);

    static public function Price($val = null);

    static public function oldPrice($val = null);

    static public function Summary($val = null);

    static public function Content($val = null);

    static public function UrlImages($val = null);

    static public function DateCreate($val = null);

    static public function Number($val = null);

    static public function Note($val = null);

    static public function BuyTimes($val = null);

    static public function Views($val = null);

    static public function isShow($val = null);

    static public function STT($val = null);

    static public function Lang($val = null);
}
