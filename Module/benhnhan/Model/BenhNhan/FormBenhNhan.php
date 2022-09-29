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
        static $FormData = [];

        //put your code here
        public function __construct($formData = null)
        {
                self::$FormData  = $formData;
        }
        static public function SetFormData($data, $name = "FormDataBenhNhan")
        {
                $_SESSION[$name] = $data;
        }
        static public function GetFormData($name = "FormDataBenhNhan")
        {

                return $_SESSION[$name] ?? [];
        }
        function Id($val = null)
        {
                // $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
                // return new FormRender(new Element\Hidden($name, $val));

                $properties = self::$properties;
                $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
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
        function Name($val = null, $id = null)
        {
                $properties = self::$properties;
                $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
                $properties["class"] = " form-control saveinfor changeinfo";
                $properties["id"] = $id;
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
                $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
                $properties["id"] = __FUNCTION__; 
                $properties["class"] = " form-control saveinfor";
                $options = OptionsService::GetGroupsToSelect("gioitinh");
                $option1 =  ["" => "--- Chọn giới tính ---"];
                $options = $option1 + $options;
                $properties[FormRender::Required] = "true";
                $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
                return new FormRender(new Element\Select("Giới Tính", $name, $options, $properties));
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
                $properties["id"] = __FUNCTION__;
                $properties["class"] = " form-control saveinfor";
                $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
                return new FormRender(new Element\Textbox("Ngày sinh", $name, $properties));
        }

        function ThangSinh($val = null)
        {
                $properties = self::$properties;
                $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
                $properties["id"] = __FUNCTION__;
                $properties["class"] = " form-control saveinfor";
                $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
                return new FormRender(new Element\Textbox("Tháng", $name, $properties));
        }

        function NamSinh($val = null)
        {
                $properties = self::$properties;
                $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
                $properties["id"] = __FUNCTION__;
                $properties["class"] = " form-control saveinfor";
                $properties[FormRender::Required] = "true";
                $properties["type"] = "number";
                $properties["max"] = date("Y", time());
                $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
                return new FormRender(new Element\Textbox("Năm", $name, $properties));
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
                $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
                $properties["id"] = __FUNCTION__;
                $properties["class"] = " form-control saveinfor";
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
                $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
                $properties[FormRender::Required] = "true";
                $properties["class"] = " form-control saveinfor";
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
                $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
                $properties["id"] = __FUNCTION__;
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
        function Phone($val = null, $id = null)
        {
                $properties = self::$properties;
                $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
                $properties["class"] = " form-control saveinfor";
                $properties["id"] = $id;
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
        function TinhThanh($val = null, $id = "TinhThanh", $taget = "#QuanHuyen")
        {


                $properties = self::$properties;
                $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
                $properties["id"] = $id;
                $properties["class"] = FormRender::TinhThanhClass . " form-control saveinfor";
                
                $properties["data-value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
                $properties["data-target"] = $taget;
                $properties[FormRender::Required] = "true";
                $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
                return new FormRender(new Element\Select("Tỉnh Thành", $name, [],  $properties));
        }

        /**
         *
         * @param mixed $val
         *
         * @return mixed
         */
        function QuanHuyen($val = null, $id = "QuanHuyen", $taget = "#PhuongXa")
        {
                $properties = self::$properties;
                $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
                $properties["id"] = $id;
                $properties["class"] = FormRender::QuanHuyenClass . " form-control saveinfor";
                $properties["data-value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
                $properties["data-target"] = $taget;
                $properties["data-tinhthanh"] = FormRender::GetValue(null, "TinhThanh", self::GetFormData());
                // $properties[FormRender::Required] = "true";
                $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
                return new FormRender(new Element\Select("Quận Huyện", $name, [],  $properties));
        }

        /**
         *
         * @param mixed $val
         *
         * @return mixed
         */
        function PhuongXa($val = null, $id = "PhuongXa")
        {
                $properties = self::$properties;
                $properties["value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
                $properties["id"] = $id;
                $properties["class"] = FormRender::PhuongXaClass . " form-control";
                $properties["data-value"] = FormRender::GetValue($val, __FUNCTION__, self::GetFormData());
                $properties["data-tinhthanh"] = FormRender::GetValue(null, "TinhThanh", self::GetFormData());
                $properties["data-quanhuyen"] = FormRender::GetValue(null, "QuanHuyen", self::GetFormData());
                // $properties[FormRender::Required] = "true";
                $name = self::$ElementsName . "[" . __FUNCTION__ . "]";
                return new FormRender(new Element\Select("Phường xã", $name, [],  $properties));
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
        function isDelete($val = null)
        {
        }
}
