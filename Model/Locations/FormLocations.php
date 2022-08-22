<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model\Locations;

/**
 * Description of FormLocations
 *
 * @author MSI
 */
use Model\FormRender;
use PFBC\Element;

class FormLocations implements iFormLocations {

    static public $FormName = "Locations";
    static public $properties = ["class" => "form-control"];

    public function __construct() {
        
    }

    //put your code here
    public static function Id($val = null) {
        $properties = self::$properties;
        $properties['value'] = $val;
        $properties[FormRender::Readonly] = '';
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("Mã", $name, $properties));
    }

    public static function IsPublic($val = null) {
        $properties = self::$properties;
        $properties['value'] = $val;
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Select("Ẩn Hiện", $name, [1 => "Có", 0 => "Không"], $properties));
    }

    public static function Name($val = null) {
        $properties = self::$properties;
        $properties['value'] = $val;
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("Tên", $name, $properties));
    }

    public static function Note($val = null) {
        $properties = self::$properties;
        $properties['value'] = $val;
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("Ghi Chú", $name, $properties));
    }

    public static function ParentsId($val = null) {
        $properties = self::$properties;
        $properties['value'] = $val;
        $properties['class'] = "form-control select2";
        $name = self::SetName(__FUNCTION__);
        $options = \Model\Locations::ToSelect(0);
        $options = ["" => "Là Cấp Cha"] + $options;
//        var_dump($options );
        return new FormRender(new Element\Select("Cấp Cha", $name, $options, $properties));
    }

    private static function SetName($ename) {
        return self::$FormName . "[{$ename}]";
    }

}
