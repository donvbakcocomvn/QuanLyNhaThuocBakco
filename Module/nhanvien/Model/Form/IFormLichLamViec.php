<?php

namespace Module\nhanvien\Model\Form;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormLichLamViec
 *
 * @author MSI
 */
interface IFormLichLamViec {

    //put your code here
    public static function Id($val = null);

    public static function Ngay($val = null);

    public static function IdNhanVien($val = null);

    public static function CaLamViec($val = null);
}
