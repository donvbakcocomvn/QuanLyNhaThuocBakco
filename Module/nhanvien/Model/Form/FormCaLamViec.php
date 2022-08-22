<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Module\nhanvien\Model\Form;

/**
 * Description of FormCaLamViec
 *
 * @author MSI
 */
use Model\FormRender;
use PFBC\Element;

class FormCaLamViec implements IFormCaLamViec {

    static $FormName = "LichLamViec";
    static $properties = ["class" => "form-control"];

    //put your code here
    public static function Code($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("Ca Làm Việc", $name, $properties));
    }

    public static function Des($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textarea("Ca Làm Việc", $name, $properties));
    }

    public static function Id($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("Ca Làm Việc", $name, $properties));
    }

    public static function Name($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("Ca Làm Việc", $name, $properties));
    }

    public static function setName($name) {
        return self::$FormName . "[{$name}]";
    }

}
