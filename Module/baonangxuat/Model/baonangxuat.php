<?php

namespace Module\baonangxuat\Model;

class baonangxuat extends \Model\DB implements \Model\IModelService, \Model\IModelToOptions {

    //put your code here
    public function __construct() {
        parent::$TableName = prefixTable . "baonangxuat";
        parent::__construct();
    }

    public function Delete($Id) {
        return $this->DeleteById($Id);
    }

    public function GetById($Id) {
        $this->SelectById($Id);
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
        $where = "1=1";
        return $this->SelectToOptions($where, ["Id", "Name"]);
    }

}
