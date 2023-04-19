<?php

namespace Model;

use PFBC\Element\Select;
use PFBC\Element\Textbox;

class FormSearch
{
    static function MaDanhMuc($value = null)
    {
        return new FormRender(new Textbox('Mã danh mục', 'idDM', ['value' => $value, 'placeholder' => 'Nhập mã danh mục', 'style' => 'border-radius: 5px', 'class' => 'form-control']));
    }

    static function LinkDanhMuc($value = null)
    {
        return new FormRender(new Textbox('Đường dẫn', 'link', ['value' => $value, 'placeholder' => 'Tìm theo đường dẫn', 'style' => 'border-radius: 5px', 'class' => 'form-control']));
    }

    static function NameDanhMuc($value = null)
    {
        return new FormRender(new Textbox('Tên danh mục', 'name', ['value' => $value, 'placeholder' => 'Nhập tên danh mục', 'style' => 'border-radius: 5px', 'class' => 'form-control']));
    }

    static function GioiTinhBenhNhan($value = null)
    {
        $option1 = ["" => ""];
        $option2 = OptionsService::GetGroupsToSelect('gioitinh');
        $options = $option1 + $option2;
        return new FormRender(new Select('Giới tính', 'gioitinh', $options, ['value' => $value, 'style' => 'border-radius: 5px', 'class' => 'form-control ']));
    }

    static function NameBenhNhan($value = null)
    {
        return new FormRender(new Textbox('Tên bệnh nhân', 'nameBN', ['value' => $value, 'placeholder' => 'Nhập tên bệnh nhân', 'style' => 'border-radius: 5px', 'class' => 'form-control']));
    }

    static function MaBenhNhan($value = null)
    {
        return new FormRender(new Textbox('Mã bệnh nhân', 'id', ['value' => $value, 'placeholder' => 'Nhập mã bệnh nhân', 'style' => 'border-radius: 5px', 'class' => 'form-control']));
    }

    static function PhoneBenhNhan($value = null)
    {
        return new FormRender(new Textbox('SĐT', 'phone', ['value' => $value, 'placeholder' => 'Nhập SĐT', 'style' => 'border-radius: 5px', 'class' => 'form-control']));
    }

    static function AddressBenhNhan($value = null)
    {
        return new FormRender(new Textbox('Địa chỉ', 'address', ['value' => $value, 'placeholder' => 'Nhập địa chỉ', 'style' => 'border-radius: 5px', 'class' => 'form-control']));
    }

    static function Keyword($value = null, $prop = [])
    {
        $prop['value'] = $value;
        $prop['placeholder'] = 'Nhập vào mã hoặc bệnh nhân';
        $prop['style'] = 'border-radius: 5px';
        $prop['class'] = 'form-control';
        return new FormRender(new Textbox('Từ Khóa', 'keyword', $prop));
    }

    static function SelectStatus($value = null, $prop = [])
    {
        $option1 = ["" => "Tất Cả"];
        $option2 = OptionsService::GetGroupsToSelect('optiondonthuoc');
        $options = $option1 + $option2;
        $prop['value'] = $value;
        $prop['style'] = 'border-radius: 5px';
        $prop['class'] = 'form-control';

        return new FormRender(new Select('Thuộc Loại Đơn', 'status', $options, $prop));
    }
    static function ThuocLoaiDon($value = null, $prop = [])
    {
        $option1 = ["" => "Tất Cả"];
        $option2 = OptionsService::GetGroupsToSelect('trangthai');
        $options = $option1 + $option2;
        $prop['value'] = $value;
        $prop['style'] = 'border-radius: 5px';
        $prop['class'] = 'form-control';
        return new FormRender(new Select('Tình Trạng', 'loaidonthuoc', $options, $prop));
    }

    static function Fromdate($value = "")
    {
        return new FormRender(new Textbox('Từ ngày', 'fromdate', ['value' => $value, 'style' => 'border-radius: 5px', 'type' => 'date', 'class' => 'form-control']));
    }
    static function Todate($value = null)
    {
        return new FormRender(new Textbox('Đến ngày', 'todate', ['value' => $value, 'style' => 'border-radius: 5px', 'type' => 'date', 'class' => 'form-control']));
    }
}