<?php

namespace Module\donthuoc;

use Model\Role;

class Permission
{
    //put your code here
    const QLT_DonThuoc_DS = "QLT_DonThuoc_DS";
    const QLT_DonThuoc_Post = "QLT_DonThuoc_Post";
    const QLT_DonThuoc_Put = "QLT_DonThuoc_Put";
    const QLT_DonThuoc_Delete = "QLT_DonThuoc_Delete";
    const QLT_DonThuoc_Export = "QLT_DonThuoc_Export";

    public function __construct()
    {
    }

    public static function DanhSachQuyen()
    {
        return [
            self::QLT_DonThuoc_DS => [
                "Id" => self::QLT_DonThuoc_DS,
                "Name" => "Danh Sách Đơn Thuốc",
                "Des" => "Danh Sách Đơn Thuốc",
                "IsNotDelete" => 0,
            ],
            self::QLT_DonThuoc_Post => [
                "Id" => self::QLT_DonThuoc_Post,
                "Name" => "Thêm Đơn Thuốc",
                "Des" => "Thêm Đơn Thuốc",
                "IsNotDelete" => 0,
            ],
            self::QLT_DonThuoc_Put => [
                "Id" => self::QLT_DonThuoc_Put,
                "Name" => "Sửa Đơn Thuốc",
                "Des" => "Sửa Đơn Thuốc",
                "IsNotDelete" => 0,
            ],
            self::QLT_DonThuoc_Delete => [
                "Id" => self::QLT_DonThuoc_Delete,
                "Name" => "Xoá Đơn Thuốc",
                "Des" => "Xoá Đơn Thuốc",
                "IsNotDelete" => 0,
            ],
            self::QLT_DonThuoc_Export => [
                "Id" => self::QLT_DonThuoc_Export,
                "Name" => "Export Đơn Thuốc",
                "Des" => "Export Đơn Thuốc",
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
