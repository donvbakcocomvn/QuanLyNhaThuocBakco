<?php

namespace Module\baiviet\Controller;

use Module\baiviet\Model\Pages\PagesService;
use Module\baiviet\Model\Pages\FormPages;

class pages extends \Application implements \Controller\IControllerBE, \Controller\IControllerMoveToTrash {

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
        $pages = new PagesService();
        $param["keyword"] = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';
        $indexPage = isset($_REQUEST["indexPage"]) ? $_REQUEST["indexPage"] : 1;
        $pageNumber = isset($_REQUEST["pageNumber"]) ? $_REQUEST["pageNumber"] : 10;
        $total = 0;
        $items = $pages->GetItems($param, $indexPage, $pageNumber, $total);
        $data["params"] = $param;
        $data["items"] = $items;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["total"] = $total;
        $this->View($data);
    }

    public function post() {
        $pagesService = new PagesService();
        if (\Model\Request::Post(FormPages::$FormName, [])) {
            // data từ form
            $itemPost = \Model\Request::Post(FormPages::$FormName, []);
            // lấy data từ database
            $itemPost["Id"] = \Model\Common::uuid();
            $itemPost["Alias"] = \Model\Common::BoDauTienViet($itemPut["Name"]);
            $pagesService->Post($itemPost);
            \Model\Common::ToUrl("/baiviet/pages/put/" . $itemPost["Id"]);
        }

        $this->View();
    }

    public function put() {
        $pagesService = new PagesService();
        if (\Model\Request::Post(FormPages::$FormName, [])) {
            // data từ form
            $itemPut = \Model\Request::Post(FormPages::$FormName, []);
            // lấy data từ database
            $model = $pagesService->GetById($itemPut["Id"]);
            if ($model) {
                foreach ($model as $key => $value) {
                    $model[$key] = $itemPut[$key];
                }
                $model["Alias"] = \Model\Common::BoDauTienViet($itemPut["Name"]);
                $pagesService->Put($model);
            }
        }


        $this->View(["Item" => $this->getParams(0)]);
    }

    public function movetotrash() {
        
    }

}
