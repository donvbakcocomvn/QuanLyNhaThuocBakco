<?php

namespace Module\baonangxuat\Controller;

class index extends \Application {

    //put your code here
    public function __construct() {
        new \Controller\index();
        self::$_Theme = "vietthang";
    }

    function index() {
        if (\Model\Request::Post("baonangxuat", [])) {
            $baoNangXuat = \Model\Request::Post("baonangxuat", []);
            if ($baoNangXuat) {
                $baonangxuatModel = new \Module\baonangxuat\Model\baonangxuat();
                $model = $baoNangXuat;
                $model["Id"] = \Model\Common::uuid();
                $model["Ngay"] = date("Y-m-d H:i:s", strtotime($model["Ngay"]));
                $model["Sang"] = intval($model["Sang"]);
                $model["PO"] = intval($model["PO"]);
                $model["DinhMuc"] = intval($model["DinhMuc"]);
                $model["Chieu"] = intval($model["Chieu"]);
                $model["TongNgay"] = $model["Chieu"] + $model["Sang"];
                $model["TyLe"] = ($model["TongNgay"] / $model["DinhMuc"]) * 100;

                $baonangxuatModel->Post($model);
            }
        }
        $this->View();
    }

}
