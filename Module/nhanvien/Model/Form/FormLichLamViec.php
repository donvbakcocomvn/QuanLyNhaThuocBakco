<?php

namespace Module\nhanvien\Model\Form;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormLichLamViec
 *
 * @author MSI
 */
use Model\FormRender;
use PFBC\Element;

class FormLichLamViec implements IFormLichLamViec {

    static $FormName = "LichLamViec";
    static $properties = ["class" => "form-control"];

    public function __construct() {

    }

    //put your code here
    public static function CaLamViec($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $options = \Module\nhanvien\Model\CaLamViec::ToSelect();
        $options = ["" => "Chọn Ca Làm Việc"] + $options;
        return new FormRender(new Element\Select("Ca Làm Việc", $name, $options, $properties));
    }

    public static function Id($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Readonly] = $val;
        return new FormRender(new Element\Textbox("Mã", $name, $properties));
    }

    public static function IdNhanVien($val = null, $isHiden = false) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties["class"] = "select2";
        $properties["style"] = "width:100%";
        if ($isHiden) {
            return new FormRender(new Element\Hidden($name, $val));
        }
        $options = \Model\UserService::ToSelect();
        return new FormRender(new Element\Select("Nhân Viên", $name, $options, $properties));
    }

    public static function Ngay($val = null, $isHiden = false) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties["type"] = "date";
        if ($isHiden) {
            return new FormRender(new Element\Hidden($name, $val));
        }
        return new FormRender(new Element\Textbox("Ngày", $name, $properties));
    }

    public static function setName($name) {
        return self::$FormName . "[{$name}]";
    }

}
