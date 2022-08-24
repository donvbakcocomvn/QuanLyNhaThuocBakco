<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormSanPham
 *
 * @author MSI
 */

namespace Module\quanlythuoc\Model\SanPham;

use PFBC\Element;
use Model\FormRender;

class FormSanPham implements iFormSanPham {

    static $properties = ["class" => "form-control"];
    static $ElementsName = "Thuoc";

    public function __construct() {
        
    }

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Id($val = null) {
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Hidden($name, $val));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Idloaithuoc($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Code Loại Thuốc", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Name($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Tên Thuốc", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Namebietduoc($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Tên Biệt Dược", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Solo($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Số Lô", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Gianhap($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Giá Nhập", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Giaban($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Giá Bán", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function DVT($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Đơn vị tính", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Ngaysx($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Ngày Sản Xuất", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function HSD($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Hạn Dùng", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Tacdung($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Tác Dụng", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Cochetacdung($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textarea("Cơ Chế Tác Dụng", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Ghichu($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textarea("Ghi chú", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function NhaSX($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Nhà Sản Xuất", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function NuocSX($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Nước Sản Xuất", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Lang($val = null) {
	}
}
