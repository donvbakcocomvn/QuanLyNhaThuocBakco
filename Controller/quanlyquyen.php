<?php

namespace Controller;

class quanlyquyen extends \Application implements IControllerBE {

    public function __construct() {
        new backend();
        self::$_Theme = "backend";
        \Model\Permission::Check([\Model\User::Admin, md5(quanlyquyen::class . "_view")]);
    }

    function index() {

        $roles = new \Model\Role();
        $params["keyword"] = isset($_GET["keyword"]) ? $_GET["keyword"] : "";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachRole = $roles->GetItems($params, $indexPage, $pageNumber, $total);
        $data["DanhSachRole"] = $DanhSachRole;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;
        $this->View($data);
    }

    public function delete() {
        \Model\Permission::Check([\Model\User::Admin, md5(quanlyquyen::class . "_" . __FUNCTION__)]);
        // chặn và kiểm tra quyền
        try {
            $Id = \Model\Common::TextInput($_GET["id"]);

            $role = new \Model\Role();
            if ($role->Delete($Id) == null) {
                throw new \Exception("Role này không thể xóa");
            }
            new \Model\Error(\Model\Error::success, "Xóa thành công");
        } catch (\Exception $exc) {
            new \Model\Error(\Model\Error::danger, "Xóa không thành công");
        }

        \Model\Common::ToUrl("/index.php?controller=quanlyquyen");
    }

    public function post() {
        \Model\Permission::Check([\Model\User::Admin, md5(quanlyquyen::class . "_" . __FUNCTION__)]);

        $role = new \Model\Role();

        if (isset($_POST["Id"])) {
            try {

                $_role["Id"] = \Model\Common::TextInput($_POST["Id"]);
                if ($_role["Id"] == "") {
                    throw new \Exception("Mã Không Để Trống");
                }
                $_role["Name"] = \Model\Common::TextInput($_POST["Name"]);
                if ($_role["Name"] == "") {
                    throw new \Exception("Tên Không Để Trống");
                }
//                if ($_role["Id"] != "") {
//                    if ($_role["Name"] != "") {
//                        $_role["Des"] = \Model\Common::TextInput($_POST["Des"]);
//                        $role->Post($_role);
//                    } else {
//                        throw new \Exception("Tên Không Để Trống");
//                    }
//                } else {
//                    throw new \Exception("Tên Không Để Trống");
//                } 
                $_role["Des"] = \Model\Common::TextInput($_POST["Des"]);
                $_role["IsNotDelete"] = 0;
                $role->Post($_role);
                new \Model\Error(\Model\Error::success, "Thêm Role Thành Công");
                if (isset($_POST["LuuThoat"])) {
                    \Model\Common::ToUrl("/index.php?controller=quanlyquyen&action=put&id=" . $_role["Id"]);
                }
            } catch (\Exception $ex) {
                new \Model\Error(\Model\Error::danger, $ex->getMessage());
            }
        }

        $this->View();
    }

    public function install() {
        \Model\Role::Install();
        \Model\Common::ToUrl("/index.php?controller=quanlyquyen");
    }

    public function put() {
        \Model\Permission::Check([\Model\User::Admin, md5(quanlyquyen::class . "_" . __FUNCTION__)]);
        $role = new \Model\Role();

        if (isset($_POST["Id"])) {
            $_role["Id"] = \Model\Common::TextInput($_POST["Id"]);
            $_role["Name"] = \Model\Common::TextInput($_POST["Name"]);
            $_role["Des"] = \Model\Common::TextInput($_POST["Des"]);
            $role->Put($_role);
            new \Model\Error(\Model\Error::success, "Thêm Role Thành Công");
            if (isset($_POST["LuuThoat"])) {
                \Model\Common::ToUrl("/index.php?controller=quanlyquyen");
            }
        }

        $Id = \Model\Common::TextInput($_GET["id"]);
        $roleDetail = $role->GetById($Id);

        $this->View(["roleDetail" => $roleDetail]);
    }

}
