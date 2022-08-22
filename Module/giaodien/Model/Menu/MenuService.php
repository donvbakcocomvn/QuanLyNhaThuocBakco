<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuService
 *
 * @author MSI
 */

namespace Module\giaodien\Model\Menu;

class MenuService extends \Model\DB implements \Model\IModelService, \Model\IModelToOptions {

    public $Id, $Name, $Link, $ParentsId, $Icon, $Images, $GroupsId,$STT;

    public function __construct($sl = null) {
        parent::__construct();
        parent::$TableName = prefixTable . "menu";
        if ($sl) {
            if (!is_array($sl)) {
                $Id = $sl;
                $sl = $this->GetById($Id);
            }

            $this->Id = isset($sl["Id"]) ? $sl["Id"] : null;
            $this->Name = isset($sl["Name"]) ? $sl["Name"] : null;
            $this->Link = isset($sl["Link"]) ? $sl["Link"] : null;
            $this->Icon = isset($sl["Icon"]) ? $sl["Icon"] : null;
            $this->Images = isset($sl["Images"]) ? $sl["Images"] : null;
            $this->GroupsId = isset($sl["GroupsId"]) ? $sl["GroupsId"] : null;
            $this->ParensId = isset($sl["ParensId"]) ? $sl["ParensId"] : null;
            $this->STT = isset($sl["STT"]) ? $sl["STT"] : null;
        }
    }

    public function Delete($Id) {
        return $this->DeleteById($id);
    }

    public function GetById($Id) {
        return $this->SelectById($Id);
    }

    public function GetItems($where, $indexPage, $pageNumber, &$total) {
        $where = "`ParentsId` = '' OR `ParentsId`  is null order by `STT`";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function Post($model) {
        return $this->Insert($model);
    }

    public function Put($model) {
        return $this->UpdateRow($model);
    }

    public static function btnPost() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Module\giaodien\Controller\menu::class . "_post"]) == false) {
            return;
        }
        ?> 
        <a class="btn btn-success" href="/giaodien/menu/post/" > Thêm Mới</a>
        <?php
    }

    public function btnPut() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin,
                    \Module\giaodien\Controller\menu::class . "_put"]) == false) {
            return;
        }
        ?> 
        <a class="btn btn-primary" href="/giaodien/menu/put/<?php echo $this->Id; ?>" > Sửa</a>
        <?php
    }

    public function btnDelete() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin,
                    \Module\giaodien\Controller\menu::class . "_delete"]) == false) {
            return;
        }
        ?> 
        <a class="btn btn-danger" title="bạn muốn xóa menu này?" href="/giaodien/menu/delete/<?php echo $this->Id; ?>" > Xóa</a>
        <?php
    }

    public static function ToSelect($parentId = null) {
        $menu = new MenuService();
        $where = "`ParentsId` = '' OR `ParentsId`  is null";
        if ($parentId != null) {
            $where = "`ParentsId` = '{$parentId}'";
        }

        return $menu->SelectToOptions($where, ["Id", "Name"]);
    }

    public function GetItemsByGroupsParent($GroupsId, $ParentsId) {
        $menu = new MenuService();
        $where = "`ParentsId` = '{$ParentsId}' and `GroupsId` = '{$GroupsId}' Order by `STT` ";
        return $menu->Select($where);
    }

}
