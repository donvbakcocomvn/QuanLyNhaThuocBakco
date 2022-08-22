<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Module\baiviet\Model\DuAn;

use Module\baiviet\Model\DuAn\iFormDuAn;
use Model\FormRender;
use PFBC\Element;

/**
 * Description of FormDuAn
 *
 * @author MSI
 */
class FormDuAn implements iFormDuAn {

    static $FormName = "Duan";
    static $properties = ["class" => "form-control"];

    public function __construct() {
        
    }

    //put your code here
    public static function Content($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties["class"] = "editorContent";
        $properties["id"] = __FUNCTION__;
        return new FormRender(new Element\Textarea("Tổng Quan", $name, $properties));
    }

    public static function Des($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textarea("Mô Tả", $name, $properties));
    }

    public static function DiaChi($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("Địa Chỉ", $name, $properties));
    }

    public static function Huyen($val = null, $tinhThanh = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties["id"] = __FUNCTION__;
        $Options = \Model\Locations::ToSelect(intval($tinhThanh));
        return new FormRender(new Element\Select("Huyện", $name, $Options, $properties));
    }

    public static function Id($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Readonly] = true;
        return new FormRender(new Element\Textbox("Mã", $name, $properties));
    }

    public static function Keyword($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("Keyword", $name, $properties));
    }

    public static function Name($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("Tên Dự Án", $name, $properties));
    }

    public static function Sumary($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties["id"] = __FUNCTION__;
        return new FormRender(new Element\Textarea("Mô Tả Ngắn", $name, $properties));
    }

    public static function Tinh($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties["class"] = "select2 form-control";
        $properties["onchange"] = "LoadDanhSachHuyen(this.value,'#Huyen')";
        $options = \Model\Locations::ToSelect(0);
        return new FormRender(new Element\Select("Tỉnh", $name, $options, $properties));
    }

    public static function Title($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("Tiêu Đề", $name, $properties));
    }

    public static function Xa($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("Xã", $name, $properties));
    }

    public static function setName($name) {
        return self::$FormName . "[{$name}]";
    }

    public static function Alias($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("Link", $name, $properties));
    }

    public static function Images($val = null) {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Readonly] = "";
        $properties["Id"] = 'UrlImages';
        return new FormRender(new Element\Textbox("Hinh Anh3", $name, $properties));
    }

}
