<?php

namespace Module\giaodien\Model\Slide;

use Model\FormRender;
use PFBC\Element;

class FormSlider implements IFormSlider {

    //put your code here
    static $FormName = "Duan";
    static $properties = ["class" => "form-control"];

    public function __construct() {
        
    }

    public static function Content($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties["class"] = "editorContent";
        $properties["id"] = __FUNCTION__;
        return new FormRender(new Element\Textarea("Nội Dung", $name, $properties));
    }

    public static function GroupsId($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("Nhóm", $name, $properties));
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
        $properties["id"] = "Input_Images";
        $properties[FormRender::Readonly] = $val;
        return new FormRender(new Element\Textbox("Hình", $name, $properties));
    }

    public static function Name($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;  
        return new FormRender(new Element\Textbox("Tên Slide", $name, $properties));
    }
    public static function IsPublic($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;  
        $options = [1=>"Hiện",0=>"ẨN"];
        return new FormRender(new Element\Select("Tên Slide", $name,$options, $properties));
    }

    public static function setName($name) {
        return self::$FormName . "[{$name}]";
    }

}
