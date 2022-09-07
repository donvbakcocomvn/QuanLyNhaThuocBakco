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
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        $options = ['PX' => 'Phiếu Xuất', 'PN' => 'Phiếu Nhập'];
        return new FormRender(new Element\Select("Loại Phiếu", $name, $options, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function IdThuoc($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
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
	function SoLuong($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Số Lượng", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function SoLo($val = null) {
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
	function NhaSanXuat($val = null) {
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
	function NuocSanXuat($val = null) {
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
	function Price($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Giá Tiền", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function XuatNhap($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        $options = [1 => "Nhập", -1 => "Xuất"];
        return new FormRender(new Element\Select("Xuất/Nhập", $name, $options, $properties));
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
        return new FormRender(new Element\Textarea("Nội dung phiếu", $name, $properties));
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
