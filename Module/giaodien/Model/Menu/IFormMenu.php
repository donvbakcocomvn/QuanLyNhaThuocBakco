<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Module\giaodien\Model\Menu;

interface IFormMenu {

    //put your code here

    public static function Id($val = null);

    public static function Name($val = null);

    public static function ParentsId($val = null);
    public static function Link($val = null);

    public static function Images($val = null);
    public static function GroupsId($val = null);
    public static function STT($val = null);

    public static function Icon($val = null);
}
