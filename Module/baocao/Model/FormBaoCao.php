<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Module\baocao\Model;

use Model\FormRender;
use PFBC\Element;

class FormBaoCao extends \Model\FormCommon implements IFormBaoCao {

    static $properties = ["class" => "form-control"];
    static $FormName = "formBaoCao";

    public function __construct() {
        self::$ElementsName = self::$FormName;
    }

    //put your code here
    public static function Content($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties["class"] = "editorContent";
        $properties["id"] = "editor" . __FUNCTION__;
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textarea("Nội Dung", $name, $properties));
    }

    public static function CreateDate($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("SĐT", $name, $properties));
    }

    public static function Id($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("SĐT", $name, $properties));
    }

    public static function IdUser($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("SĐT", $name, $properties));
    }

    public static function Name($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("SĐT", $name, $properties));
    }

    public static function Type($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("SĐT", $name, $properties));
    }

    public static function UpdateDate($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $name = self::SetName(__FUNCTION__);
        return new FormRender(new Element\Textbox("SĐT", $name, $properties));
    }

}
