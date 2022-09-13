<?php

namespace Controller;

use Model\HuongDan\FormHuongDan;
use Model\Users\FormUser;

class huongdan extends \Application implements IControllerBE
{

    public function __construct()
    {
        new backend();
        self::$_Theme = "backend";
        // \Model\Permission::Check([\Model\User::Admin, md5(quanlyusers::class . "_view")]);
        //336bdbdba15a2836969cb534cc56f9df
    }


    /**
     *
     * @return mixed
     */
    function index()
    {
    }

    /**
     *
     * @return mixed
     */
    function post()
    {
    }

    /**
     *
     * @return mixed
     */
    function put()
    {
        \Model\Permission::Check([\Model\User::Admin, \Model\User::QuanLy]);

        try {
            if (\Model\Request::Post(FormHuongDan::$FormName, null)) {
                $itemHtml = \Model\Request::Post(FormHuongDan::$FormName, null);
                $content = $itemHtml['Content']; // Content trong form
                $id = \Model\Request::Get("link", null); // Get link đường dẫn
                if (file_exists($id) and is_file($id)) {
                    file_put_contents($id,$content, FILE_USE_INCLUDE_PATH);
                    new \Model\Error(\Model\Error::success, "Đã sửa nội dung thành công");
                \Model\Common::ToUrl("/index.php?module=donthuoc&controller=index&action=index");
                }
                exit();
                
            }
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }
        // $id = \Model\Request::Get("id", null);
        // if ($id == null) {
        // }
        // $DM = new ModelBenhNhan();
        // $data["data"] = $DM->GetById($id);
        // $this->View($data);
        $this->View();
    }

    /**
     *
     * @return mixed
     */
    function delete()
    {
    }
}
