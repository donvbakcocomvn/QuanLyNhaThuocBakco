<?php

namespace Module\toathuoc;

use Model\Role;

class Permission {
    //put your code here
    const ToaThuocDS = "ToaThuocDS";
    const ToaThuocPost = "ToaThuocPost";
    const ToaThuocPut = "ToaThuocPut";
    const ToaThuocDelete = "ToaThuocDelete";
    const ToaThuocImport = "ToaThuocImport";
    const ToaThuocExport = "ToaThuocExport";
    

    public function __construct() {
        
    }

    public static function DanhSachQuyen()
    {
        return [
            self::ToaThuocDS => [
                "Id" => self::ToaThuocDS,
                "Name" => "Quản Lý Toa Thuốc",
                "Des" => "Quản Lý Toa Thuốc",
                "IsNotDelete" => 0,
            ],
            self::ToaThuocPost => [
                "Id" => self::ToaThuocPost,
                "Name" => "Thêm Toa Thuốc",
                "Des" => "Thêm Toa Thuốc",
                "IsNotDelete" => 0,
            ],
            self::ToaThuocPut => [
                "Id" => self::ToaThuocPut,
                "Name" => "Sửa Toa Thuốc",
                "Des" => "Sửa Toa Thuốc",
                "IsNotDelete" => 0,
            ],
            self::ToaThuocDelete => [
                "Id" => self::ToaThuocDelete,
                "Name" => "Xoá Toa Thuốc",
                "Des" => "Xoá Toa Thuốc",
                "IsNotDelete" => 0,
            ],
            self::ToaThuocExport => [
                "Id" => self::ToaThuocExport,
                "Name" => "Export Toa Thuốc",
                "Des" => "Export Toa Thuốc",
                "IsNotDelete" => 0,
            ],
            self::ToaThuocImport => [
                "Id" => self::ToaThuocImport,
                "Name" => "Export Toa Thuốc",
                "Des" => "Export Toa Thuốc",
                "IsNotDelete" => 0,
            ],
        ];
    }

    public static function install()
    {
        $dsRole = self::DanhSachQuyen();
        $modelRole = new Role();
        foreach ($dsRole as $role) {
            if ($modelRole->GetById($role["Id"])==null) {
                $modelRole->Post($role);
            }
        }
    }
    public static function uninstall()
    {
        $dsRole = self::DanhSachQuyen();
        $modelRole = new Role();
        foreach ($dsRole as $role) {
            $modelRole->Delete($role["Id"]);
        }
    }
}
