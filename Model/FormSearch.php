<?php

namespace Model;

use PFBC\Element\Select;
use PFBC\Element\Textbox;

class FormSearch
{
    static function KeyWordDashboard($label, $value = null, $placehol)
    {
        return new FormRender(new Textbox($label, 'keyword', ['value' => $value, 'placeholder' => $placehol, 'style' => 'border-radius: 5px', 'class' => 'form-control']));
    }

    static function LoaiPhieu($value = null)
    {
        $option1 = ["" => ""];
        $option2 = [
            1 => "Phiếu nhập",
            -1 => "Phiếu xuất"
        ];
        $options = $option1 + $option2;
        return new FormRender(new Select('Loại phiếu', 'loaiphieu', $options, ['value' => $value, 'style' => 'border-radius: 5px', 'class' => 'form-control ']));
    }

    static function MaPhieu($value = null)
    {
        return new FormRender(new Textbox('Mã phiếu', 'idPhieu', ['value' => $value,'style' => 'border-radius: 5px', 'class' => 'form-control']));
    }

    static function NoiDungPhieu($value = null)
    {
        return new FormRender(new Textbox('Nội dung phiếu', 'content', ['value' => $value, 'placeholder' => 'Nhập nội dung', 'style' => 'border-radius: 5px', 'class' => 'form-control']));
    }

    static function ChanDoanBenh($value = null)
    {
        return new FormRender(new Textbox('Chẩn đoán bệnh', 'chandoan', ['value' => $value, 'placeholder' => 'Tên bệnh', 'style' => 'border-radius: 5px', 'class' => 'form-control']));
    }

    static function KeyWordThuoc($value = null)
    {
        return new FormRender(new Textbox('Mã thuốc hoặc tên thuốc', 'keyword', ['value' => $value, 'placeholder' => 'Nhập vào mã thuốc hoặc tên thuốc để tìm kiếm', 'style' => 'border-radius: 5px', 'class' => 'form-control']));
    }

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

    static function MaDonThuoc($value = null)
    {
        return new FormRender(new Textbox('Mã đơn thuốc', 'id', ['value' => $value, 'placeholder' => 'Nhập mã đơn thuốc', 'style' => 'border-radius: 5px', 'class' => 'form-control']));
    }

    static function PhoneBenhNhan($value = null)
    {
        return new FormRender(new Textbox('Số điện thoại', 'phone', ['value' => $value, 'placeholder' => 'Nhập SĐT', 'style' => 'border-radius: 5px', 'class' => 'form-control']));
    }

    static function AddressBenhNhan($value = null)
    {
        return new FormRender(new Textbox('Địa chỉ', 'address', ['value' => $value, 'placeholder' => 'Nhập địa chỉ', 'style' => 'border-radius: 5px', 'class' => 'form-control']));
    }

    static function Keyword($value = null)
    {
        return new FormRender(new Textbox('Từ Khóa', 'keyword', ['value' => $value, 'placeholder' => 'Nhập vào mã hoặc bệnh nhân', 'style' => 'border-radius: 5px', 'class' => 'form-control']));
    }

    static function SelectStatus($value = null)
    {
        $option1 = ["" => ""];
        $option2 = OptionsService::GetGroupsToSelect('optiondonthuoc');
        $options = $option1 + $option2;
        return new FormRender(new Select('Thuộc Loại Đơn', 'status', $options, ['value' => $value, 'style' => 'border-radius: 5px', 'class' => 'form-control ']));
    }

    static function Fromdate($value = "")
    {
        return new FormRender(new Textbox('Từ ngày', 'fromdate',['value' => $value,'style' => 'border-radius: 5px','type' => 'date','class' => 'form-control'] ));
    }
    static function Todate($value = null)
    {
        return new FormRender(new Textbox('Đến ngày', 'todate',['value' => $value,'style' => 'border-radius: 5px','type' => 'date','class' => 'form-control'] ));
    }
}
