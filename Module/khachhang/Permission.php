<?php

namespace Module\khachhang;

use Model\Role;

class Permission {
    //put your code here

    const KhachHangDS = "KhachHangDS";
    const KhachHangPost = "KhachHangPost";
    const KhachHangPut = "KhachHangPut";
    const KhachHangDelete = "KhachHangDelete";
    const KhachHangImport = "KhachHangImport";
    const KhachHangExport = "KhachHangExport";


    public function __construct() {
        
    }

    public static function DanhSachQuyen()
    {
        return [
            self::KhachHangDS => [
                "Id" => self::KhachHangDS,
                "Name" => "Danh Sách Khách Hàng",
                "Des" => "Danh Sách Khách Hàng",
                "IsNotDelete" => 0,
            ],
            self::KhachHangPost => [
                "Id" => self::KhachHangPost,
                "Name" => "Thêm Khách Hàng",
                "Des" => "Thêm Khách Hàng",
                "IsNotDelete" => 0,
            ],
            self::KhachHangPut => [
                "Id" => self::KhachHangPut,
                "Name" => "Sửa Khách Hàng",
                "Des" => "Sửa Khách Hàng",
                "IsNotDelete" => 0,
            ],
            self::KhachHangDelete => [
                "Id" => self::KhachHangDelete,
                "Name" => "Xoá Khách Hàng",
                "Des" => "Xoá Khách Hàng",
                "IsNotDelete" => 0,
            ],
            self::KhachHangImport => [
                "Id" => self::KhachHangImport,
                "Name" => "Import Khách Hàng",
                "Des" => "Import Khách Hàng",
                "IsNotDelete" => 0,
            ],
            self::KhachHangExport => [
                "Id" => self::KhachHangExport,
                "Name" => "Export Khách Hàng",
                "Des" => "Export Khách Hàng",
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
