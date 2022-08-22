<?php

namespace Module\congty\Controller;

class index extends \Application implements \Controller\IControllerBE {

    public function __construct() {
        new \Controller\backend();
        self::$_Theme = "backend";
    }

    public function index() {

        \Model\Permission::Check([\Model\User::Admin, "CongTyView"]);
        $modelUsers = new \Model\UserService();
        $params["keyword"] = isset($_GET["keyword"]) ? \Model\Common::TextInput($_GET["keyword"]) : "";
        $params["CongTy"] = isset($_GET["CongTy"]) ? \Model\Common::TextInput($_GET["CongTy"]) : "";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachTaiKhoan = $modelUsers->GetItems($params, $indexPage, $pageNumber, $total);
        $data["Items"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;

        $this->View($data);
    }

    public function delete() {

    }

    public function post() {

        \Model\Permission::Check([\Model\User::Admin, "NhanVienPost"]);
        $modelSlide = new SliderService();
        if (\Model\Request::Post(FormSlider::$FormName, [])) {
            $itemPost = \Model\Request::Post(FormSlider::$FormName, []);
            $itemPost["Id"] = \Model\Common::uuid();
            $modelSlide->Post($itemPost);
            \Model\Common::ToUrl("/giaodien/slider/put/" . $itemPost["Id"]);
        }
        $this->View();
    }

    public function put() {

        \Model\Permission::Check([\Model\User::Admin, "NhanVienSua", "NhanVienPut"]);

        if (\Model\Request::Post(\Model\Users\FormUser::$ElementsName, [])) {
            try {
                $userPut = \Model\Request::Post(\Model\Users\FormUser::$ElementsName, []);
                if ($userPut == null) {
                    throw new \Exception("Không có thông tin sửa");
                }
                $userInfor = \Model\Request::Post(\Model\Users\FormUserInfor::$ElementsName, []);

                if ($userInfor) {
                    foreach ($userInfor as $name => $val) {
                        $userInfor = new \Model\Users\UserInfor();
                        if (!isset($userPut["Id"])) {
                            throw new \Exception("Không có thông tin sửa");
                        }

                        $item = $userInfor->GetItemByUserKey($userPut["Id"], $name);

                        if ($item) {
                            $item["Val"] = $val;
                            $item["UpdateDate"] = \Model\Common::DateTime();
                            $userInfor->Put($item);
                        } else {
                            $item["IdUser"] = $userPut["Id"];
                            $item["Keyword"] = $name;
                            $item["Val"] = $val;
                            $item["CreateDate"] = \Model\Common::DateTime();
                            $item["UpdateDate"] = \Model\Common::DateTime();
                            $item["isDelete"] = 0;
                            $userInfor->Post($item);
                        }
                    }
                }

                /**
                 * thông tin cập nhật từ form
                 * @param {type} parameter
                 */
                $userService = new \Model\UserService();
                $modelUser = $_POST[\Model\Users\FormUser::$ElementsName];
                /**
                 * user trong database
                 * @param {type} parameter
                 */
                $itemDetail = $userService->GetById($userPut["Id"]);

                $itemDetail["Name"] = $modelUser["Name"];
                $itemDetail["BOD"] = \Model\Common::StrToDateDB($modelUser["BOD"]);
                if ($itemDetail["Status"] == 0) {
                    /**
                     * có sửa email
                     * @param {type} parameter
                     */
                    if ($itemDetail["Email"] != $modelUser["Email"]) {
                        if ($userService->GetByEmail($modelUser["Email"])) {
                            throw new \Exception("Email này đã có.");
                        }
                    }
                    $itemDetail["Email"] = $modelUser["Email"];
                }
                $userService->Put($itemDetail);
            } catch (\Exception $exc) {
                new \Model\Error(\Model\Error::danger, $exc->getMessage());
            }
        }

        $this->View(["Item" => $this->getParams(0)]);
    }

}
