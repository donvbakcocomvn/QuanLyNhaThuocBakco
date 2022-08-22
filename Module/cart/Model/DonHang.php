<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Module\cart\Model;

/**
 * Description of DonHang
 *
 * @author MSI
 */
class DonHang extends \Model\DB implements \Model\IModelService, \Model\IModelToOptions {

    //put your code here

    public function __construct() {
        parent::__construct();
        parent::$TableName = prefixTable . "sanpham_donhang";
    }

    public function Delete($Id) {
        
    }

    public function GetById($Id) {
        
    }

    public function GetItems($where, $indexPage, $pageNumber, &$total) {
        
    }

    public function Post($model) {
        $this->Insert($model);
    }

    public function Put($model) {
        
    }

    public static function ToSelect() {
        
    }

    public static function ToSoDonHang() {
        try {
            $dh = new DonHang();
            return $dh->SelectCount("1=1");
        } catch (Exception $ex) {
            return 0;
        }
    }

}
