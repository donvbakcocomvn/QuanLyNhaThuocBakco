<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model\HuongDan;

/**
 * Description of FormLocations
 *
 * @author MSI
 */
use Model\FormRender;
use PFBC\Element;

class FormHuongDan implements iFormHuongDan {

    static public $FormName = "HuongDan";
    static public $properties = ["class" => "form-control"];

    public function __construct() {
        
    }

    //put your code here

    public static function Content($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties["class"] = "editorContent";
        $properties["id"] = __FUNCTION__;
        return new FormRender(new Element\Textarea("Nội Dung", $name, $properties));
    }

    private static function SetName($ename) {
        return self::$FormName . "[{$ename}]";
    }

}
