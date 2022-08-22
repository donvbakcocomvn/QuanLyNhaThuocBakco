<?php

namespace Module\baocao\Controller;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author MSI
 */
use Module\baocao\Model\FormBaoCao;

class index extends \Application {

    public function __construct() {
        new \Controller\backend();
    }

    function index() {
        $this->View();
    }

    function day() {
        $baoCao = new \Module\baocao\Model\BaoCaoService();
        $userId = \Model\User::CurentUser()->Id;
        if (\Model\Request::Post(FormBaoCao::$FormName, null)) {
            $itemPost = \Model\Request::Post(FormBaoCao::$FormName, null);

            $ngay = date(\Model\Common::DateFomatDatabase(), time());
            $itemData = $baoCao->GetBaoCaoUserNgay($userId, $ngay);
            if ($itemData) {
                $itemData["Content"] = \Model\Common::TextInput($itemPost["Content"]);
                $itemData["UpdateDate"] = \Model\Common::DateTime();
                $baoCao->Put($itemData);
            } else {
                $itemData["Id"] = \Model\Common::uuid();
                $itemData["Name"] = "Báo Cáo: Ngày {$ngay} ";
                $itemData["DateReport"] = $ngay;
                $itemData["IdUser"] = $userId;
                $itemData["Content"] = \Model\Common::TextInput($itemPost["Content"]);
                $itemData["CreateDate"] = \Model\Common::DateTime();
                $itemData["UpdateDate"] = \Model\Common::DateTime();
                $itemData["Type"] = \Module\baocao\Model\BaoCaoService::TypeDay;
                $baoCao->Post($itemData);
            }
        }
        $ngay = date(\Model\Common::DateFomatDatabase(), time());
        $baoCao = new \Module\baocao\Model\BaoCaoService();
        $Item = $baoCao->GetBaoCaoUserNgay($userId, $ngay);
        $data["Item"] = $Item;

        $this->View($data);
    }

    function month() {
        $this->View();
    }

    function year() {
        $this->View();
    }

}
