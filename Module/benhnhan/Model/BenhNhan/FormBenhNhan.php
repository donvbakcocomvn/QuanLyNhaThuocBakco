<?php

namespace Module\benhnhan\Model\BenhNhan;

use PFBC\Element;
use Model\FormRender;
use Model\Locations;
use Model\OptionsService;
use TinhThanh;

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
                // $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
                // return new FormRender(new Element\Hidden($name, $val));

                $properties = self::$properties;
                $properties["value"] = $val;
                $properties["readonly"] = $val;
                $properties[FormRender::Required] = "true";
                $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
                return new FormRender(new Element\Textbox("Mã Khách Hàng", $name, $properties));
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
        function Gioitinh($val = null)
        {
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
        function Ngaysinh($val = null)
        {
                $properties = self::$properties;
                $properties["value"] = $val != null ? Date("Y-m-d", strtotime($val)) : "";
                // $properties[FormRender::Required] = "true";
                $properties["type"] = "date";
		$properties["max"] = date("Y-m-d", time());
                $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
                return new FormRender(new Element\DateTime("Ngày Sinh", $name, $properties));
        }

        /**
         *
         * @param mixed $val
         *
         * @return mixed
         */
        function CMND($val = null)
        {
                $properties = self::$properties;
                $properties["value"] = $val;
                // $properties[FormRender::Required] = "true";
                $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
                return new FormRender(new Element\Textbox("CMND/CCCD", $name, $properties));
        }

        /**
         *
         * @param mixed $val
         *
         * @return mixed
         */
        function Address($val = null)
        {
                $properties = self::$properties;
                $properties["id"] = "TinhThanh";
                $properties["value"] = $val;
                $properties[FormRender::Required] = "true";
                $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
                return new FormRender(new Element\Textbox("Địa Chỉ", $name, $properties));
        }

        /**
         *
         * @param mixed $val
         *
         * @return mixed
         */
        function Quequan($val = null)
        {
                $properties = self::$properties;
                $properties["value"] = $val;
                $properties[FormRender::Required] = "true";
                $options = Locations::ToSelect();
                $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
                return new FormRender(new Element\Select("Quê Quán", $name, $options, $properties));
        }

        /**
         *
         * @param mixed $val
         *
         * @return mixed
         */
        function Phone($val = null)
        {
                $properties = self::$properties;
                $properties["value"] = $val;
                $properties["type"] = "tel";
                // $properties[FormRender::Required] = "true";
                $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
                return new FormRender(new Element\Textbox("Số Điện Thoại", $name, $properties));
        }
        /**
         *
         * @param mixed $val
         *
         * @return mixed
         */
        function TinhThanh($val = null)
        {
                $properties = self::$properties;
                $properties["value"] = $val;
                $properties["id"] = "TinhThanh";
                $properties[FormRender::Required] = "true";
                $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
                return new FormRender(new Element\Select("Tỉnh Thành", $name,  $properties));
        }

        /**
         *
         * @param mixed $val
         *
         * @return mixed
         */
        function QuanHuyen($val = null)
        {
                $properties = self::$properties;
                $properties["value"] = $val;
                $properties["id"] = "QuanHuyen";
                $properties[FormRender::Required] = "true";
                $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
                return new FormRender(new Element\Select("Quận Huyện", $name, $properties));
        }

        /**
         *
         * @param mixed $val
         *
         * @return mixed
         */
        function PhuongXa($val = null)
        {
                $properties = self::$properties;
                $properties["value"] = $val;
                $properties["id"] = "PhuongXa";
                $properties[FormRender::Required] = "true";
                // $options = TinhThanh::TinhThanhToOption();
                $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
                return new FormRender(new Element\Select("Phường Xã" ,$name ,  $properties));
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
	function isDelete($val = null) {
	}
}
