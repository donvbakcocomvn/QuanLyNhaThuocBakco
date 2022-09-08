<?php

namespace Module\quanlythuoc\Model\PhieuXuatNhap;

use PFBC\Element;
use Model\FormRender;
use Module\quanlysanpham\Model\SanPham;
use Module\quanlythuoc\Model\SanPham as ModelSanPham;

class FormPhieuXuatNhap implements iFormPhieuXuatNhap
{

    static $properties = ["class" => "form-control"];
    static $ElementsName = "DanhMuc";

    //put your code here
    public function __construct()
    {
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
	
	function IdPhieu($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        // $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        // $options = ['PX' => 'Phiếu Xuất', 'PN' => 'Phiếu Nhập'];
        return new FormRender(new Element\Textbox("Mã Phiếu", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function IdThuoc($val = null, $id = null, $index = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
		$properties["id"] = $id;
		$properties["index"] = $index;
		$properties["class"] = "select2 form-control changename ";
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        $options = ModelSanPham::CapChaTpOptions();
        return new FormRender(new Element\Select("Mã Thuốc", $name, $options, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function SoLuong($val = null, $id = null, $index = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
		$properties["id"] = $id;
		$properties["index"] = $index;
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
	function SoLo($val = null, $id = null, $index = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
		$properties["id"] = $id;
		$properties["index"] = $index;
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
	function NhaSanXuat($val = null, $id = null, $index = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
		$properties["id"] = $id;
		$properties["index"] = $index;
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
	function NuocSanXuat($val = null, $id = null, $index = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
		$properties["id"] = $id;
		$properties["index"] = $index;
        // $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Nước Sản Xuất", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Price($val = null, $id = null, $index = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
		$properties["id"] = $id;
		$properties["index"] = $index;
        // $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Giá Tiền", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function XuatNhap($val = null, $id = null, $index = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
		$properties["id"] = $id;
		$properties["index"] = $index;
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
	function CreateRecord($val = null) {
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function UpdateRecord($val = null) {
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function NoiDungPhieu($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        // $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textarea("Nội Dung", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function NgayNhap($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val != null ? Date("Y-m-d", strtotime($val)):"";
        // $properties[FormRender::Required] = "true";
		$properties["type"] = "date";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\DateTime("Ngày Nhập/Xuất", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function IsDelete($val = null) {
	}
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function GhiChu($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        // $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textarea("Ghi Chú", $name, $properties));
	}
}
