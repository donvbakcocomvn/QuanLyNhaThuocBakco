<?php

namespace Module\baiviet\Controller;

class duan extends \Application implements \Controller\IControllerBE, \Controller\IControllerMoveToTrash {

    //put your code here
    public function __construct() {
        /**
         * kiem tra đăng nhap
         * @param {type} parameter
         */
        new \Controller\backend();
        self::$_Theme = "backend";
    }

    public function delete() {
        
    }

    public function index() {

        $duan = new \Module\baiviet\Model\DuAn\DuAn();
        $this->View();
    }

    public function post() {

        if (\Model\Request::Post(\Module\baiviet\Model\DuAn\FormDuAn::$FormName, [])) {
            $itemForm = \Model\Request::Post(\Module\baiviet\Model\DuAn\FormDuAn::$FormName, []);
            $model["Id"] = \Model\Common::uuid();

            $model["Name"] = \Model\Common::TextInput($itemForm['Name']);
            $model["Alias"] = \Model\Common::BoDauTienViet($itemForm['Name']);
            $duan = new \Module\baiviet\Model\DuAn\DuAn();
            $duan->Post($model);
            \Model\Common::ToUrl("/baiviet/duan/put/" . $model["Id"]);
        }

        $this->View();
    }

    public function put() {
        $id = $this->getParams(0);
        $param = "/public/userfiles/" . \Model\User::CurentUser()->Username . "/DuAn/{$id}/";
        
        \Model\PathCkfinder::Set($param);

        if (\Model\Request::Post(\Module\baiviet\Model\DuAn\FormDuAn::$FormName, [])) {
            $duan = new \Module\baiviet\Model\DuAn\DuAn();
            $itemForm = \Model\Request::Post(\Module\baiviet\Model\DuAn\FormDuAn::$FormName, []);
            $Id = $itemForm["Id"];
            $model = $duan->GetById($Id);
            $model["Name"] = \Model\Common::TextInput($itemForm['Name']);
            $model["Alias"] = \Model\Common::BoDauTienViet($itemForm['Name']);
            unset($itemForm['Name']);
            foreach ($itemForm as $k => $value) {
                $model[$k] = \Model\Common::TextInput($value);
            }
            $model["Huyen"] = intval($itemForm['Huyen']);
            $model["Xa"] = intval($itemForm['Xa']);
            $model["Des"] = strip_tags($itemForm['Des']);
            $model["Title"] = strip_tags($itemForm['Title']);
            $model["Keyword"] = strip_tags($itemForm['Keyword']);
            var_dump($model);
            $duan->Put($model);
            \Model\Common::ToUrl("/baiviet/duan/put/" . $model["Id"]);
        }

        $this->View(["Item" => $this->getParams(0)]);
    }

    public function movetotrash() {
        
    }

}
