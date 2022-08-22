<?php

namespace Module\baocao\Model;

class BaoCaoService extends \Model\DB implements \Model\IModelService, \Model\IModelToOptions {

    const TypeDay = 1;
    const TypeWeek = 2;
    const TypeMonth = 3;

    public $Id, $DateReport, $IdUser, $Name, $Content, $CreateDate, $UpdateDate, $Type;

    //put your code here
    public function __construct($baoCao = null) {
        parent::$TableName = prefixTable . "users_baocao";
        parent::__construct();
        if ($baoCao) {
            if (!is_array($baoCao)) {
                $Id = $baoCao;
                $baoCao = $this->GetById($Id);
            }
            if ($baoCao) {
                $this->Id = isset($baoCao["Id"]) ? $baoCao["Id"] : "";
                $this->IdUser = isset($baoCao["IdUser"]) ? $baoCao["IdUser"] : "";
                $this->DateReport = isset($baoCao["DateReport"]) ? $baoCao["DateReport"] : null;
                $this->Name = isset($baoCao["Name"]) ? $baoCao["Name"] : "";
                $this->Content = isset($baoCao["Content"]) ? $baoCao["Content"] : "";
                $this->CreateDate = isset($baoCao["CreateDate"]) ? $baoCao["CreateDate"] : "";
                $this->UpdateDate = isset($baoCao["UpdateDate"]) ? $baoCao["UpdateDate"] : "";
                $this->Type = isset($baoCao["Type"]) ? $baoCao["Type"] : 0;
            }
        }
    }

    public function Delete($Id) {

    }

    public function GetById($Id) {
        return $this->SelectById($Id);
    }

    public function GetItems($where, $indexPage, $pageNumber, &$total) {

    }

    public function Post($model) {
        return $this->Insert($model);
    }

    public function Put($model) {

        return $this->UpdateRow($model);
    }

    public static function ToSelect() {

    }

    public function GetBaoCaoHomNay() {

    }

    public function GetBaoCaoUserNgay($userId, $ngay) {
        $where = " `IdUser` = '{$userId}' and `DateReport` = '{$ngay}' ";
        return $this->SelectRow($where);
    }

    public function Content() {
        return htmlspecialchars_decode($this->Content);
    }

}
