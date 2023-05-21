<?php

namespace Module\datlich\Model;

use Model\FormRender;
use PFBC\Element;

class DatLichForm implements DatLichIForm
{

    static $FormName = "LichLamViec";
    static $properties = ["class" => "form-control"];

    public function __construct()
    {

    }

    public static function Name($val = null)
    {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("Mã", $name, $properties));
    }

    public static function setName($name)
    {
        return self::$FormName . "[{$name}]";
    }

    /**
     * @param mixed $val
     * @param mixed $prop
     * @return mixed
     */
    public function Id($val = null, $prop = array())
    {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Hidden("Mã", $name, $properties));
    }

    /**
     *
     * @param mixed $val
     * @param mixed $prop
     * @return mixed
     */
    public function ADDRESS($val = null, $prop = array())
    {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("Địa Chỉ", $name, $properties));
    }

    /**
     *
     * @param mixed $val
     * @param mixed $prop
     * @return mixed
     */
    public function AMOUNT($val = null, $prop = array())
    {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("Giá", $name, $properties));
    }

    /**
     *
     * @param mixed $val
     * @param mixed $prop
     * @return mixed
     */
    public function BOD($val = null, $prop = array())
    {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("Ngày Sinh", $name, $properties));
    }

    /**
     *
     * @param mixed $val
     * @param mixed $prop
     * @return mixed
     */
    public function DATEEXAMINATION($val = null, $prop = array())
    {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        $properties["type"] = "datetime-local";
        $properties[FormRender::Required] = true;
        return new FormRender(new Element\Textbox("Thời Gian ", $name, $properties));
    }

    /**
     *
     * @param mixed $val
     * @param mixed $prop
     * @return mixed
     */
    public function DISTRICS($val = null, $prop = array())
    {
    }

    /**
     *
     * @param mixed $val
     * @param mixed $prop
     * @return mixed
     */
    public function EMAIL($val = null, $prop = array())
    {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("Email", $name, $properties));
    }

    /**
     *
     * @param mixed $val
     * @param mixed $prop
     * @return mixed
     */
    public function FULLNAME($val = null, $prop = array())
    {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("Họ & Tên", $name, $properties));
    }

    /**
     *
     * @param mixed $val
     * @param mixed $prop
     * @return mixed
     */
    public function HOSPITAL($val = null, $prop = array())
    {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("Bệnh Viện", $name, $properties));
    }

    /**
     *
     * @param mixed $val
     * @param mixed $prop
     * @return mixed
     */
    public function HOSPITALADDRESS($val = null, $prop = array())
    {
    }

    /**
     *
     * @param mixed $val
     * @param mixed $prop
     * @return mixed
     */
    public function PHONE($val = null, $prop = array())
    {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Textbox("SĐT", $name, $properties));
    }

    /**
     *
     * @param mixed $val
     * @param mixed $prop
     * @return mixed
     */
    public function PROVINCE($val = null, $prop = array())
    {
    }

    /**
     *
     * @param mixed $val
     * @param mixed $prop
     * @return mixed
     */
    public function ROOM($val = null, $prop = array())
    {
    }

    /**
     *
     * @param mixed $val
     * @param mixed $prop
     * @return mixed
     */
    public function WARD($val = null, $prop = array())
    {
    }
    /**
     * @param mixed $val
     * @param mixed $prop
     * @return mixed
     */
    public function SERVICENAME($val = null, $prop = array())
    {
        $name = self::setName(__FUNCTION__);
        $properties = self::$properties;
        $properties["value"] = $val;
        return new FormRender(new Element\Select("Dịch Vụ", $name, ["Tiên Chủng", "Khám Bệnh"], $properties));
    }
}