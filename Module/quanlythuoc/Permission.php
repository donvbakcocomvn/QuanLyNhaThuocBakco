<?php

namespace Module\quanlythuoc;

use Model\Role;

class Permission
{
    //put your code here
    const QLT_DanhMuc_DS = "QLT_DanhMuc_DS";
    const QLT_DanhMuc_Post = "QLT_DanhMuc_Post";
    const QLT_DanhMuc_Put = "QLT_DanhMuc_Put";
    const QLT_DanhMuc_Delete = "QLT_DanhMuc_Delete";
    
    const QLT_Thuoc_DS = "QLT_Thuoc_DS";
    const QLT_Thuoc_Post = "QLT_Thuoc_Post";
    const QLT_Thuoc_Put = "QLT_Thuoc_Put";
    const QLT_Thuoc_Delete = "QLT_Thuoc_Delete";
    const QLT_Thuoc_Import = "QLT_Thuoc_Import";
    const QLT_Thuoc_Export = "QLT_Thuoc_Export";
    const QLT_Thuoc_Detail = "QLT_Thuoc_Detail";


    const QLT_Phieu_DS = "QLT_Phieu_DS";
    const QLT_Phieu_Post = "QLT_Phieu_Post";
    const QLT_Phieu_Put = "QLT_Phieu_Put";
    const QLT_Phieu_Delete = "QLT_Phieu_Delete";
    const QLT_Phieu_Detail = "QLT_Phieu_Detail";

    public function __construct()
    {
    }

    public static function DanhSachQuyen()
    {
        return [
            self::QLT_Thuoc_DS => [
                "Id" => self::QLT_Thuoc_DS,
                "Name" => "Danh Sách Thuốc",
                "Des" => "Danh Sách Thuốc",
                "IsNotDelete" => 0,
            ],
            self::QLT_Thuoc_Post => [
                "Id" => self::QLT_Thuoc_Post,
                "Name" => "Thêm Thuốc",
                "Des" => "Thêm Thuốc",
                "IsNotDelete" => 0,
            ],
            self::QLT_Thuoc_Put => [
                "Id" => self::QLT_Thuoc_Put,
                "Name" => "Sửa Thuốc",
                "Des" => "Sửa Thuốc",
                "IsNotDelete" => 0,
            ],
            self::QLT_Thuoc_Delete => [
                "Id" => self::QLT_Thuoc_Delete,
                "Name" => "Xoá Thuốc",
                "Des" => "Xoá Thuốc",
                "IsNotDelete" => 0,
            ],
            self::QLT_Thuoc_Export => [
                "Id" => self::QLT_Thuoc_Export,
                "Name" => "Export Thuốc",
                "Des" => "Export Thuốc",
                "IsNotDelete" => 0,
            ],
            self::QLT_Thuoc_Import => [
                "Id" => self::QLT_Thuoc_Import,
                "Name" => "Import Thuốc",
                "Des" => "Import Thuốc",
                "IsNotDelete" => 0,
            ],
            self::QLT_Thuoc_Detail => [
                "Id" => self::QLT_Thuoc_Detail,
                "Name" => "Chi Tiết Thuốc",
                "Des" => "Chi Tiết Thuốc",
                "IsNotDelete" => 0,
            ],


            self::QLT_DanhMuc_DS => [
                "Id" => self::QLT_DanhMuc_DS,
                "Name" => "Danh Sách Loại Thuốc",
                "Des" => "Danh Sách Loại Thuốc",
                "IsNotDelete" => 0,
            ],
            self::QLT_DanhMuc_Post => [
                "Id" => self::QLT_DanhMuc_Post,
                "Name" => "Thêm Loại Thuốc",
                "Des" => "Thêm Loại Thuốc",
                "IsNotDelete" => 0,
            ],
            self::QLT_DanhMuc_Put => [
                "Id" => self::QLT_DanhMuc_Put,
                "Name" => "Sửa Loại Thuốc",
                "Des" => "Sửa Loại Thuốc",
                "IsNotDelete" => 0,
            ],
            self::QLT_DanhMuc_Delete => [
                "Id" => self::QLT_DanhMuc_Delete,
                "Name" => "Xoá Loại Thuốc",
                "Des" => "Xoá Loại Thuốc",
                "IsNotDelete" => 0,
            ],
            self::QLT_Phieu_DS => [
                "Id" => self::QLT_Phieu_DS,
                "Name" => "Danh Sách Phiếu Xuất Nhập",
                "Des" => "Danh Sách Phiếu Xuất Nhập",
                "IsNotDelete" => 0,
            ],
            self::QLT_Phieu_Post => [
                "Id" => self::QLT_Phieu_Post,
                "Name" => "Thêm Phiếu",
                "Des" => "Thêm Phiếu",
                "IsNotDelete" => 0,
            ],
            self::QLT_Phieu_Put => [
                "Id" => self::QLT_Phieu_Put,
                "Name" => "Sửa Phiếu",
                "Des" => "Sửa Phiếu",
                "IsNotDelete" => 0,
            ],
            self::QLT_Phieu_Delete => [
                "Id" => self::QLT_Phieu_Delete,
                "Name" => "Xoá Phiếu",
                "Des" => "Xoá Phiếu",
                "IsNotDelete" => 0,
            ],
            self::QLT_Phieu_Detail => [
                "Id" => self::QLT_Phieu_Detail,
                "Name" => "Chi Tiết Phiếu",
                "Des" => "Chi Tiết Phiếu",
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
