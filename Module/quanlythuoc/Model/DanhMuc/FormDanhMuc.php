<?php

namespace Module\quanlythuoc\Model\DanhMuc;

use PFBC\Element;
use Model\FormRender;

class FormDanhMuc implements iFormDanhMuc
{

    static $properties = ["class" => "form-control"];
    static $ElementsName = "DanhMuc";

    //put your code here
    public function __construct()
    {
    }
    
    // public static function keyword($val = null) {
    //     $properties = self::$properties;
    //     $properties["value"] = $val;
    //     $properties[FormRender::Required] = "true";
    //     $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
    //     return new FormRender(new Element\Textarea("Từ Khóa", $name, $properties));
    // }

    // public static function title($val = null) {
    //     $properties = self::$properties;
    //     $properties["value"] = $val;
    //     $properties[FormRender::Required] = "true";
    //     $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
    //     return new FormRender(new Element\Textarea("Tiêu Đề", $name, $properties));
    // }

    /**
     *
     * @param mixed $val
     *
     * @return mixed
     */
    function Id($val = null)
    {
        // $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        // return new FormRender(new Element\Hidden($name, $val));

        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $properties[FormRender::Readonly] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Mã Danh Mục", $name, $properties));
    }

    function IdPut($val = null)
    {
        // $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        // return new FormRender(new Element\Hidden($name, $val));

        $properties = self::$properties;
        $properties["value"] = $val;
        $properties["readonly"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Mã Danh Mục", $name, $properties));
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
        return new FormRender(new Element\Textbox("Tên Danh Mục", $name, $properties));
    }

    /**
     *
     * @param mixed $val
     *
     * @return mixed
     */
    function Code($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textbox("Mã Danh Mục", $name, $properties));
    }

    /**
     *
     * @param mixed $val
     *
     * @return mixed
     */
    function Link($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = $val;
        // $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textarea("Link", $name, $properties));
    }

    /**
     *
     * @param mixed $val
     *
     * @return mixed
     */
    function ThanhPhan($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = $val;
        // $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textarea("Thành Phần", $name, $properties));
    }

    /**
     *
     * @param mixed $val
     *
     * @return mixed
     */
    function LuuY($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = $val;
        // $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textarea("Lưu Ý", $name, $properties));
    }

    /**
     *
     * @param mixed $val
     *
     * @return mixed
     */
    function GhiChu($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = $val;
        // $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        return new FormRender(new Element\Textarea("Ghi Chú", $name, $properties));
    }

    /**
     *
     * @param mixed $val
     *
     * @return mixed
     */
    function Lang($val = null)
    {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        $options = \Model\Lang::ToOptions();
        return new FormRender(new Element\Select("Ngôn Ngữ", $name, $options, $properties));
    }
	/**
	 *
	 * @param mixed $val
	 *
	 * @return mixed
	 */
	function CapCha($val = null) {
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties[FormRender::Required] = "true";
        $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
        $options = \Model\Lang::ToOptions();
        return new FormRender(new Element\Select("Cấp Cha", $name, $options, $properties));
	}
}
