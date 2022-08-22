<?php

namespace HangSanXuat\Model;

use PFBC\Element;
use Model\FormRender;

class FormNhaCungCap implements iFormNhaCungCap {

    static public $className = "form-control";
    static public $FormName = "NhaCungCap";

    public function __construct() {

    }

    public static function Content($val = null) {
        $name = self::GetFormName(__FUNCTION__);
        $properties["value"] = $val;
        $properties["class"] = self::$className;
        return new FormRender(new Element\Textarea("Nội Dung", $name, $properties));
    }

    public static function Id($val = null) {
        $name = self::GetFormName(__FUNCTION__);
        $properties["value"] = $val;
        $properties["class"] = self::$className;
        $properties[FormRender::Required] = true;
        return new FormRender(new Element\Textbox("Mã", $name, $properties));
    }

    public static function Images($val = null) {
        $name = self::GetFormName(__FUNCTION__);
        $properties["value"] = $val;
        $properties["Id"] = "Id-" . __FUNCTION__;
        $properties["class"] = self::$className;

        return new FormRender(new Element\Textbox("Hình Ảnh", $name, $properties));
    }

    public static function Name($val = null) {
        $name = self::GetFormName(__FUNCTION__);
        $properties["value"] = $val;
        $properties["class"] = self::$className;
        $properties[FormRender::Required] = true;
        return new FormRender(new Element\Textbox("Tên", $name, $properties));
    }

    public static function STT($val = null) {
        $name = self::GetFormName(__FUNCTION__);
        $properties["value"] = $val;
        $properties["class"] = self::$className;

        return new FormRender(new Element\Textbox("STT", $name, $properties));
    }

    public static function Summary($val = null) {
        $name = self::GetFormName(__FUNCTION__);
        $properties["value"] = $val;
        $properties["class"] = self::$className;
        return new FormRender(new Element\Textarea("Mô Tả Ngắn", $name, $properties));
    }

    private static function GetFormName($name) {
        return self::$FormName . "[{$name}]";
    }

}
