<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Module\baiviet\Model\Pages;

use Model\FormRender;
use PFBC\Element;

/**
 * Description of FormPages
 *
 * @author MSI
 */
class FormPages implements IFormPages {

    static $FormName = "Duan";
    static $properties = ["class" => "form-control"];

    //put your code here
    public static function Alias($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("Tên Không Dấu", $name, $properties));
    }

    public static function Content($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties["class"] = "editorContent";
        $properties["id"] = __FUNCTION__;
        return new FormRender(new Element\Textarea("Nội Dung", $name, $properties));
    }

    public static function Des($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textarea("Mô Tả", $name, $properties));
    }

    public static function Id($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Readonly] = $val;
        return new FormRender(new Element\Textbox("Mã", $name, $properties));
    }

    public static function Images($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Readonly] = "";
        $properties["id"] = "Input_" . __FUNCTION__;
        return new FormRender(new Element\Textbox("Hinh", $name, $properties));
    }

    public static function Keyword($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textarea("Từ Khóa", $name, $properties));
    }

    public static function Name($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("Tên Trang", $name, $properties));
    }

    public static function Title($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;  
        return new FormRender(new Element\Textbox("Tiêu Đề", $name, $properties));
    }

    public static function setName($name) {
        return self::$FormName . "[{$name}]";
    }

}
