<?php

namespace Controller;

use Model\Users\FormUser;

class quanlyusers extends \Application implements IControllerBE {

    public function __construct() {
        new backend();
        self::$_Theme = "backend";
        \Model\Permission::Check([\Model\User::Admin, md5(quanlyusers::class . "_view")]);
        //336bdbdba15a2836969cb534cc56f9df
    }

    function index() {
//        echo md5(quanlyusers::class);
        \Model\Permission::Check([\Model\User::Admin, md5(quanlyusers::class . "_view")]);
        $modelUsers = new \Model\UserService();
        $params["keyword"] = isset($_GET["keyword"]) ? \Model\Common::TextInput($_GET["keyword"]) : "";
        $indexPage = isset($_GET["indexPage"]) ? intval($_GET["indexPage"]) : 1;
        $indexPage = max(1, $indexPage);
        $pageNumber = isset($_GET["pageNumber"]) ? intval($_GET["pageNumber"]) : 10;
        $pageNumber = max(1, $pageNumber);
        $total = 0;
        $DanhSachTaiKhoan = $modelUsers->GetItems($params, $indexPage, $pageNumber, $total);
        $data["DanhSachTaiKhoan"] = $DanhSachTaiKhoan;
        $data["indexPage"] = $indexPage;
        $data["pageNumber"] = $pageNumber;
        $data["params"] = $params;
        $data["total"] = $total;

        $this->View($data);
    }

    public function delete() {
        \Model\Permission::Check([\Model\User::Admin, md5(quanlyusers::class . "_" . __FUNCTION__)]);
    }

    /**
     * them tài khoản
     * @param {type} parameter
     */
    public function post() {
        \Model\Permission::Check([\Model\User::Admin, md5(quanlyusers::class . "_" . __FUNCTION__)]);
        if (isset($_POST[\Model\Users\FormUser::$ElementsName])) {
            try {
                $userservice = new \Model\UserService();

                $userForm = $_POST[\Model\Users\FormUser::$ElementsName];
                $Modeluser["Name"] = \Model\Common::TextInput($userForm["Name"]);
                if ($Modeluser["Name"] == "") {
                    throw new \Exception("Họ & Tên Không Để Trống.");
                }
                $Modeluser["Email"] = \Model\Common::TextInput($userForm["Email"]);
                if ($Modeluser["Email"] == "") {
                    throw new \Exception("Họ & Tên Không Để Trống.");
                }
                if (\Model\Common::IsEmail($Modeluser["Email"]) == false) {
                    throw new \Exception("Email Không Hợp Lệ.");
                }
                if ($userservice->GetByEmail($Modeluser["Email"]) != null) {
                    throw new \Exception("Email Đã Được Sử Dụng.");
                }
                /**
                 * kiem tra username
                 * @param {type} parameter
                 */
                $Modeluser["Username"] = \Model\Common::TextInput($userForm["Username"]);
                if ($Modeluser["Username"] == "") {
                    throw new \Exception("Tài Khoản Không Để Trống.");
                }
                if ($userservice->GetByUsername($Modeluser["Username"]) != null) {
                    throw new \Exception("Tài Khoản Đã Được Sử Dụng.");
                }


                $Modeluser["Active"] = intval($userForm["Active"]);
                $Modeluser["Password"] = $userForm["CreatePassword"];
                $Modeluser["Id"] = \Model\Common::uuid();
                $Modeluser["KeyPassword"] = \Model\Common::uuid();
                $Modeluser["BOD"] = date(\Model\Common::DateFomatDatabase(), time());
                $Modeluser["Status"] = 0;
                $Modeluser["DateCreate"] = date(\Model\Common::DateFomatDatabase(), time());
                $Modeluser["TokenReset"] = "";
                $Modeluser["Password"] = \Model\UserService::CreatePassword($Modeluser["Password"], $Modeluser["KeyPassword"]);

                $userservice->Post($Modeluser);
                /**
                 * tạo tài khoản thành công
                 * @param {type} parameter
                 */
                \Model\Common::ToUrl("/index.php?controller=quanlyusers&action=put&id=" . $Modeluser["Id"]);
            } catch (\Exception $exc) {
                new \Model\Error(\Model\Error::danger, $exc->getMessage());
            }
        }

        $this->View();
    }

    /**
     * sửa tài khoản
     * @param {type} parameter
     */
    public function put() {

        \Model\Permission::Check([\Model\User::Admin, md5(quanlyusers::class . "_" . __FUNCTION__)]);
        $userService = new \Model\UserService();
        if (isset($_POST[FormUser::$ElementsName])) {
            try {
                /**
                 * thông tin cập nhật từ form
                 * @param {type} parameter
                 */
                $modelUser = $_POST[FormUser::$ElementsName];
                /**
                 * user trong database
                 * @param {type} parameter
                 */
                $itemDetail = $userService->GetById($modelUser["Id"]);
                $itemDetail["Name"] = $modelUser["Name"];
                $itemDetail["Active"] = $modelUser["Active"];
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
//            var_dump($itemDetail);
//
//            exit(); 
            } catch (\Exception $exc) {
                new \Model\Error(\Model\Error::danger, $exc->getMessage());
            }
        }


        $id = \Model\Common::TextInput($_GET["id"]);
        $user = $userService->GetById($id);
        $this->View(["user" => $user]);
    }

    public function resetpassword() {
//        b1: cập nhật mật khẩu
//        

        \Model\Permission::Check([\Model\User::Admin, md5(quanlyusers::class . "_put")]);
        $userService = new \Model\UserService();
        if (isset($_POST[FormUser::$ElementsName])) {
            $itemPost = $_POST[FormUser::$ElementsName];
            $id = $itemPost["Id"];
            $itemDetail = $userService->GetById($id);
            if ($itemDetail) {
                $keypassword = $itemDetail["KeyPassword"];
                $itemDetail["Password"] = \Model\UserService::CreatePassword($itemPost['CreatePassword'], $keypassword);
                $userService->Put($itemDetail);
            }
        }
//        
//        b2 gửi mail
//         b3: quay lại trang sửa
        \Model\Error::SetError(\Model\Error::success, "Cập nhật mật khẩu thành công");
        \Model\Common::ToUrl($_SERVER["HTTP_REFERER"]);
    }

    /**
     * phân quyền cho user
     * @param {type} parameter
     */
    public function phanquyen() {
        \Model\Permission::Check([\Model\User::Admin, md5(quanlyusers::class . "_put")]);
        if (isset($_POST["Users"])) {
            $danhSachRoles = $_POST["Rolesuser"];
            $idUser = $_POST["Users"]["Id"];
            $UserRoles = new \Model\UserRole();
            $UserRoles->UpdateByUserId($idUser, $danhSachRoles);
        }
        \Model\Common::ToUrl($_SERVER["HTTP_REFERER"]);
    }

    function showkey() {
        $data = \Model\User::danhSachQuyen();
        $this->View($data);
    }

    function install() {
        \Model\User::Install();
        \Model\Common::ToUrl("/index.php?controller=quanlyusers");
    }

}
