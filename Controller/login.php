<?php

namespace Controller;

use Model\Common;
use Model\User;
use Model\UserService;
use Model\Error;
use Exception;

class login extends \Application
{

    public function __construct()
    {

        self::$_Theme = "backend";
        self::$_Layout = "login";
        $_SESSION[QuanLy] = isset($_SESSION[QuanLy]) ? $_SESSION[QuanLy] : null;
        if ($_SESSION[QuanLy] != null) {
            \Model\Common::ToUrl("/index.php?controller=backend");
        }
    }

    function index()
    {
        try {
            if (isset($_POST["TaiKhoan"]) && isset($_POST["MatKhau"])) {
                $matKhau = \Model\Common::TextInput($_POST["MatKhau"]);
                $taiKhoan = \Model\Common::TextInput($_POST["TaiKhoan"]);
                if ($matKhau == "") {
                    throw new \Exception("Mật khẩu không hợp lệ.");
                }
                if ($taiKhoan == "") {
                    throw new \Exception("Tài Khoản không hợp lệ.");
                }

                $ghiNho = isset($_POST["GhiNhoMatKhau"]) ? $_POST["GhiNhoMatKhau"] : null;
                /**
                 * ghi nho mật khẩu
                 * @param {type} parameter
                 */
                $userService = new \Model\UserService();
                $user = $userService->GetUserByUsernamPassword($taiKhoan, $matKhau);
                //            var_dump($user);
                /**
                 * dang nhap khong thanh cong
                 * @param {type} parameter
                 */
                if ($user == null) {
                    throw new \Exception("Tài Khoản hoặc mật khẩu không đúng.");
                }
                unset($user["Password"]);
                $u = $user;
                $u["key"] = sha1($_SERVER["HTTP_USER_AGENT"]);
                $userInfo = json_encode($u);
                $token = base64_encode($userInfo);
                setcookie("Token", $token, time() + 3600 * 20 * 30, "/");
                //                die();
                $_SESSION[QuanLy] = $user;
                if ($ghiNho) {
                    setcookie("GhiNhoMatKhau", "1", time() + 3600 * 20 * 30, "/");
                    setcookie("TaiKhoan", $_SESSION[QuanLy]["Username"], time() + 3600 * 20 * 30, "/");
                } else {
                    unset($_COOKIE['GhiNhoMatKhau']);
                    setcookie("GhiNhoMatKhau", null, -1, "/");
                    unset($_COOKIE['TaiKhoan']);
                    setcookie("TaiKhoan", null, -1, "/");
                }

                \Model\Common::ToUrl("/index.php?controller=backend");
            }
        } catch (\Exception $exc) {
            //            echo $exc->getMessage();
            /**
             * đăng nhập khong thanh công
             * @param {type} parameter
             */
            unset($_COOKIE['Token']);
            setcookie("Token", null, -1, "/");
            new \Model\Error(\Model\Error::danger, $exc->getMessage());
        }

        /**
         * đã từng dăng nhap
         * @param {type} parameter
         */
        if (isset($_COOKIE['Token'])) {
            $token = $_COOKIE['Token'];
            $tokenDecode = base64_decode($token);
            $key = sha1($_SERVER["HTTP_USER_AGENT"]);
            //            var_dump($key);
            //            var_dump($tokenDecode); 
            $user = json_decode($tokenDecode, JSON_OBJECT_AS_ARRAY);
            //            var_dump($user);
            if ($key == $user["key"]) {
                $_SESSION[QuanLy] = $user;
                \Model\Common::ToUrl("/index.php?controller=backend");
            }
        }
        $this->View();
    }

    /**
     * quyên mật khẩu
     * @param {type} parameter
     */
    function resetpass()
    {
        $user = new UserService();
        if (isset($_POST["mail"])) {
            $mail = Common::TextInput($_POST["mail"]); // Mail người dùng nhập
            $issetMail = $user->GetByEmail($mail);
            $itemUser = $user->GetUserByEmail($mail);
            if (empty($mail)) {
                echo "<script>alert('Email Không Được Để Trống');</script>";
            } elseif ($issetMail == false) {
                echo "<script>alert('Email Không Tồn Tại. Vui Lòng Nhập Lại !');</script>";
                // exit();
            } else {
                $code = $user->CreateToken();  // Token ngẫu nhiên
                $user->AddToken($code, $mail);  // Thêm Token vào DB
                $title = "Reset PassWord";
                $content = "Họ và Tên :" . $itemUser["Name"] . "</br>" . "Tài Khoản :" . $itemUser["Username"] . "</br>" . "Mã xác nhận của bạn là: <span style='color:green'>" . $code . "</span>" . "</br>" .
                    "Nhấn <a style='color: violet;' href='http://nhathuoc.bakco.com.vn/index.php?controller=login&action=verification'>vào đây</a> để đặt lại mật khẩu mới !!!" . "</br>" . "Email này được gửi từ một biểu mẫu liên hệ trên <a style='color: violet;' href='http://nhathuoc.bakco.com.vn/index.php?controller=login&action=index'>nhathuoc.bakco.com.vn</a>";
                \Model\Mail::SendMail($title, $content, $mail);
            }
        }
        $this->PartialView();
    }

    function verification()
    {
        try {
            if (isset($_POST["change"]) == true) {
                $user = new UserService();       //Khởi tạo Duser
                $email = $_POST["email"];
                $token = $_POST["code"];
                $newpass = $_POST["newpass"];
                $repass = $_POST["repass"];
                $item = $user->GetByEmailAndToken($email, $token);    //Lấy User từ Mail Và Code người dùng nhập

                if ($newpass !== $repass) {
                    echo "<script>alert('Mật Khẩu Không Khớp');</script>";
                } elseif ($item == NULL) {
                    echo "<script>alert('Vui Lòng Kiểm Tra Lại Email Hoặc Token');</script>";
                } else {
                    $keyPass = $item["KeyPassword"];        // Lấy ra KeyPass trong Admin
                    $userName = $item["Username"];        // Lấy ra UserName trong Admin
                    $pass = $user->CreatePassword($newpass, $keyPass);   //Mã Hóa Mật Khẩu
                    $user->UpdatePass($pass, $userName);  // Update Mật Khẩu Mới
                    echo "<script>alert('Đổi Mật Khẩu Thành Công!');</script>";
                }
                Common::ToUrl("/index.php?controller=login&action=index");

            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            new Error(Error::danger, $ex->getMessage());
        }

        $this->PartialView();
    }
}
