<?php

namespace Model;

class UserRole extends DB implements IModelService {

    public $Id;
    public $UserId;
    public $RoleId;

    public function __construct($userRole = null) {
        self::$TableName = prefixTable . "users_role";
        parent::__construct();
        if ($userRole) {
            if (!is_array($userRole)) {
                $Id = $userRole;
                $userRole = $this->GetById($Id);
            }
            if ($userRole) {
                $this->Id = isset($userRole["Id"]) ? $userRole["Id"] : null;
                $this->UserId = isset($userRole["UserId"]) ? $userRole["UserId"] : null;
                $this->RoleId = isset($userRole["RoleId"]) ? $userRole["RoleId"] : null;
            }
        }
    }

    public function Delete($Id) {
        
    }

    public function DeleteByUseId($userId) {
        $where = "`UserId` = '{$userId}'";
        $this->DeleteDB($where);
    }

    public function GetByRoleId($roleId) {
        $where = "`RoleId` = '{$roleId}'";
        return $this->Select($where);
    }

    public function GetByUserId($userId) {
        $where = "`UserId` = '{$userId}'";
        return $this->Select($where);
    }

    public function GetById($Id) {
        $where = "`Id` = '{$Id}'";
        return $this->SelectRow($where);
    }

    public function GetItems($where, $indexPage, $pageNumber, &$total) {
        
    }

    public function Post($model) {
        $this->Insert($model);
    }

    function UpdateByUserId($userId, $roles) {
        var_dump($roles);
        // xóa hết các quyền của user
        $this->DeleteByUseId($userId);
        // tạo lại quyền
        foreach ($roles as $roleId) {
            $model["Id"] = Common::uuid();
            $model["UserId"] = $userId;
            $model["RoleId"] = $roleId;
            $this->Post($model);
        }
        return true;
    }

    public function Put($model) {
        
    }

}
