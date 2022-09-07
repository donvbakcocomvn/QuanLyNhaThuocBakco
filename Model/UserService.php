<?php

namespace Model;

class UserService extends DB implements IModelService, IModelToOptions {

    public function __construct() {
        self::$TableName = prefixTable . "users";
        parent::__construct();
    }

    // Thêm Token khi gửi Mail ReSet Pass
    function AddToken($code,$DSMaSanPham)
    {
        $model["TokenReset"] = $code;
        $where = "`Email` in ('{$DSMaSanPham}') ";
        $this->Update($model, $where);
    }

    function UpdatePass($pass,$DSMaSanPham)
    {
        $model["Password"] = $pass;
        $where = "`Username` in ('{$DSMaSanPham}') ";
        $this->Update($model, $where);
    }

    // Lấy User bằng Token và Email
    // function GetByEmailAndToken($mail, $token)
    // {
    //     $sql = "SELECT * FROM `lap1_users` WHERE `Email` = '$mail' AND `TokenReset` = '$token'";
    //     $result = $this->GetRow($sql);
    //     return $result;
    // }

    

    public function Delete($Id) {

    }

    public function GetItems($params, $indexPage, $pageNumber, &$total) {
        $keyword = $params["keyword"];
        $where = "1=1";
        if ($keyword) {
            $where = " `Name` like '%$keyword%' or `Username` like '%$keyword%' or `Email` like '%$keyword%' ";
        }
// (`Keyword` ='Phone' AND `Val` like '%7%') or (`Keyword` ='CMND' AND `Val` like '%7%') or (`Keyword` ='CCCD' AND `Val` like '%7%') or (`Keyword` ='GioiTinh' AND `Val` = '1')
//        $sql = "SELECT a.* FROM `" . prefixTable . "users` as a,`" . prefixTable . "users_infor` as b where a.Id = b.IdUser AND b.val like '%{$keyword}%' GROUP BY a.Id "
//                . "AND (a.`Name` like '%{$keyword}%' or a.`Username` like '%{$keyword}%' or a.`Email` like '%{$keyword}%')";
//        $userInfor = new \Model\Users\UserInfor();
//        $dsUserId = $userInfor->GetUserIdByKeywordVal($params);
//        $isUser = [];
//        if ($dsUserId) {
//            foreach ($dsUserId as $key => $value) {
//                $isUser[] = $value["IdUser"];
//            }
//        }
//        $userIdsSql = "";
//        if ($isUser) {
//            $userIdsSql = implode("','", $isUser);
//            $userIdsSql = " and `Id` in ('$userIdsSql') ";
//        }
//        $where = "{$where} $userIdsSql";

        $userService = new \Model\UserService();
        return $userService->SelectPT($where, $indexPage, $pageNumber, $total);
    }

    public function Post($model) {
        return $this->Insert($model);
    }

    public function Put($model) {
        $where = "`Id` = '{$model["Id"]}'";
        return $this->Update($model, $where);
    }

    public function GetUserByUsernamPassword($userName, $password) {
        $where = "`Username` = '{$userName}' and `Password` = SHA1(CONCAT(`KeyPassword`,CONCAT('{$password}',`KeyPassword`)))";
        return $this->SelectRow($where);
    }

    public function GetById($Id) {
        $where = "`Id` = '{$Id}'";
        return $this->SelectRow($where);
    }

    public function CreateToken() {
        // return sha1(time());
        return rand(100000, 999999);
    }

    /**
     * // tạo mật khâu mã hóa
     * @param {type} parameter
     */
    static public function CreatePassword($password, $keypassword) {
        $password = $keypassword . $password . $keypassword;
        return sha1($password);
    }

    public function GetByUsername($username) {
        $where = "`Username` = '{$username}'";
        return $this->SelectRow($where);
    }

    public function GetByEmail($email) {
        $where = "`Email` = '{$email}'";
        $result = $this->SelectRow($where);
        if ($result == NULL) {
            return false;
        }
        return true;
    }

    public function GetUserByEmail($email) {
        $where = "`Email` = '{$email}'";
        $result = $this->SelectRow($where);
        if ($result == NULL) {
            return false;
        }
        return $result;
    }

    public function GetByEmailAndToken($email, $token)
    {
        $where = "`Email` = '{$email}' and `TokenReset` = '{$token}'";
        return $this->SelectRow($where);
    }

    public function SelectPTByUsersId($isUser, $where, $indexPage, $pageNumber, $total) {

        $indexPage = ($indexPage - 1) * $pageNumber;
        $indexPage = max($indexPage, 0);
        $userIdsSql = "";
        if ($isUser) {
            $userIdsSql = implode("','", $isUser);
            $userIdsSql = " or `Id` in ('$userIdsSql') ";
        }
        $where = "{$where} $userIdsSql";
        $total = $this->SelectCount($where);
        $where = "{$where} limit {$indexPage},{$pageNumber}";
        return $this->Select($where);
    }

    public static function ToSelect() {
        $users = new UserService();
        return $users->SelectToOptions("1=1", ["Id", "Name"]);
    }

}
