<?php

namespace Module\baiviet\Model\Pages;

class PagesService extends \Model\DB implements \Model\IModelService, \Model\IModelToOptions {

    public $Id, $Name, $Images, $Content, $Des, $Keyword, $Title, $Alias;

    //put your code here
    public function __construct($pages = null) {
        parent::$TableName = prefixTable . "pages";
        parent::__construct();
        if ($pages) {
            if (!is_array($pages)) {
                $Id = $pages;
                $pages = $this->GetById($Id);
            }
            $this->Id = isset($pages["Id"]) ? $pages["Id"] : null;
            $this->Name = isset($pages["Name"]) ? $pages["Name"] : null;
            $this->Images = isset($pages["Images"]) ? $pages["Images"] : null;
            $this->Content = isset($pages["Content"]) ? $pages["Content"] : null;
            $this->Des = isset($pages["Des"]) ? $pages["Des"] : null;
            $this->Keyword = isset($pages["Keyword"]) ? $pages["Keyword"] : null;
            $this->Title = isset($pages["Title"]) ? $pages["Title"] : null;
            $this->Alias = isset($pages["Alias"]) ? $pages["Alias"] : null;
        }
    }

    public function Delete($Id) {
        
    }

    public function GetById($Id) {
        return $this->SelectById($Id);
    }

    public function GetItems($param, $indexPage, $pageNumber, &$total) {
        $where = "`name` like '%{$param["keyword"]}%' ";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function Post($model) {
        return $this->Insert($model);
    }

    public function Put($model) {
        return $this->UpdateRow($model);
    }

    public static function ToSelect() {
        
    }

    public static function btnPost() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Module\baiviet\Controller\pages::class . "_post"]) == false) {
            return;
        }
        ?> 
        <a href="/baiviet/pages/post" class="btn btn-success" >Thêm Mới</a>
        <?php
    }

    public function btnPut() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Module\baiviet\Controller\pages::class . "_put"]) == false) {
            return;
        }
        ?> 
        <a href="/baiviet/pages/put/<?php echo $this->Id ?>" class="btn btn-primary" >Sửa</a>
        <?php
    }

    public function btnDelete() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Module\baiviet\Controller\pages::class . "_delete"]) == false) {
            return;
        }
        ?> 
        <a href="/baiviet/pages/movetotrash/<?php echo $this->Id ?>" class="btn btn-danger" >Xóa</a>
        <?php
    }

    public function Content() {
        return htmlspecialchars_decode($this->Content);
    }

    public function GetByAlias($alias) {
        $where = "`Alias` = '{$alias}'";
        return $this->SelectRow($where);
    }

}
