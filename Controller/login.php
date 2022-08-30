<?php

namespace Controller;

use Model\User;
use Model\UserService;

class login extends \Application {

    public function __construct() {

        self::$_Theme = "backend";
        self::$_Layout = "login";
        $_SESSION[QuanLy] = isset($_SESSION[QuanLy]) ? $_SESSION[QuanLy] : null;
        if ($_SESSION[QuanLy] != null) {
            \Model\Common::ToUrl("/index.php?controller=backend");
        }
    }

    function index() {
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
    function resetpass() {
        // $user = new UserService();
        // $a = $user->GetByEmail("tinguyen@gmail.com");
        // echo $a;
        if (isset($_POST["sendmail"])) {
            $mail = $_POST["mail"];
            $code = rand(100000, 999999);
            if ($mail === '') {
                echo "<script>alert('Không được để trống Email');</script>";
                throw new \Exception("Email Không Được Để Trống!!!");
            }
            $content = "Mã xác nhận của bạn là: <span style='color:green'>" . $code . "</span>" . "</br>".
            "Nhấn <a style='color: violet;' href='/index.php?controller=login&action=verification'>vào đây</a> để đặt lại mật khẩu mới !!!";
            // \Model\Mail::SendMail(["Email" => "lthanhphuc99@gmail.com", "Name" => "Quản Lý Phòng Khám"], "Reset PassWord",$content , "test");
        }
        $this->PartialView();
    }

    function verification()
    {
        $this->PartialView();
    }

}
