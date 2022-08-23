<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormSanPham
 *
 * @author MSI
 */

namespace Module\quanlysanpham\Model\SanPham;

use PFBC\Element;
use Model\FormRender;

class FormSanPham implements iFormSanPham {

    static $properties = ["class" => "form-control"];
    static $ElementsName = "SanPham";

    public function __construct() {
        
    }

    //put your code here
    public static function Alias($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Perlink", $name, $properties));
    }

    public static function BuyTimes($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Số Lần Mua", $name, $properties));
    }

    public static function Content($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties["id"] = "content";
        $properties["class"] = "editorContent";
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textarea("Nội Dung", $name, $properties));
    }

    public static function DanhMucId($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        $options = \Module\quanlysanpham\Model\DanhMuc::CapChaTpOptions();
        return new FormRender(new Element\Select("Danh Mục", $name, $options, $properties));
    }

    public static function DateCreate($val = null) {
        
    }

    public static function Id($val = null) {
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Hidden($name, $val));
    }

    public static function Lang($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        $options = \Model\Lang::ToOptions();
        return new FormRender(new Element\Select("Ngôn Ngữ", $name, $options, $properties));
    }

    public static function Name($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Tên Sản Phẩm", $name, $properties));
    }

    public static function Note($val = null) {
        
    }

    public static function Number($val = null) {
        $properties = self::$properties;
        $properties["value"] = number_format($val, 0, ".", ",");
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Số Lượng Sản Phẩm", $name, $properties));
    }

    public static function Price($val = null) {
        $properties = self::$properties;
        $properties["value"] = number_format($val, 0, ".", ",");
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Giá Sản Phẩm", $name, $properties));
    }

    public static function STT($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("STT", $name, $properties));
    }

    public static function Summary($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val; 
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textarea("Mô Tả Ngắn", $name, $properties));
    }

    public static function UrlImages($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
//        $properties["style"] = "display:none";

        $properties["id"] = __FUNCTION__;
        $properties[FormRender::Readonly] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Hình Đại Diện", $name, $properties));
    }

    public static function Username($val = null) {
        
    }

    public static function Views($val = null) {
         $properties = self::$properties;
        $properties["value"] =  $val;
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Lượt Xem", $name, $properties));
    }

    public static function isShow($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        $options = [1 => "Hiện", 0 => "Ẩn"];
        return new FormRender(new Element\Select("Hiển Thị", $name, $options, $properties));
    }

    public static function oldPrice($val = null) {
        $properties = self::$properties;
        $properties["value"] = number_format($val, 0, ".", ",");
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Giá Cũ", $name, $properties));
    }

    public static function Des($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;

        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textarea("Mô Tả", $name, $properties));
    }

    public static function Keyword($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textarea("Từ Khóa", $name, $properties));
    }

    public static function Title($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textarea("Tiêu Đề", $name, $properties));
    }

}
