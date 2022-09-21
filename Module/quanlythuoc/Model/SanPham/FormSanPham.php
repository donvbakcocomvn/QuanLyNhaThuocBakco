<?php

namespace Module\quanlythuoc\Model\SanPham;

use PFBC\Element;
use Model\FormRender;
use Model\OptionsService;
use Model\Notions;
use PFBC\Element\Color;

class FormSanPham implements iFormSanPham {

    static $properties = ["class" => "form-control"];
    static $ElementsName = "SanPham";


	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Id($val = null) {
		// $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        // return new FormRender(new Element\Hidden($name, $val));
		$properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Readonly] = "true";
        // $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Mã Thuốc", $name,$properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Idloaithuoc($val = null) {
		// $dm = new ModelDanhMuc();
		$properties = self::$properties;
        $properties["value"] = $val ;
		$properties["class"] = "select2 form-control";
        $properties[FormRender::Required] = "true";
		$option = \Module\quanlythuoc\Model\DanhMuc::CapChaTpOptions();
		$option1 =  ["" => "--- Chọn danh mục thuốc ---"];
		$option = $option1 + $option;
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Select("Thuộc Danh Mục", $name, $option,$properties));
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
        // $properties[FormRender::Required] = "true";
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
        // $properties[FormRender::Required] = "true";
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
        $properties[FormRender::Required] = "DVQ";
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
		$properties["class"] = "select2 form-control  ";
        // $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		$option = OptionsService::GetGroupsToSelect("donvitinh");
		$option1 =  ["" => "--- Đơn vị tính ---"];
		$option = $option1 + $option;
        return new FormRender(new Element\Select("Đơn vị tính", $name,$option ,$properties));
	}

	function DVQuyDoi($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val;
		$properties["class"] = "select2 form-control  ";
        // $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		$option = OptionsService::GetGroupsToSelect("donviquydoi");
		$option1 =  ["" => "--- Đơn vị quy đổi ---"];
		$option = $option1 + $option;
        return new FormRender(new Element\Select("Đơn vị quy đổi", $name,$option ,$properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Ngaysx($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val != null ? Date("Y-m-d", strtotime($val)):"";
        // $properties[FormRender::Required] = "true";
		$properties["type"] = "date";
		$properties["max"] = date("Y-m-d", time());
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\DateTime("Ngày Sản Xuất", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function HSD($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val != null ? Date("Y-m-d", strtotime($val)):"";
        // $properties[FormRender::Required] = "true";
		$properties["type"] = "date";
		$properties["min"] = date("Y-m-d", time());
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\DateTime("Hạn Dùng", $name, $properties));
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
        // $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textarea("Tác Dụng", $name, $properties));
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
        // $properties[FormRender::Required] = "true";
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
        // $properties[FormRender::Required] = "true";
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
        // $properties[FormRender::Required] = "true";
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
		$properties["class"] = "select2 form-control  ";
        // $properties[FormRender::Required] = "true";
		$option = Notions::GetToOptions();
		$option1 =  ["" => "--- Chọn nước sản xuất ---"];
		$options = $option1 + $option;
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Select("Nước Sản Xuất", $name,$options, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Lang($val = null) {
	}
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Soluong($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val;
        // $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Số Lượng", $name, $properties));
	}
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function CachDung($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val;
		$properties["class"] = "select2 form-control  ";
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		$option = OptionsService::GetGroupsToSelect("cachdungthuoc");
		$option1 =  ["" => "--- Chọn cách dùng thuốc ---"];
		$option = $option1 + $option;
        return new FormRender(new Element\Select("Cách Dùng Thuốc", $name,$option ,$properties));
	}
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Canhbao($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Số Lượng Cảnh Báo", $name, $properties));
	}
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function SLXuat($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Số Lượng Cảnh Báo", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function SLNhap($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Số Lượng Cảnh Báo", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function SLHienTai($val = null) {
		$properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Số Lượng Cảnh Báo", $name, $properties));
	}
}
