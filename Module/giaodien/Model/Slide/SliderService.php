<?php

namespace Module\giaodien\Model\Slide;

class SliderService extends \Model\DB implements \Model\IModelService {

    public $Id;
    public $Name;
    public $Content;
    public $Images;
    public $GroupsId;
    public $IsPublic;

    public function __construct($sl = null) {
        parent::__construct();
        parent::$TableName = prefixTable . "slider";
        if ($sl) {
            if (!is_array($sl)) {
                $Id = $sl;
                $sl = $this->GetById($Id);
            }

            $this->Id = isset($sl["Id"]) ? $sl["Id"] : null;
            $this->Name = isset($sl["Name"]) ? $sl["Name"] : null;
            $this->Content = isset($sl["Content"]) ? $sl["Content"] : null;
            $this->Images = isset($sl["Images"]) ? $sl["Images"] : null;
            $this->GroupsId = isset($sl["GroupsId"]) ? $sl["GroupsId"] : null;
            $this->IsPublic = isset($sl["IsPublic"]) ? $sl["IsPublic"] : 0;
        }
    }

    //put your code here
    public function Delete($Id) {
        
    }

    public function GetById($Id) {
        return $this->SelectById($Id);
    }

    public function GetItems($params, $indexPage, $pageNumber, &$total) {
        $where = "1=1";
        return $this->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public static function GetItemsByGroups($groups) {
        $where = "`GroupsId`='{$groups}'";
        $s = new SliderService();
        return $s->Select($where);
    }
    
    public function Post($model) {
       return $this->Insert($model);
    }

    public function Put($model) {
       return $this->UpdateRow($model);
    }

    public static function btnPost() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin, \Module\giaodien\Controller\slider::class . "_post"]) == false) {
            return;
        }
        ?> 
        <a class="btn btn-success" href="/giaodien/slider/post/" > Thêm Mới</a>
        <?php
    }

    public function btnPut() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin,
                    \Module\giaodien\Controller\slider::class . "_put"]) == false) {
            return;
        }
        ?> 
        <a class="btn btn-primary" href="/giaodien/slider/put/<?php echo $this->Id; ?>" > Sửa</a>
        <?php
    }

    public function btnDelete() {
        if (\Model\Permission::CheckPremision([\Model\User::Admin,
                    \Module\giaodien\Controller\slider::class . "_delete"]) == false) {
            return;
        }
        ?> 
        <a class="btn btn-danger" title="bạn muốn xóa banner này?" href="/giaodien/slider/delete/<?php echo $this->Id; ?>" > Xóa</a>
        <?php
    }

    public function Content() {
        return htmlspecialchars_decode($this->Content);
    }

}
