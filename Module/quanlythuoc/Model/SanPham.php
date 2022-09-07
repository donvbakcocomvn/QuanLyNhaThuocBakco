<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Module\quanlythuoc\Model;

use Model\OptionsService;
use Module\quanlythuoc\Permission;
use Model\Common;

/**
 * Description of SanPham
 *
 * @author MSI
 */
class SanPham extends \Model\DB implements \Model\IModelService {

    public $Id; 
    public $Idloaithuoc; 
    public $Name; 
    public $Namebietduoc; 
    public $Solo; 
    public $Gianhap; 
    public $Giaban; 
    public $DVT; 
    public $Ngaysx; 
    public $HSD; 
    public $DVQuyDoi; 
    public $Tacdung; 
    public $Cochetacdung; 
    public $Ghichu; 
    public $Soluong; 
    public $NhaSX; 
    public $NuocSX; 
    public $IsDelete; 
    public $CachDung; 

    public function __construct($sp = null) {
        self::$TableName = prefixTable . "qlthuoc_thuoc";
        parent::__construct();
        if ($sp) {
            if (!is_array($sp)) {
                $id = $sp;
                $sp = $this->GetById($id);
            }
            if ($sp) {
                $this->Id = isset($sp["Id"]) ? $sp["Id"] : null ;
                $this->Idloaithuoc = isset($sp["Idloaithuoc"]) ? $sp["Idloaithuoc"] : null ;
                $this->Name = isset($sp["Name"]) ? $sp["Name"] : null ;
                $this->Namebietduoc = isset($sp["Namebietduoc"]) ? $sp["Namebietduoc"] : null ;
                $this->Solo = isset($sp["Solo"]) ? $sp["Solo"] : null ;
                $this->Gianhap = isset($sp["Gianhap"]) ? $sp["Gianhap"] : null ;
                $this->Giaban = isset($sp["Giaban"]) ? $sp["Giaban"] : null ;
                $this->DVT = isset($sp["DVT"]) ? $sp["DVT"] : null ;
                $this->Ngaysx = isset($sp["Ngaysx"]) ? $sp["Ngaysx"] : null ;
                $this->HSD = isset($sp["HSD"]) ? $sp["HSD"] : null ;
                $this->DVQuyDoi = isset($sp["DVQuyDoi"]) ? $sp["DVQuyDoi"] : null ;
                $this->Tacdung = isset($sp["Tacdung"]) ? $sp["Tacdung"] : null ;
                $this->Cochetacdung = isset($sp["Cochetacdung"]) ? $sp["Cochetacdung"] : null ;
                $this->Ghichu = isset($sp["Ghichu"]) ? $sp["Ghichu"] : null ;
                $this->Soluong = isset($sp["Soluong"]) ? $sp["Soluong"] : null ;
                $this->NhaSX = isset($sp["NhaSX"]) ? $sp["NhaSX"] : null ;
                $this->NuocSX = isset($sp["NuocSX"]) ? $sp["NuocSX"] : null ;
                $this->IsDelete = isset($sp["IsDelete"]) ? $sp["IsDelete"] : null ;
                $this->CachDung = isset($sp["CachDung"]) ? $sp["CachDung"] : null ;
            }
        }
    }

    public function GetCDTById($id)
    {
        $sql = "SELECT `CachDung` FROM `lap1_qlthuoc_thuoc` WHERE `Id` = '$id'";
        $result = $this->GetRow($sql);
        $a = $result["CachDung"];
        $b = $this->GetNameCDT($a); 
        return $b;
    }

    public function GetValByDesDVT($des)
    {
        $sql = "SELECT `Val` FROM `lap1_options` WHERE `Des` = '$des' and `GroupsId` = 'donvitinh'";
        $result = $this->GetRow($sql);
        return $result;
    }

    public function GetValByDesCachDung($des)
    {
        $sql = "SELECT `Val` FROM `lap1_options` WHERE `Des` = '$des' and `GroupsId` = 'cachdungthuoc'";
        $result = $this->GetRow($sql);
        return $result;
    }

    // Tạo Mã Thuốc
    function CreatId()
    {
        $sql = " SELECT COUNT(*) AS `Tong` FROM `lap1_qlthuoc_thuoc` WHERE 1";
        $result = $this->GetRow($sql);
        $tong = $result["Tong"] + 1;
        $Id = Common::NumberToStringFomatZero($tong, 4);
        $IdCreate = "MT" . $Id;
        return $IdCreate;
    }

