<?php

namespace Module\giaodien\Model\Menu;

use Model\FormRender;
use PFBC\Element;

class FormMenu implements IFormMenu {

    //put your code here
    static $FormName = "Menu";
    static $properties = ["class" => "form-control"];

    public function __construct() {
        
    }

    public static function setName($name) {
        return self::$FormName . "[{$name}]";
    }

    public static function Icon($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("Icon", $name, $properties));
    }

    public static function GroupsId($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = $val;
        return new FormRender(new Element\Textbox("Nhóm", $name, $properties));
    }

    public static function Id($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Readonly] = $val;
        return new FormRender(new Element\Textbox("Mã", $name, $properties));
    }

    public static function Images($val = null, $id = null) {
        $id = $id == null ? "Input_Images" : $id;
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties["id"] = $id;
        $properties[FormRender::Readonly] = $val;
        return new FormRender(new Element\Textbox("Hình", $name, $properties));
    }

    public static function Name($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = $val;
        return new FormRender(new Element\Textbox("Tên", $name, $properties));
    }

    public static function ParentsId($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val; 
        $options = MenuService::ToSelect();
        $options = ["" => "Là Cấp Cha"] + $options;
        return new FormRender(new Element\Select("Cấp Cha", $name,
                        $options, $properties));
    }

    public static function Link($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = $val;
        return new FormRender(new Element\Textbox("Đường Dẫn", $name, $properties));
    }
    public static function STT($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = $val;
        return new FormRender(new Element\Textbox("Đường Dẫn", $name, $properties));
    }

}
