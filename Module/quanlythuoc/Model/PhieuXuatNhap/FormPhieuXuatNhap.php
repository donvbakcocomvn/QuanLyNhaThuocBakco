<?php

namespace Module\quanlythuoc\Model\PhieuXuatNhap;

use PFBC\Element;
use Model\FormRender;
use Model\Notions;
use Module\quanlysanpham\Model\SanPham;
use Module\quanlythuoc\Model\SanPham as ModelSanPham;

class FormPhieuXuatNhap implements iFormPhieuXuatNhap
{
	public $formData;

	static $properties = ["class" => "form-control"];
	static $ElementsName = "FormPhieuXuatNhap";

	//put your code here
	public function __construct($formData = null)
	{
		$this->formData = $formData;
	}

	function Id($val = null)
	{
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Element\Hidden($name, $val));
		// $properties = self::$properties;
		// $properties["value"] = $val;
		// $properties[FormRender::Required] = "true";
		// $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		// return new FormRender(new Element\Hidden("Mã Phiếu", $name, $properties));
	}
	public function getVal($functionName, $default = null)
	{
		return $this->formData[$functionName] ?? $default;
	}
	function IdPhieu($val = null, $id = null, $index = null, $prop = [])
	{
		$properties = self::$properties;
		foreach ($prop  as $key => $value) {
			$properties[$key] = $value;
		}
		$properties["value"] = $val ?? $this->getVal(__FUNCTION__);
		$properties["id"] = $id ?? __FUNCTION__ . "_Id";
		$properties["index"] = $index;
		$properties["class"] = "form-control formpostdata";
		$properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Element\Textbox("Mã Phiếu", $name, $properties));
	}


	function XuatNhap($val = null, $id = null, $index = null)
	{
		$properties = self::$properties;
		$properties["value"] = $val ?? $this->getVal(__FUNCTION__);
		$properties["id"] = $id ?? __FUNCTION__ . "_Id";
		$properties["index"] = $index;
		$properties["class"] = "form-control formpostdata";
		$properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		$options = [1 => "Phiếu Nhập", -1 => "Phiếu Xuất"];
		return new FormRender(new Element\Select("Loại Phiếu", $name, $options, $properties));
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function CreateRecord($val = null)
	{
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function UpdateRecord($val = null)
	{
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function NoiDungPhieu($val = null, $id = null, $index = null)
	{
		$properties = self::$properties;
		$properties["value"] = $val ?? $this->getVal(__FUNCTION__);
		$properties["id"] = $id ?? __FUNCTION__ . "_Id";
		$properties["index"] = $index;
		$properties["class"] = "form-control formpostdata";
		$properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Element\Textbox("Nội Dung", $name, $properties));
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function NgayNhap($val = null, $id = null, $index = null)
	{
		$properties = self::$properties;
		$properties["value"] = $val ?? $this->getVal(__FUNCTION__);
		$properties["id"] = $id ?? __FUNCTION__ . "_Id";
		$properties["type"] = "date";
		$properties["max"] = date("Y-m-d", time());
		$properties["index"] = $index;
		$properties["class"] = "form-control formpostdata";
		$properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Element\DateTime("Ngày Nhập/Xuất", $name, $properties));
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function IsDelete($val = null)
	{
	}
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function GhiChu($val = null, $id = null, $index = null)
	{
		$properties = self::$properties;
		$properties["value"] = $val ?? $this->getVal(__FUNCTION__);
		$properties["id"] = $id ?? __FUNCTION__ . "_Id";
		$properties["index"] = $index;
		$properties["class"] = "form-control formpostdata";
		// $properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Element\Textbox("Ghi Chú", $name, $properties));
	}
	function TongTien($val = null)
	{
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function DonViCungCap($val = null)
	{
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
}