    public static function CapChaTpOptions($dungTatCa = false)
    {
        $dm = new SanPham();
        $where = "`Name` != '' or `Name` is null or `IsDelete` = 0 ";
        $a = $dm->SelectToOptions($where, ["Id", "Name"]);
        if ($dungTatCa == true) {
            $a = ["" => "Tất Cả"] + $a;
        }
        return $a;
    }

    function isdelete($DSMaSanPham)
    {
        $model["IsDelete"] = 1;
        $DSMaSanPham = implode("','", $DSMaSanPham);
        $where = "`Id` in ('{$DSMaSanPham}') ";
        $this->Update($model, $where);
    }

    static function IsDeleteOption($item)
    {
        if ($item = 1) {
            return "Hiện";
        }
        return "Đã Ẩn";
    }

    public function DonViTinh()
    {
        $op = new OptionsService();
        $nameDVT = $op->GetGroupsToSelect("donvitinh");
        return $nameDVT[$this->DVT] ?? "";
    }

    public function CachDungThuoc()
    {
        $op = new OptionsService();
        $nameDVT = $op->GetGroupsToSelect("cachdungthuoc");
        return $nameDVT[$this->CachDung] ?? "";
    }

    public function GetNameCDT($id)
    {
        $sql = "SELECT `Name` FROM `lap1_options` WHERE `Val` = $id and `GroupsId` = 'cachdungthuoc'";
        $result = $this->GetRow($sql);
        return $result["Name"];
    }

    public function DonViQuyDoi()
    {
        $op = new OptionsService();
        $nameDVQD = $op->GetGroupsToSelect("donviquydoi");
        return $nameDVQD[$this->DVQuyDoi] ?? "Khác";
    }

    public function IdLoaiThuoc()
    {
        return new DanhMuc($this->Idloaithuoc);
    }

    public function Delete($Id) {
        return $this->DeleteById($Id);
    }

    public function GetById($Id) {
        return $this->SelectById($Id);
    }

    public function Post($model) {
        return $this->Insert($model);
    }

    public function Put($model) {
        return $this->UpdateRow($model);
    }
    static function CountSPThuocByDanhMuc($id) {

        $Sp = new SanPham();
        $where = "`DanhMucId` = '{$id}'";
        return $Sp->SelectCount($where);
    }

    public static function btnDeleteSelect() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "quanlysanpham_sanpham_delete"]) == false) {
            return;
        }
        ?> 
        <button class="btn btn-danger" title="Xóa Các Sản Phẩm Đã Chọn?" >
            <i class="fa fa-times"></i>Xóa Chọn
        </button>
        <?php
    }


    // Tìm kiếm
    public function GetItems($params, $indexPage, $pageNumber, &$total) {
        $name = isset($params["keyword"]) ? $params["keyword"] : '';
        $danhmuc = isset($params["danhmuc"]) ? $params["danhmuc"] : null;
        $isShow = isset($params["isShow"]) ? $params["isShow"] : null;
        $isShowSql = "and `isShow` >= 0 ";
        $danhmucSql = "";

        if ($isShow) {
            $isShowSql = "and `isShow` = '{$isShow}' ";
        }
        if ($danhmuc) {
            $danhmucSql = "and `DanhMucId` = '{$danhmuc}' ";
        }

        $where = " (`Name` like '%{$name}%' or `Namebietduoc` like '%{$name}%' {$danhmucSql}) and `isDelete` = 0 ";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }


    public function Content() {
        return htmlspecialchars_decode($this->Content);
    }

    public function DanhMuc() {
        return new DanhMuc($this->DanhMucId);
    }

    public function Price() {
        return \Model\Common::ViewPrice($this->Price);
    }

    

    // ẩn trong hiển thị sảm -> xóa đưa vào thùng rác
    public function DeleteIsShow($DSMaSanPham) {

        $model["isShow"] = -1;
        $DSMaSanPham = implode("','", $DSMaSanPham);
        $where = "`Id` in ('{$DSMaSanPham}') ";
        $this->Update($model, $where);
    }

    public function btnMoveToTrash() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "quanlysanpham_sanpham_delete"]) == false) {
            return;
        }
        ?> 
        <a class="btn btn-danger" title="Xóa Sản Phẩm Này?" href="/quanlysanpham/sanpham/delete/?id=<?php echo $this->Id; ?>">
            <i class="fa fa-times"></i>Xóa
        </a>
        <?php
    }

    /**
     * Lấy sản phẩm mới nhất
     * @param {type} parameter
     */
    public function SanPhamMoi($soLuongSanPham) {
        $where = " 1 = 1 ORDER BY `DateCreate` DESC limit 0,{$soLuongSanPham}";
        return $this->Select($where);
    }
}
