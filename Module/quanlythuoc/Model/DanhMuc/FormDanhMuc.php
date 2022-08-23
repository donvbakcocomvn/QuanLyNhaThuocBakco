<?php

namespace Module\quanlysanpham\Model\DanhMuc;

use PFBC\Element;
use Model\FormRender;

class FormDanhMuc implements iFormDanhMuc {

    static $properties = ["class" => "form-control"];
    static $ElementsName = "DanhMuc";

    //put your code here
    public function __construct() {
        
    }

    public static function Banner($val = null) {
        
    }

    public static function Id($val = null) {
         $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Hidden($name,$val));
    }

    public static function IsPublic($val = null) {
        
    }

    public static function Lang($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        $options = \Model\Lang::ToOptions();
        return new FormRender(new Element\Select("Ngôn Ngữ", $name, $options, $properties));
    }

    public static function Link($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Link", $name, $properties));
    }

    public static function Name($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Tên Danh Mục", $name, $properties));
    }

    public static function Note($val = null) {
        
    }

    public static function Path($val = null) {
        
    }

    public static function STT($val = null) {
        
    }

    public static function parentsId($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val; 
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        $options = \Module\quanlysanpham\Model\DanhMuc::CapChaTpOptions();
        $opLaCapCha = ["" => "Là Cấp Cha"];
        $options = $opLaCapCha + $options;
        return new FormRender(new Element\Select("Cấp Cha", $name, $options, $properties));
    }

    public static function des($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textarea("Mô Tả", $name, $properties));
    }

    public static function keyword($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textarea("Từ Khóa", $name, $properties));
    }

    public static function title($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textarea("Tiêu Đề", $name, $properties));
    }

}
