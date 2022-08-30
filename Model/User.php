<?php

namespace Model;

class User {

    const Admin = "Admin";
    const QuanLy = "QuanLy";
    const QuanLyThuoc = "QuanLyThuoc";
    const QuanLyKeToa = "QuanLyKeToa";
    public $Id;
    public $Name;
    public $Username;
    public $Email;
    public $Password;
    public $KeyPassword;
    public $BOD;
    public $Status;
    public $Active;
    public $DateCreate;
    public $TokenReset;

    public function __construct($user = null) {

        if ($user) {
            $this->Id = isset($user["Id"]) ? $user["Id"] : null;
            $this->Name = isset($user["Name"]) ? $user["Name"] : null;
            $this->Username = isset($user["Username"]) ? $user["Username"] : null;
            $this->Email = isset($user["Email"]) ? $user["Email"] : null;
            $this->Password = isset($user["Password"]) ? $user["Password"] : null;
            $this->KeyPassword = isset($user["KeyPassword"]) ? $user["KeyPassword"] : null;
            $this->BOD = isset($user["BOD"]) ? $user["BOD"] : null;
            $this->Status = isset($user["Status"]) ? $user["Status"] : null;
            $this->Active = isset($user["Active"]) ? $user["Active"] : null;
            $this->DateCreate = isset($user["DateCreate"]) ? $user["DateCreate"] : null;
            $this->TokenReset = isset($user["TokenReset"]) ? $user["TokenReset"] : null;
        }
    }

    function GetRole() {
        $userRole = new \Model\UserRole();
        $roles = $userRole->GetByUserId($this->Id);
        return $roles;
    }

    /**
     * kiểm tra quền truy cập
     * $Allows: Danh Sách quền được truy cập
     */
    public function CheckPremision($Allows, $delines = []) {
        $roles = $this->GetRole();
        foreach ($roles as $role) {
            foreach ($delines as $deline) {
                if ($deline == $role["RoleId"]) {
                    return false;
                }
            }
            foreach ($Allows as $Allow) {
                if ($Allow == $role["RoleId"]) {
                    return true;
                }
            }
        }
        return false;
    }

    public static function CurentUser() {
        if (isset($_SESSION[QuanLy]))
            return new \Model\User($_SESSION[QuanLy]);
    }

    /**
     * nút sửa
     * @param {type} parameter
     */
    public function btnSua() {
        if (Permission::CheckPremision([User::Admin, md5(\Controller\quanlyusers::class . "_put"), md5(\Controller\quanlyusers::class)]) == false) {
            return;
        }

        $btn = <<<BTNSUA
                <a class="btn btn-sm btn-primary"  href="/index.php?controller=quanlyusers&action=put&id={$this->Id}" >Sửa</a>

BTNSUA;
        return $btn;
    }

    /**
     * nút xóa
     * @param {type} parameter
     */
    public function btnXoa() {
        if (Permission::CheckPremision([User::Admin, md5(\Controller\quanlyusers::class . "_delete"), md5(\Controller\quanlyusers::class)]) == false) {
            return;
        }
        $btn = <<<BTNSUA
                <a title="Bạn có muốn xóa tài khoản này?" class="btn btn-sm btn-danger"  href="/index.php?controller=quanlyusers&action=delete&id={$this->Id}" >Xóa</a>

BTNSUA;
        return $btn;
    }

    public static function btnThem() {
//        <a href="/index.php?controller=quanlyquyen&action=post" class="btn btn-success" ><i class="fa fa-plus" ></i></a>
        if (Permission::CheckPremision([User::Admin, md5(\Controller\quanlyusers::class . "_post"), md5(\Controller\quanlyusers::class)]) == false) {
            return;
        }

        $btn = <<<BTNSUA
                <a href="/index.php?controller=quanlyusers&action=post" class="btn btn-success" ><i class="fa fa-plus" ></i></a>

BTNSUA;
        return $btn;
    }

    public function BODFomatDB() {
        return date(Common::DateFomatDatabase(), strtotime($this->BOD));
    }

    public function BODView() {
        return date(Common::DateFomatView(), strtotime($this->BOD));
    }

    static function danhSachQuyen() {
        $data["post"] = [
            "Id" => md5(\Controller\quanlyusers::class . "_post"),
            "Name" => "Thêm",
            "Des" => "Module Quản Lý Tài Khoản",
        ];
        $data["put"] = [
            "Id" => md5(\Controller\quanlyusers::class . "_put"),
            "Name" => "Sửa",
            "Des" => "Module Quản Lý Tài Khoản",
        ];
        $data["delete"] = [
            "Id" => md5(\Controller\quanlyusers::class . "_delete"),
            "Name" => "Xóa",
            "Des" => "Module Quản Lý Tài Khoản",
        ];
        $data["view"] = [
            "Id" => md5(\Controller\quanlyusers::class . "_view"),
            "Name" => "Xem",
            "Des" => "Module Quản Lý Tài Khoản",
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

    public function QRDataCode() {
        $Phone = $this->UserInfor("Phone")->Val;
        $Name = $this->Name;
        $Time = date("YmdH:i");
        return base64_encode("{$Phone}|{$Name}");
    }

    public function UserInfor($Code) {
        return new Users\UserInfor(Users\UserInfor::GetByUserKey($Code, $this->Id));
    }

    public function ToArray() {
        $a["Id"] = $this->Id;
        $a["Name"] = $this->Name;
        $a["FullName"] = $this->Name;
        $a["Username"] = $this->Username;
        $a["Email"] = $this->Email;
        $a["Phone"] = $this->UserInfor("Phone")->Val;
//        $a["Password"] = $this->Password;
//        $a["KeyPassword"] = $this->KeyPassword;
        $a["BOD"] = $this->BOD;
        $a["Status"] = $this->Status;
        $a["Active"] = $this->Active;
        $a["DateCreate"] = $this->DateCreate;
        $a["TokenReset"] = $this->TokenReset;
        return $a;
    }

}
