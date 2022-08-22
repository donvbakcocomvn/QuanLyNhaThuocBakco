<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Module\baiviet\Model\DuAn;

/**
 * Description of DuAn
 *
 * @author MSI
 */
class DuAn extends \Model\DB implements \Model\IModelService, \Model\IModelToOptions {

    public $Id;
    public $Name;
    public $Title;
    public $Images;
    public $Alias;
    public $Des;
    public $Keyword;
    public $Sumary;
    public $Content;
    public $Tinh;
    public $Huyen;
    public $Xa;
    public $DiaChi;

    public function __construct($da = null) {
        parent::$TableName = prefixTable . "news_duan";
        parent::__construct();
        if ($da) {
            if (!is_array($da)) {
                $Id = $da;
                $da = $this->GetById($Id);
            }
            if ($da) {
                $this->Id = isset($da["Id"]) ? $da["Id"] : null;
                $this->Name = isset($da["Name"]) ? $da["Name"] : null;
                $this->Title = isset($da["Title"]) ? $da["Title"] : null;
                $this->Alias = isset($da["Alias"]) ? $da["Alias"] : null;
                $this->Images= isset($da["Images"]) ? $da["Images"] : null;
                $this->Des = isset($da["Des"]) ? $da["Des"] : null;
                $this->Keyword = isset($da["Keyword"]) ? $da["Keyword"] : null;
                $this->Sumary = isset($da["Sumary"]) ? $da["Sumary"] : null;
                $this->Content = isset($da["Content"]) ? $da["Content"] : null;
                $this->Tinh = isset($da["Tinh"]) ? $da["Tinh"] : null;
                $this->Huyen = isset($da["Huyen"]) ? $da["Huyen"] : null;
                $this->Xa = isset($da["Xa"]) ? $da["Xa"] : null;
                $this->DiaChi = isset($da["DiaChi"]) ? $da["DiaChi"] : null;
            }
        }
    }

    //put your code here
    public function Delete($Id) {
        return $this->DeleteById($Id);
    }

    public function GetById($Id) {
        return $this->SelectById($Id);
    }

    public function GetItems($params, $indexPage, $pageNumber, &$total) {
        $name = isset($params["keyword"]) ? $params["keyword"] : '';
        $where = "`Name` like '%{$name}%'";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function Post($model) {

        return $this->Insert($model);
    }

    public function Put($model) {
        return $this->UpdateRow($model);
    }

    public static function ToSelect() {
        return $this->SelectToOptions("1=1", ["Id", "Name"]);
    }

    public static function btnPost() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Module\baiviet\Controller\duan::class . "_post"]) == false) {
            return;
        }
        ?> 
        <a href="/baiviet/duan/post/" class="btn btn-success" > Thêm Mới </a>
        <?php
    }

    public function Content() {
        return htmlspecialchars_decode($this->Content);
    }

    public function Sumary() {
        return htmlspecialchars_decode($this->Sumary);
        
    }

}
