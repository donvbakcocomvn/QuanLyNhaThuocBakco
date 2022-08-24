<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Module\quanlythuoc\Model;

use Module\quanlythuoc\Permission;

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
    public $Tacdung; 
    public $Cochetacdung; 
    public $Ghichu; 
    public $NhaSX; 
    public $NuocSX; 
    public $Lang;

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
                $this->Tacdung = isset($sp["Tacdung"]) ? $sp["Tacdung"] : null ;
                $this->Cochetacdung = isset($sp["Cochetacdung"]) ? $sp["Cochetacdung"] : null ;
                $this->Ghichu = isset($sp["Ghichu"]) ? $sp["Ghichu"] : null ;
                $this->NhaSX = isset($sp["NhaSX"]) ? $sp["NhaSX"] : null ;
                $this->NuocSX = isset($sp["NuocSX"]) ? $sp["NuocSX"] : null ;
                $this->Lang = isset($sp["Lang"]) ? $sp["Lang"] : null ;
            }
        }
    }

    public function Delete($Id) {
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

    public function btnPut() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, Permission::QLT_Thuoc_Put]) == false) {
            return;
        }
        ?> 
        <a class="btn btn-primary" href="/quanlythuoc/thuoc/put/?id=<?php echo $this->Id; ?>">
            <i class="fa fa-edit"></i>Sửa Thuốc
        </a>
        <?php
    }

    public function btnDelete() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, Permission::QLT_Thuoc_Delete]) == false) {
            return;
        }
        ?> 
        <a class="btn btn-danger" title="Xóa Vĩnh Viễn Sản Phẩm Này?" href="/quanlythuoc/thuoc/delete/<?php echo $this->Id; ?>">
            <i class="fa fa-times"></i>Xóa Thuốc
        </a>
        <?php
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
    
    public static function btnPost() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, Permission::QLT_Thuoc_Post]) == false) {
            return;
        }
        ?> 
        <a class="btn btn-success" href="/index.php?module=quanlythuoc&controller=thuoc&action=post">
            <i class="fa fa-plus"></i>Thêm Thuốc Mới
        </a>
        <?php
    }

    public function GetItems($params, $indexPage, $pageNumber, &$total) {
        $name = isset($params["keyword"]) ? $params["keyword"] : '';
        $danhmuc = isset($params["danhmuc"]) ? $params["danhmuc"] : null;
        $isShow = isset($params["isShow"]) ? $params["isShow"] : null;
        $isShowSql = "and `isShow` >= '0' ";
        $danhmucSql = "";

        if ($isShow) {
            $isShowSql = "and `isShow` = '{$isShow}' ";
        }
        if ($danhmuc) {
            $danhmucSql = "and `DanhMucId` = '{$danhmuc}' ";
        }

        $where = " `Name` like '%{$name}%' {$danhmucSql} $isShowSql";
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
