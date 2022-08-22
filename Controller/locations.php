<?php

namespace Controller;

/**
 * Description of locations
 *
 * @author MSI
 */
class locations extends \Application implements IControllerBE {

    //put your code here
    public function __construct() {
        new backend();
        self::$_Theme = "backend";
    }

    public function delete() {
        
    }

    public function index() {
        $location = new \Model\Locations();
        $params["keyword"] = isset($_REQUEST["keyword"]) ? $_REQUEST["keyword"] : "";
        $indexPage = isset($_REQUEST["indexPage"]) ? $_REQUEST["indexPage"] : 1;
        $pageNumber = isset($_REQUEST["pageNumber"]) ? $_REQUEST["pageNumber"] : 10;
        $total = 0;
        $items = $location->GetItems($params, $indexPage, $pageNumber, $total);
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;
        $data["Items"] = $items;

        $this->View($data);
    }

    public function post() {
        $this->View();
    }

    public function put() {
        if (\Model\Request::Post(\Model\Locations\FormLocations::$FormName, [])) {
            $modelForm = \Model\Request::Post(\Model\Locations\FormLocations::$FormName, []);
            $id = $modelForm["Id"];
            $location = new \Model\Locations();
            $model = $location->GetById($id);
            $model["Name"] = $modelForm["Name"];
            $model["Note"] = $modelForm["Note"];
            $model["IsPublic"] = $modelForm["IsPublic"];
            $model["ParentsId"] = intval($modelForm["ParentsId"]);
            $location->Put($model);
        }

        $id = $this->getParams(0, 0);
        $this->View(["item" => $id]);
    }

}
