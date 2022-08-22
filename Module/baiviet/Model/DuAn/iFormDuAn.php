<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Module\baiviet\Model\DuAn;

/**
 *
 * @author MSI
 */
interface iFormDuAn {

    static public function Id($val = null);

    static public function Name($val = null);
    static public function Alias($val = null);

    static public function Title($val = null);
    static public function Images($val = null);

    static public function Des($val = null);

    static public function Keyword($val = null);

    static public function Sumary($val = null);

    static public function Content($val = null);

    static public function Tinh($val = null);

    static public function Huyen($val = null);

    static public function Xa($val = null);

    static public function DiaChi($val = null);
}
