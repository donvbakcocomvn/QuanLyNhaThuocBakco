<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Module\nhanvien\Model;

/**
 * Description of LichLmaViec
 *
 * @author MSI
 */
class LichLamViec extends \Model\DB implements \Model\IModelService, \Model\IModelToOptions {

    public $Id;
    public $Ngay;
    public $IdNhanVien;
    public $CaLamViec;

    public function __construct($lich = null) {
        parent::$TableName = prefixTable . "nhanvien_lichlamviec";
        parent::__construct();
        if ($lich) {
            $this->Id = isset($lich["Id"]) ? $lich["Id"] : null;
            $this->Ngay = isset($lich["Ngay"]) ? $lich["Ngay"] : null;
            $this->IdNhanVien = isset($lich["IdNhanVien"]) ? $lich["IdNhanVien"] : null;
            $this->CaLamViec = isset($lich["CaLamViec"]) ? $lich["CaLamViec"] : null;
        }
    }

    //put your code here
    public function Delete($Id) {

    }

    public function GetById($Id) {
        return $this->SelectById($Id);
    }

    public static function GetByDayIdNhanVien($ngay, $idNhanVien) {
        $where = "`Ngay` = '{$ngay}' and `IdNhanVien` = '{$idNhanVien}'";
        $LichLamViec = new LichLamViec();
        return $LichLamViec->SelectRow($where);
    }

    public function GetItems($where, $indexPage, $pageNumber, &$total) {

    }

    public function Post($model) {
        if (!isset($model["Id"]) || $model["Id"] == "") {
            $model["Id"] = \Model\Common::uuid();
        }
        return $this->Insert($model);
    }

    public function Put($model) {
        $this->UpdateRow($model);
    }

    public static function ToSelect() {

    }

}
