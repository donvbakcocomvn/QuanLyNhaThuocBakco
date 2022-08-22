<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Module\cart\Model;

/**
 * Description of DonHangChiTiet
 *
 * @author MSI
 */
class DonHangChiTiet extends \Model\DB implements \Model\IModelService, \Model\IModelToOptions {

    //put your code here
    public function __construct() {
        parent::__construct();
        parent::$TableName = prefixTable . "sanpham_donhang_chitiet";
    }

    public function Delete($Id) {
        
    }

    public function GetById($Id) {
        
    }

    public function GetItems($where, $indexPage, $pageNumber, &$total) {
        
    }

    public function Post($model) {
        if (!isset($model["Id"])) {
            $model["Id"] = \Model\Common::uuid();
        }
        $this->Insert($model);
    }

    public function Put($model) {
        
    }

    public static function ToSelect() {
        
    }

}
