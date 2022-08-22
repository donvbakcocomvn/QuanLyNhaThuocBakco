<?php

namespace Module\giaodien\Controller;

use Module\giaodien\Model\Slide\FormSlider;
use Module\giaodien\Model\Slide\SliderService;

class slider extends \Application implements \Controller\IControllerBE {

    public function __construct() {
        new \Controller\backend();
        self::$_Theme = "backend";
    }

    public function index() {

        $slide = new SliderService();
        $params[] = "";
        $indexPage = isset($_REQUEST["indexPage"]) ? intval($_REQUEST["indexPage"]) : 1;
        $pageNumber = isset($_REQUEST["pageNumber"]) ? intval($_REQUEST["pageNumber"]) : 10;
        $total = 0;
        $items = $slide->GetItems($params, $indexPage, $pageNumber, $total);

        $data["Items"] = $items;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["total"] = $total;
        $data["params"] = $params;
        $this->View($data);
    }

    public function delete() {
        
    }

    public function post() {
        $modelSlide = new SliderService();
        if (\Model\Request::Post(FormSlider::$FormName, [])) {
            $itemPost = \Model\Request::Post(FormSlider::$FormName, []);
            $itemPost["Id"] = \Model\Common::uuid(); 
            $modelSlide->Post($itemPost);
            \Model\Common::ToUrl("/giaodien/slider/put/".$itemPost["Id"]);
        }
        $this->View();
    }

    public function put() {
        $modelSlide = new SliderService();
        if (\Model\Request::Post(FormSlider::$FormName, [])) {
            $itemPost = \Model\Request::Post(FormSlider::$FormName, []);
            $Id = $itemPost["Id"];
            $itemDB = $modelSlide->GetById($Id);
            foreach ($itemDB as $key => $value) {
                $itemDB[$key] = \Model\Common::TextInput($itemPost[$key]);
            }
            $modelSlide->Put($itemDB);
        }


        $this->View(["Item" => $this->getParams(0)]);
    }

}
