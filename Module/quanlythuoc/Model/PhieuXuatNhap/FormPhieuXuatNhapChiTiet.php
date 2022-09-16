<?php

namespace Module\quanlythuoc\Model\PhieuXuatNhap;

use PFBC\Element;
use Model\FormRender;
use Model\Notions;
use Module\quanlysanpham\Model\SanPham;
use Module\quanlythuoc\Model\SanPham as ModelSanPham;

class FormPhieuXuatNhapChiTiet implements iFormPhieuXuatNhapChiTiet
{
	public $formData;

	static $properties = ["class" => "form-control"];
	static $ElementsName = "FormPhieuXuatNhapChiTiet";

	//put your code here
	public function __construct($formData = null)
	{
		$this->formData = $formData;
	}

	public function getVal($functionName, $default = null)
	{
		return $this->formData[$functionName] ?? $default;
	}

	function Id($val = null)
	{
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Element\Hidden($name, $val));
	}

	public function DVT($val = null, $id = null, $index = null, $pro = [])
	{
		$properties = self::$properties;
		$properties["value"] = $val ?? $this->getVal(__FUNCTION__);
		foreach ($pro as $key => $value) {
			$properties[$key] = $value;
		}
		$properties["id"] = $id;
		$properties["index"] = $index;
		// $properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Element\Textbox("Đơn vị tính", $name, $properties));
	}
	function IdPhieu($val = null)
	{
		$properties["value"] = $val ?? $this->getVal(__FUNCTION__);
		$properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Element\Textbox("Mã Phiếu", $name, $properties));
	}


	function IdThuoc($val = null, $id = null, $index = null)
	{
		$properties = self::$properties;
		$properties["value"] = $val ?? $this->getVal(__FUNCTION__);
		$option = ModelSanPham::CapChaTpOptions();
		$option = ["" => ""] + $option;
		$properties["id"] = $id;
		$properties["index"] = $index;
		$properties["style"] = "width:100%;";
		$properties["class"] = "select2 form-control changename ";
		// $properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Element\Select("Thuốc", $name, $option, $properties));
	}


	function SoLuong($val = null, $id = null, $index = null)
	{
		$properties = self::$properties;
		$properties["value"] = $val ?? $this->getVal(__FUNCTION__);
		$properties["type"] = "number";
		$properties["id"] = $id;
		$properties["min"] = 1;
		$properties["index"] = $index;
		$properties["style"] = "width:100%;";
		$properties["class"] = "form-control changenum ";
		$properties["oninvalid"] = "this.setCustomValidity('Số lượng không hợp lệ')";
		$properties["oninput"] = "this.setCustomValidity('')";
		// $properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Element\Textbox("Số lượng", $name, $properties));
	}
	function HanSuDung($val = null, $id = null, $index = null)
	{
		$properties = self::$properties;
		$properties["value"] = $val ?? $this->getVal(__FUNCTION__);
		$properties["type"] = "date";
		$properties["id"] = $id;
		$properties["index"] = $index;
		$properties["min"] = date("Y-m-d", time());
		$properties["class"] = "form-control changenum ";
		$properties["oninvalid"] = "this.setCustomValidity('Hạn sử dụng không hợp lệ')";
		$properties["oninput"] = "this.setCustomValidity('')";
		// $properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Element\Textbox("Hạn Sử Dụng", $name, $properties));
	}

	function SoLo($val = null, $id = null, $index = null)
	{
		$properties = self::$properties;
		$properties["value"] = $val ?? $this->getVal(__FUNCTION__);
		$option = ModelSanPham::CapChaTpOptions();
		$option = ["" => ""] + $option;
		$properties["id"] = $id;
		$properties["index"] = $index;
		$properties["style"] = "width:100%;";
		$properties["class"] = "form-control changenum ";
		// $properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Element\Textbox("Số lô", $name, $properties));
	}

	function NhaSanXuat($val = null)
	{
		$properties = self::$properties;
		$properties["value"] = $val ?? $this->getVal(__FUNCTION__);
		$properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Element\Textbox("Nhà sản xuất", $name, $properties));
	}


	function NuocSanXuat($val = null)
	{
		$properties = self::$properties;
		$properties["value"] = $val ?? $this->getVal(__FUNCTION__);
		$properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Element\Textbox("Số Lô", $name, $properties));
	}


	function Price($val = null, $id = null, $index = null)
	{
		$properties = self::$properties;
		$properties["value"] = $val ?? $this->getVal(__FUNCTION__);
		$properties["id"] = $id;
		$properties["type"] = "number";
		$properties["min"] = 1;
		$properties["index"] = $index;
		$properties["class"] = "form-control changenum ";
		$properties["oninvalid"] = "this.setCustomValidity('Giá không hợp lệ')";
		$properties["oninput"] = "this.setCustomValidity('')";
		// $properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Element\Textbox("Giá", $name, $properties));
	}


	function XuatNhap($val = null, $id = null, $index = null)
	{
		$properties = self::$properties;
		$properties["value"] = $val ?? $this->getVal(__FUNCTION__);
		$properties["id"] = $id;
		$properties["index"] = $index;
		$properties["class"] = "form-control changenum ";
		$properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		$options = [1 => "Phiếu Nhập", -1 => "Phiếu Xuất"];
		return new FormRender(new Element\Select("Loại Phiếu", $name, $options, $properties));
	}


	function CreateRecord($val = null)
	{
	}


	function UpdateRecord($val = null)
	{
	}


	function GhiChu($val = null)
	{
		$properties["value"] = $val ?? $this->getVal(__FUNCTION__);
		$properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Element\Textbox("Ghi chú", $name, $properties));
	}


	function IsDelete($val = null)
	{
	}
}
