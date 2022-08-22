<?php

namespace Module\congty\Model;

use Model\FormRender;
use PFBC\Element;

class FormCoCauToChuc implements IFormCoCauToChuc {

    static $FormName = "LichLamViec";
    static $properties = ["class" => "form-control"];

    public function __construct() {

    }

    public static function CapTren($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $options = CoCauToChuc::ToSelect();
        $options = ["" => "Phòng Cao Nhất"] + $options;
        return new FormRender(new Element\Select("Ca Làm Việc", $name, $options, $properties));
    }

    public static function ChucVu($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $options = CoCauToChuc::ToSelect();
        $options = ["" => "Phòng Cao Nhất"] + $options;
        return new FormRender(new Element\Select("Ca Làm Việc", $name, $options, $properties));
    }

    public static function Id($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("Mã", $name, $properties));
    }

    public static function IdChucVu($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return \Model\FormCommon::Select($label, $name, "chucvu", $properties);
    }

    public static function IdPhongBam($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return \Model\FormCommon::Select($label, $name, "phongban", $properties);
    }

    public static function Name($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("Mã", $name, $properties));
    }

    public static function setName($name) {
        return self::$FormName . "[{$name}]";
    }

}
