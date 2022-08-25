<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

/**
 * Description of OptionsService
 *
 * @author MSI
 */
class OptionsService extends DB implements IModelService, IModelToOptions {

    public $Id;
    public $Name;
    public $Val;
    public $Des;
    public $Keyword;
    public $GroupsId;

    public function __construct($op = null) {
        parent::$TableName = prefixTable . "options";
        parent::__construct();
        if ($op) {
            // var_dump($op);
            if (!is_array($op)) {
                $Id = $op;
                $op = $this->GetById($Id);
                // var_dump($op);
                // var_dump("__op");
            }
            if ($op) {
                $this->Id = isset($op["Id"]) ? $op["Id"] : "";
                $this->Name = isset($op["Name"]) ? $op["Name"] : "";
                $this->Val = isset($op["Val"]) ? $op["Val"] : "";
                $this->Des = isset($op["Des"]) ? $op["Des"] : "";
                $this->GroupsId = isset($op["GroupsId"]) ? $op["GroupsId"] : "";
            }
        }
    }

    //put your code here
    public function Delete($Id) {
        return $this->DeleteById($Id);
    }

    public function GetById($Id) {

        return $this->SelectById($Id);
    }

    public function GetItems($params, $indexPage, $pageNumber, &$total) {
        $where = "`GroupsId` = '{$params["GroupsId"]}' and `Name` like '%{$params["keyword"]}%'";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function Post($model) {
        if (!isset($model["Id"])) {
            $model["Id"] = Common::uuid();
        }
        return $this->Insert($model);
    }

    public function Put($model) {
        return $this->UpdateRow($model);
    }

    public static function GetGroupsToSelect($idGroups) {
        $op = new OptionsService();
        return $op->SelectToOptions("`GroupsId`= '{$idGroups}' ", ["Val", "Name"]);
    }

    public static function ToSelect() {
        $op = new OptionsService();
        return $op->SelectToOptions("1=1", ["Val", "Name"]);
    }

    public function btnSua() {
        if (Permission::CheckPremision([User::Admin, "QuanLyNhanSu"]))

            ?>
        <a href="/options/put/<?php echo $this->Id; ?>" class="btn btn-primary btn-sm" >Sửa</a>
        <?php
    }

    public function btnXoa() {
        if (Permission::CheckPremision([User::Admin]))

            ?>
        <a href="/options/delete/?id=<?php echo $this->Id; ?>" class="btn btn-danger btn-sm" >Xóa</a>
        <?php
    }

    public function GroupsIdName() {
        return [
            "congty" => "Công Ty",
            "hopdong" => "Hợp Đồng",
            "tinhtrang" => "Tình Trạng Hợp Đồng",
            "hinhthuchd" => "Hình Thức Hợp Đồng",
            "gioitinh" => "Giới Thiệu",
            "chucvu" => "Chức Vụ",
            "donvitinh" => "Đơn Vị Tính",
        ];
    }

    public function GroupsId() {
        if (isset($this->GroupsIdName()[$this->GroupsId])) {
            return $this->GroupsIdName()[$this->GroupsId];
        }
        return "N/A";
    }

    public function GetByKeyValue($val, $idGroups) {
        $where = "`GroupsId` = '{$idGroups}' and `Val` = '{$val}'";
        return $this->SelectRow($where);
    }

}
