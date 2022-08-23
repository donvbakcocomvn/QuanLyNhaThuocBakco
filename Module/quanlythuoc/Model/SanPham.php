<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Module\quanlysanpham\Model;

/**
 * Description of SanPham
 *
 * @author MSI
 */
class SanPham extends \Model\DB implements \Model\IModelService {

    public $Id;
    public $Name;
    public $Code;
    public $Des;
    public $Keyword;
    public $Title;
    public $DanhMucId;
    public $Alias;
    public $Username;
    public $Price;
    public $oldPrice;
    public $Summary;
    public $Content;
    public $UrlImages;
    public $DateCreate;
    public $Number;
    public $Note;
    public $BuyTimes;
    public $Views;
    public $isShow;
    public $STT;
    public $Lang;

    public function __construct($sp = null) {
        self::$TableName = prefixTable . "sanpham";
        parent::__construct();
        if ($sp) {
            if (!is_array($sp)) {
                $id = $sp;
                $sp = $this->GetById($id);
            }
            if ($sp) {
                $this->Id = isset($sp["Id"]) ? $sp["Id"] : null;
                $this->Name = isset($sp["Name"]) ? $sp["Name"] : null;
                $this->Code = isset($sp["Code"]) ? $sp["Code"] : null;
                $this->Des = isset($sp["Des"]) ? $sp["Des"] : null;
                $this->Keyword = isset($sp["Keyword"]) ? $sp["Keyword"] : null;
                $this->Title = isset($sp["Title"]) ? $sp["Title"] : null;
                $this->DanhMucId = isset($sp["DanhMucId"]) ? $sp["DanhMucId"] : null;
                $this->Alias = isset($sp["Alias"]) ? $sp["Alias"] : null;
                $this->Username = isset($sp["Username"]) ? $sp["Username"] : null;
                $this->Price = isset($sp["Price"]) ? $sp["Price"] : null;
                $this->oldPrice = isset($sp["oldPrice"]) ? $sp["oldPrice"] : null;
                $this->Summary = isset($sp["Summary"]) ? $sp["Summary"] : null;
                $this->Content = isset($sp["Content"]) ? $sp["Content"] : null;
                $this->UrlImages = isset($sp["UrlImages"]) ? $sp["UrlImages"] : null;
                $this->DateCreate = isset($sp["DateCreate"]) ? $sp["DateCreate"] : null;
                 
                $this->Number = isset($sp["Number"]) ? $sp["Number"] : null;
                $this->Note = isset($sp["Note"]) ? $sp["Note"] : null;
                $this->BuyTimes = isset($sp["BuyTimes"]) ? $sp["BuyTimes"] : null;
                $this->Views = isset($sp["Views"]) ? $sp["Views"] : null;
                $this->isShow = isset($sp["isShow"]) ? $sp["isShow"] : null;
                $this->STT = isset($sp["STT"]) ? $sp["STT"] : null;
                $this->Lang = isset($sp["Lang"]) ? $sp["Lang"] : null;
            }
        }
    }

    //put your code here

    /**
     * xóa sản phẩm
     * @param {type} parameter
     */
    public function Delete($Id) {
        // xóa só lượng
        $spsl = new SanPhamSoLuong();
        $spsl->DeleteByIdSanPham($Id);
        $spsl = new SanPhamThuocTinh();
        $spsl->DeleteByIdSanPham($Id);
        // xóa hinh
        $sp = new SanPham($Id);
        $sp->XoaHinh();
        $sp->DeleteById($Id);
    }

    static function SanPhamByDanhMuc($id) {
        $Sp = new SanPham();
    }

    static function CountSanPhamByDanhMuc($id) {

        $Sp = new SanPham();
        $where = "`DanhMucId` = '{$id}'";
        return $Sp->SelectCount($where);
    }

    public function GetById($Id) {
        return $this->SelectById($Id);
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

    public function Post($model) {
        return $this->Insert($model);
    }

    public function Put($model) {
        return $this->UpdateRow($model);
    }

    public function Content() {
        return htmlspecialchars_decode($this->Content);
    }

    public function ToArray() {
        $a["Id"] = $this->Id;
        $a["Name"] = $this->Name;
        $a["DanhMucId"] = $this->DanhMucId;
        $a["DanhMuc"] = $this->DanhMuc();
        $a["Options"] = $this->Options();
        $a["Alias"] = $this->Alias;
        $a["Username"] = $this->Username;
        $a["Price"] = $this->Price;
        $a["oldPrice"] = $this->oldPrice;
        $a["UrlImages"] = $this->UrlImages;
        $a["DateCreate"] = $this->DateCreate;
        $a["Number"] = $this->Number;
        $a["Note"] = $this->Note;
        $a["BuyTimes"] = $this->BuyTimes;
        $a["Views"] = $this->Views;
        $a["isShow"] = $this->isShow;
        $a["STT"] = $this->STT;
        $a["Lang"] = $this->Lang;
        return $a;
    }

    public function DanhMuc() {
        return new DanhMuc($this->DanhMucId);
    }

    public function OptionsByIndex($index) {
        $SanPhamThuocTinh = new SanPhamThuocTinh();
//        \Model\DB::$Debug = true;
        return new SanPhamThuocTinh($SanPhamThuocTinh->GetItemsByIdSanPhamOptionsIndex($this->Id, $index));
    }

    public function Options() {
        $SanPhamThuocTinh = new SanPhamThuocTinh();
        $items = $SanPhamThuocTinh->GetItemsByIdSanPham($this->Id);
        foreach ($items as $k => $item) {
            $SanPhamLoaiThuocTinh = new SanPhamLoaiThuocTinh();
            $items[$k]["LoaiThuocTinh"] = $SanPhamLoaiThuocTinh->GetById($item["OptionsTypeId"]);
        }
        return $items;
    }

    public static function btnPost() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "quanlysanpham_sanpham_them"]) == false) {
            return;
        }
        ?> 
        <a class="btn btn-success" href="/index.php?module=quanlysanpham&controller=sanpham&action=post">
            <i class="fa fa-plus"></i>Thêm Mới
        </a>
        <?php
    }

    public function Price() {
        return \Model\Common::ViewPrice($this->Price);
    }

    public function btnPut() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "quanlysanpham_sanpham_put"]) == false) {
            return;
        }
        ?> 
        <a class="btn btn-primary" href="/quanlysanpham/sanpham/put/?id=<?php echo $this->Id; ?>">
            <i class="fa fa-edit"></i>Sửa
        </a>
        <?php
    }

    public function btnDelete() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, "quanlysanpham_sanpham_delete"]) == false) {
            return;
        }
        ?> 
        <a class="btn btn-danger" title="Xóa Vĩnh Viễn Sản Phẩm Này?" href="/quanlysanpham/sanpham/deleteall/<?php echo $this->Id; ?>">
            <i class="fa fa-times"></i>Xóa
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

    public function XoaHinh() {
        $urlHinh = $this->UrlImages;
        $urlHinh = substr($urlHinh, 1);
//        echo $urlHinh;
        if (file_exists($urlHinh)) {
            unlink($urlHinh);
        }
    }

    /**
     * Lấy sản phẩm mới nhất
     * @param {type} parameter
     */
    public function SanPhamMoi($soLuongSanPham) {
        $where = " 1 = 1 ORDER BY `DateCreate` DESC limit 0,{$soLuongSanPham}";
        return $this->Select($where);
    }

    public function ThanhTien() {
        return $this->Number * $this->Price;
    }
    public function ThanhTienToVND() {
        return number_format($this->ThanhTien(),0, ".",",") ." vnđ";
    }

}
