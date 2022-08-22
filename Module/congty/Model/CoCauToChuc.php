<?php

namespace Module\congty\Model;

class CoCauToChuc extends \Model\DB implements \Model\IModelService, \Model\IModelToOptions {

    public $Id;
    public $Name;
    public $IdPhongBam;
    public $IdChucVu;
    public $ChucVu;
    public $CapTren;

    public function __construct($tc = null) {
        parent::$TableName = prefixTable . "congty_cocautochuc";
        parent::__construct();
        if ($tc) {
            $this->Id = isset($tc["Id"]) ? $tc["Id"] : null;
            $this->Name = isset($tc["Name"]) ? $tc["Name"] : null;
            $this->IdPhongBam = isset($tc["IdPhongBam"]) ? $tc["IdPhongBam"] : null;
            $this->IdChucVu = isset($tc["IdChucVu"]) ? $tc["IdChucVu"] : null;
            $this->ChucVu = isset($tc["ChucVu"]) ? $tc["ChucVu"] : null;
            $this->CapTren = isset($tc["CapTren"]) ? $tc["CapTren"] : null;
        }
    }

    public function Delete($Id) {
        return $this->DeleteById($Id);
    }

    public function GetById($Id) {
        return $this->GetById($Id);
    }

    public function GetItems($param, $indexPage, $pageNumber, &$total) {
        $where = "1=1";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function Post($model) {
        return $this->Insert($model);
    }

    public function Put($model) {
        return $this->UpdateRow($model);
    }

    public static function ToSelect() {
        $where = "1=1";
        $this->GetToSelect($where, ["Id", "Name"]);
    }

}
