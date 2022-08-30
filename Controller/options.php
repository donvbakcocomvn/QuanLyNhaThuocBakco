<?php

namespace Controller;


class options extends \Application implements IControllerBE {

    public function __construct() {
        new backend();
    }

    public function delete() {
        try {
            $Id = \Model\Request::Get("id", null);
            if ($Id) {
                $option = new \Model\OptionsService();
                $option->Delete($Id);
                new \Model\Error(\Model\Error::success, "Đã Xóa Danh Mục");
            }
        } catch (\Exception $ex) {
            new \Model\Error(\Model\Error::danger, $ex->getMessage());
        }
        \Model\Common::ToUrl("/options/donvitinh");

    }

    public function congty() {
        $options = new \Model\OptionsService();
        $params["keyword"] = isset($_GET["keyword"]) ? \Model\Common::TextInput($_GET["keyword"]) : "";
        $params["GroupsId"] = "congty";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $items = $options->GetItems($params, $indexPage, $pageNumber, $total);
        $data["Items"] = $items;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;

        $this->View($data);
    }

    public function timkiemtheoboloc() {
        $options = new \Model\OptionsService();
        $params["keyword"] = isset($_GET["keyword"]) ? \Model\Common::TextInput($_GET["keyword"]) : "";
        $params["GroupsId"] = "timkiemtheoboloc";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $items = $options->GetItems($params, $indexPage, $pageNumber, $total);
        $data["Items"] = $items;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;

        $this->View($data);
    }

    public function hopdong() {
        $options = new \Model\OptionsService();
        $params["keyword"] = isset($_GET["keyword"]) ? \Model\Common::TextInput($_GET["keyword"]) : "";
        $params["GroupsId"] = "hopdong";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $items = $options->GetItems($params, $indexPage, $pageNumber, $total);
        $data["Items"] = $items;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;

        $this->View($data);
    }

    public function donvitinh() {
        $options = new \Model\OptionsService();
        $params["keyword"] = isset($_GET["keyword"]) ? \Model\Common::TextInput($_GET["keyword"]) : "";
        $params["GroupsId"] = "donvitinh";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $items = $options->GetItems($params, $indexPage, $pageNumber, $total);
        $data["Items"] = $items;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;

        $this->View($data);
    }

    public function donviquydoi() {
        $options = new \Model\OptionsService();
        $params["keyword"] = isset($_GET["keyword"]) ? \Model\Common::TextInput($_GET["keyword"]) : "";
        $params["GroupsId"] = "donviquydoi";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $items = $options->GetItems($params, $indexPage, $pageNumber, $total);
        $data["Items"] = $items;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;

        $this->View($data);
    }

    public function tinhtrang() {
        $options = new \Model\OptionsService();
        $params["keyword"] = isset($_GET["keyword"]) ? \Model\Common::TextInput($_GET["keyword"]) : "";
        $params["GroupsId"] = __FUNCTION__;
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $items = $options->GetItems($params, $indexPage, $pageNumber, $total);
        $data["Items"] = $items;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;

        $this->View($data);
    }

    public function chucvu() {
        $options = new \Model\OptionsService();
        $params["keyword"] = isset($_GET["keyword"]) ? \Model\Common::TextInput($_GET["keyword"]) : "";
        $params["GroupsId"] = __FUNCTION__;
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $items = $options->GetItems($params, $indexPage, $pageNumber, $total);
        $data["Items"] = $items;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;
        $data["Title"] = "Chức Vụ";

        $this->View($data);
    }

    public function hinhthuchd() {
        $options = new \Model\OptionsService();
        $params["keyword"] = isset($_GET["keyword"]) ? \Model\Common::TextInput($_GET["keyword"]) : "";
        $params["GroupsId"] = __FUNCTION__;
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $items = $options->GetItems($params, $indexPage, $pageNumber, $total);
        $data["Items"] = $items;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;

        $this->View($data);
    }

    public function gioitinh() {
        $options = new \Model\OptionsService();
        $params["keyword"] = isset($_GET["keyword"]) ? \Model\Common::TextInput($_GET["keyword"]) : "";
        $params["GroupsId"] = "gioitinh";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $items = $options->GetItems($params, $indexPage, $pageNumber, $total);
        $data["Items"] = $items;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;

        $this->View($data);
    }

    public function index() {

        if (\Model\Request::Post('op', [])) {
            try {
                $opPost = \Model\Request::Post('op', []);
                $options = new \Model\OptionsService();
                $opPost["IsPublic"] = 1;
                $options->Post($opPost);
            } catch (\Exception $ex) {
                new \Model\Error("danger", "Không Thể Thêm. Mã  Này");
            }
        }

        $options = new \Model\OptionsService();
        $params["keyword"] = isset($_GET["keyword"]) ? \Model\Common::TextInput($_GET["keyword"]) : "";
        $params["GroupsId"] = $this->getParams(0);
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $items = $options->GetItems($params, $indexPage, $pageNumber, $total);
        $data["Items"] = $items;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;
        $this->View($data);
    }

    public function post() {
        if (\Model\Request::Post('op', [])) {
            $opPost = \Model\Request::Post('op', []);
            $options = new \Model\OptionsService();
            $options->Post($opPost);
        }
        $this->View();
    }

    public function put() {

        if (\Model\Request::Post('op', [])) {
            $opPost = \Model\Request::Post('op', []);
            $options = new \Model\OptionsService();
            $opPost["Name"] = \Model\Common::TextInput($opPost["Name"]);
            $options->Put($opPost);
        }
        $this->View(["item" => $this->getParams(0)]);
    }

}
