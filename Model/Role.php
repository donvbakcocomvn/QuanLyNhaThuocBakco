<?php

namespace Model;

class Role extends DB implements IModelService {

    public $Id;
    public $Name;
    public $Des;
    public $IsNotDelete;

    public function __construct($role = null) {
        self::$TableName = prefixTable . "role";
        parent::__construct();
        if ($role) {
            $this->Id = isset($role["Id"]) ? $role["Id"] : null;
            $this->Name = isset($role["Name"]) ? $role["Name"] : null;
            $this->Des = isset($role["Des"]) ? $role["Des"] : null;
            $this->IsNotDelete = isset($role["IsNotDelete"]) ? $role["IsNotDelete"] : null;
        }
    }

    public function Delete($Id) {
        $ur = new \Model\UserRole();
        $roles = $ur->GetByRoleId($Id);
        // liên kết ở bảng khác.
        if ($roles != null) {
            return null;
        }
        $modelRole = new Role();
        DB::$Debug = true;
        $roledetail = $modelRole->GetById($Id); 
        // cấu hình không cho xóa
        if ($roledetail["IsNotDelete"] == 1) {
            return null;
        }
        $where = "`Id` = '{$Id}'"; 
        return $modelRole->DeleteDB($where);
    }

    public function GetById($Id) {
        $where = "`Id` = '{$Id}'";
        return $this->SelectRow($where);
    }

    public function GetItems($params, $indexPage, $pageNumber, &$total) {

        $keyword = $params["keyword"];
        $where = "`Id` like '%$keyword%' or `Name` like '%$keyword%'";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function Post($model) {
        return $this->Insert($model);
    }

    public function Put($model) {
        $where = "`Id` = '{$model["Id"]}'";
        return $this->Update($model, $where);
    }

    /**
     * nut sua
     * @param {type} parameter
     */
    public function btnSua() {
        if (Permission::CheckPremision([User::Admin, md5(\Controller\quanlyquyen::class . "_put")]) == false) {
            return;
        }

        $btn = <<<BTNSUA
                <a class="btn btn-sm btn-primary"  href="/index.php?controller=quanlyquyen&action=put&id={$this->Id}" >Sửa</a>
                
BTNSUA;
        return $btn;
    }

    /**
     * nut xoa
     * @param {type} parameter
     */
    public function btnXoa() {
        if (Permission::CheckPremision([User::Admin, md5(\Controller\quanlyquyen::class . "_delete")]) == false) {
            return;
        }
        $btn = <<<BTNSUA
                <a title="Bạn có muốn xóa role này?" class="btn btn-sm btn-danger"  href="/index.php?controller=quanlyquyen&action=delete&id={$this->Id}" >Xóa</a>
                
BTNSUA;
        return $btn;
    }

    public static function btnThem() {
        if (Permission::CheckPremision([User::Admin, md5(\Controller\quanlyquyen::class . "_post")]) == false) {
            return;
        }
        $btn = <<<BTNSUA
                <a href="/index.php?controller=quanlyquyen&action=post" class="btn btn-success" ><i class="fa fa-plus" ></i></a>
                
BTNSUA;
        return $btn;
        //
    }

    function danhSachQuyen() {
        $data["post"] = [
            "Id" => md5(\Controller\quanlyquyen::class . "_post"),
            "Name" => "Thêm",
            "Des" => "Module Quản Lý Quyền",
        ];
        $data["put"] = [
            "Id" => md5(\Controller\quanlyquyen::class . "_put"),
            "Name" => "Sửa",
            "Des" => "Module Quản Lý Quyền",
        ];
        $data["delete"] = [
            "Id" => md5(\Controller\quanlyquyen::class . "_delete"),
            "Name" => "Xóa",
            "Des" => "Module Quản Lý Quyền",
        ];
        $data["view"] = [
            "Id" => md5(\Controller\quanlyquyen::class . "_view"),
            "Name" => "Xem",
            "Des" => "Module Quản Lý Quyền",
        ];

        return $data;
    }

    public static function Install() {
        /**
         * cài đat role
         * @param {type} parameter
         */
        try {
            $dsRole = self::danhSachQuyen();
            $modelRole = new Role();
            foreach ($dsRole as $role) {
                $role["IsNotDelete"] = 0;
                $modelRole->Post($role);
            }
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }
    }

}
