<?php

namespace Module\benhnhan\Model\BenhNhan;

use PFBC\Element;
use Model\FormRender;
use Model\Locations;
use Model\OptionsService;

class FormBenhNhan implements iFormBenhNhan
{

    static $properties = ["class" => "form-control"];
    static $ElementsName = "BenhNhan";

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
        // return new FormRender(new Element\Textbox("Mã Khách Hàng", $name, $properties));
    }

    /**
     *
     * @param mixed $val
     *
     * @return mixed
     */
    function Name($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Tên Khách Hàng", $name, $properties));
    }

	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Gioitinh($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        $options = OptionsService::GetGroupsToSelect("gioitinh");
        return new FormRender(new Element\Select("Giới Tính", $name, $options, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Ngaysinh($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val != null ? Date("Y-m-d", strtotime($val)):"";
        // $properties[FormRender::Required] = "true";
		$properties["type"] = "date";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\DateTime("Ngày Sinh", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function CMND($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("CMND/CCCD", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Address($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Chỗ Ở Hiện Nay", $name, $properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Quequan($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $options = Locations::ToSelect();
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Select("Quê Quán", $name, $options,$properties));
	}
	
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function Phone($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties["type"] = "tel";
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Số Điện Thoại", $name, $properties));
	}
}
