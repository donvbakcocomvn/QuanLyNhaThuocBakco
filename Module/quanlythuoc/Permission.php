<?php

namespace Module\quanlythuoc;

use Model\Role;

class Permission
{
    //put your code here
    const QuanLyThuoc = "QuanLyThuoc";
    const QuanLyThuocThem = "QuanLyThuocThem";
    const QuanLyThuocSua = "QuanLyThuocSua";
    const QuanLyThuocXoa = "QuanLyThuocXoa";
    const QuanLyThuocExport = "QuanLyThuocExport";
    public function __construct()
    {
    }

    public static function DanhSachQuyen()
    {
        return [
            self::QuanLyThuoc => [
                "Id" => self::QuanLyThuoc,
                "Name" => "Quản Lý Thuốc",
                "Des" => "Quản lý Thuốc",
                "IsNotDelete" => 0,
            ],
            self::QuanLyThuocThem => [
                "Id" => self::QuanLyThuocThem,
                "Name" => "Thêm Thuốc",
                "Des" => "Thêm Thuốc",
                "IsNotDelete" => 0,
            ],
            self::QuanLyThuocSua => [
                "Id" => self::QuanLyThuocSua,
                "Name" => "Sửa Thuốc",
                "Des" => "Sửa Thuốc",
                "IsNotDelete" => 0,
            ],
            self::QuanLyThuocXoa => [
                "Id" => self::QuanLyThuocXoa,
                "Name" => "Xoá Thuốc",
                "Des" => "Xoá Thuốc",
                "IsNotDelete" => 0,
            ],
            self::QuanLyThuocExport => [
                "Id" => self::QuanLyThuocExport,
                "Name" => "Export Thuốc",
                "Des" => "Export Thuốc",
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
