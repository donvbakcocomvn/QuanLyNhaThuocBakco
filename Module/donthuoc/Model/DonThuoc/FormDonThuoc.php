<?php

namespace Module\donthuoc\Model\DonThuoc;

use Model\FormRender;
use Model\OptionsService;
use Module\benhnhan\Model\BenhNhan;
use Module\quanlythuoc\Model\DanhMuc;
use PFBC\Element\Textbox;
use Module\quanlythuoc\Model\SanPham;
use PFBC\Element\Date;
use PFBC\Element\Select;

class FormDonThuoc implements iFormDonThuoc, iFormDonThuocDetail
{

	static $properties = ["class" => "form-control"];
	static $ElementsName = "DonThuoc";
	static $FormData = [];
	//put your code here
	public function __construct($dataValue = null)
	{
		self::$FormData  = $dataValue;
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Id($val = null)
	{
		$properties = self::$properties;
		$properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
		$properties["class"] = " form-control saveinfor";
		$properties["readonly"] = $val;
		$properties["style"] = "border: 1px solid red; background-color: #de020252";
		// $properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Textbox("Mã đơn thuốc", $name, $properties));
	}

	public static function SetFormData($data)
	{
		$_SESSION["FormDataDonThuoc"] = $data;
	}
	public static function GetFormData()
	{
		return $_SESSION["FormDataDonThuoc"] ?? [];
	}
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function IdBenhNhan($val = null)
	{
		$properties = self::$properties;
		$properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
		$properties["data-value"] = $val;
		$properties[FormRender::Required] = "true";
		$option = BenhNhan::CapChaTpOptions();
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Select("Tên Bệnh Nhân", $name, $option, $properties));
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Name($val = null, $id = null, $index = null)
	{
		$properties = self::$properties;
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]" . "[]";
		$option = SanPham::CapChaTpOptions();
		$option = ["" => ""] + $option;
		// $properties = ["class" => "assl"+"sdfsdfsd"];
		$properties["value"] =$val;
		$properties["id"] = $id;
		$properties["index"] = $index;
		$properties["class"] = "select2 form-control changename ";
		$properties["style"] = "width: 100%";
		// $properties["id"] = "idtoathuoc".($val == null ? "0" : $val);
		// $properties["onchange"] = "idtoathuoc(this.value)";

		return new FormRender(new Select("", $name, $option, $properties));
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function GioiTinh($val = null)
	{
		$properties = self::$properties;
		$properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
		// $properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		$options = OptionsService::GetGroupsToSelect("gioitinh");
		return new FormRender(new Select("Giới Tính", $name, $options, $properties));
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function NgaySinh($val = null)
	{
		$properties = self::$properties;
		$properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
		// $properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Date("", $name, $properties));
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function ThoiGianKham($val = null)
	{
		$properties = self::$properties;
		$properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
		$properties[FormRender::Readonly] = "true";
		$properties["style"] = "border: 1px solid red; background-color: #de020252";
		$properties["class"] = " form-control saveinfor";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Textbox("Ngày Tạo", $name, $properties));
	}

	function ThoiGianKhamCopy($val = null)
	{
		$properties = self::$properties;
		$properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
		// $properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Textbox("Ngày Tạo", $name, $properties));
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function ChanDoanBenh($val = null)
	{
		$properties = self::$properties;
		$properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
		$properties[FormRender::Required] = "true";
		$properties["class"] = " form-control saveinfor";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Textbox("Chẩn Đoán Bệnh", $name, $properties));
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function ThuocLoaiDon($val = null, $id = null)
	{
		$properties = self::$properties;
		$properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
		$properties["data-value"] = $val;
		$properties["id"] = $id;
		$properties["class"] = " form-control saveinfor select2";
		$properties[FormRender::Required] = "true";
		$option = OptionsService::GetGroupsToSelect("optiondonthuoc");
		$option1 =  ["" => "Chọn loại đơn"];
		$options = $option1 + $option;
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Select("Thuộc Đơn Thuốc", $name, $options, $properties));
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function TongNgayDung($val = null)
	{
		$properties = self::$properties;
		$properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
		$properties["id"] = "TongNgayDungThuoc";
		$properties["type"] = "number";
		$properties["class"] = " form-control saveinfor";
		$properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Textbox("Số Ngày Sử Dụng Thuốc", $name, $properties));
	}
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function IdDonThuoc($val = null)
	{
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function IdThuoc($val = null)
	{
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function SoNgaySDThuoc($val = null, $id = null, $index = null)
	{
		$properties = self::$properties;
		$properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
		$properties["id"] = $id;
		$properties["index"] = $index;
		$properties["class"] = "form-control changenumber ";
		// $properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]" . "[]";
		return new FormRender(new Textbox("", $name, $properties));
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function DVT($val = null, $id = null, $index = null)
	{
		$properties = self::$properties;
		$properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
		$properties["Id"] = $id;
		$properties["index"] = $index;
		$properties[FormRender::Disabled] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]" . "[]";
		$option = array("0" => null);
		$option += OptionsService::GetGroupsToSelect("donvitinh");
		return new FormRender(new Textbox("", $name, $properties));
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function SoLuong($val = null, $id = null, $index = null)
	{
		$properties = self::$properties;
		$properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
		$properties["id"] = $id;
		$properties["index"] = $index;
		$properties[FormRender::Disabled] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]" . "[]";
		return new FormRender(new Textbox("", $name, $properties));
	}
	function SLHienTai($val = null, $id = null, $index = null)
	{
		$properties = self::$properties;
		$properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
		$properties["id"] = $id;
		$properties["index"] = $index;
		$properties[FormRender::Disabled] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]" . "[]";
		return new FormRender(new Textbox("", $name, $properties));
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function CachDung($val = null, $id = null, $index = null)
	{
		$properties = self::$properties;
		$properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
		$properties["Id"] = $id;
		$properties["index"] = $index;
		$properties[FormRender::Disabled] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]" . "[]";
		// $options = OptionsService::GetGroupsToSelect("cachdungthuoc");
		return new FormRender(new Textbox("", $name, $properties));
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Sang($val = null, $id = null, $index = null)
	{
		$properties = self::$properties;
		$properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
		$properties["id"] = $id;
		$properties["index"] = $index;
		$properties["class"] = "form-control changenumber ";
		// $properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]" . "[]";
		// $option = OptionsService::GetGroupsToSelect("donviquydoi");
		$option = OptionsService::GetGroupsToSelect("donviquydoi");
		$option = ["" => ""] + $option;

		return new FormRender(new Select("", $name, $option, $properties));
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Trua($val = null, $id = null, $index = null)
	{
		$properties = self::$properties;
		$properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
		$properties["id"] = $id;
		$properties["index"] = $index;
		$properties["class"] = "form-control changenumber";

		// $properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]" . "[]";
		// $option = OptionsService::GetGroupsToSelect("donviquydoi");
		$option = OptionsService::GetGroupsToSelect("donviquydoi");
		$option = ["" => ""] + $option;

		return new FormRender(new Select("", $name, $option, $properties));
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Chieu($val = null, $id = null, $index = null)
	{
		$properties = self::$properties;
		$properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
		$properties["id"] = $id;
		$properties["index"] = $index;
		$properties["class"] = "form-control changenumber";

		// $properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]" . "[]";
		// $option = OptionsService::GetGroupsToSelect("donviquydoi");
		$option = OptionsService::GetGroupsToSelect("donviquydoi");
		$option = ["" => ""] + $option;
		return new FormRender(new Select("", $name, $option, $properties));
	}

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function GiaBan($val = null, $id = null, $index = null)
	{
		$properties = self::$properties;
		$properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
		$properties["id"] = $id;
		$properties["index"] = $index;
		$properties[FormRender::Disabled] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]" . "[]";
		// $properties["id"] = "giaban" . ($val == null ? "" : $val);
		return new FormRender(new Textbox("", $name, $properties));
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
		$properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
		$properties["id"] = $id;
		$properties["index"] = $index;
		$properties[FormRender::Disabled] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]" . "[]";
		return new FormRender(new Textbox("", $name, $properties));
	}
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function IdDetail($val = null)
	{
		$properties = self::$properties;
		$properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
		$properties["readonly"] = $val;
		$properties[FormRender::Required] = "true";
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Textbox("", $name, $properties));
	}
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Status($val = null)
	{
		$properties = self::$properties;
		$properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
		$properties["data-value"] = $val;
		$properties[FormRender::Required] = "true";
		$option = OptionsService::GetGroupsToSelect("optiondonthuoc");
		$option1 =  ["" => "--- Tình trạng ---"];
		$options = $option1 + $option;
		$name = self::$ElementsName . "[" . __FUNCTION__ . "]";
		return new FormRender(new Select("Tình trạng", $name, $options, $properties));
	}
}
