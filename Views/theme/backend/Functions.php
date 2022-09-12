<?php

namespace Views\theme\backend;

use Model\User;
use Module\khachhang\Permission as KhachhangPermission;
use Module\quanlysanpham\Model\btnHtml;
use Module\quanlythuoc\Permission;
use Module\toathuoc\Permission as ToathuocPermission;

class Functions
{

    function __construct()
    {
    }

    public static function head()
    {

        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $hotlint_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . "/";
?>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="canonical" href="<?php echo $actual_link; ?>">
        <link rel="alternate" hreflang="vi" href="<?php echo $actual_link; ?>">
        <meta http-equiv="x-dns-prefetch-control" content="on" />
        <meta name="Resource-type" content="Document" />
        <meta name="theme-color" content="#000" />
        <link rel="dns-prefetch" href="//cdnjs.cloudflare.com" />
        <link rel="dns-prefetch" href="//ajax.googleapis.com" />
        <link rel="dns-prefetch" href="//www.facebook.com" />
        <link rel="dns-prefetch" href="//fonts.googleapis.com" />
        <title>Bakco | Quản Lý Phòng Khám</title>
        <link rel=icon href=https://www.bakco.com.vn/wp-content/uploads/2017/10/cropped-bakco_favicon-1-32x32.png sizes=32x32>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="/public/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link href="/public/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="/public/dist/css/AdminLTE.min.css">

        <link rel="stylesheet" href="/public/dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="/public/plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="/public/plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="/public/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="/public/plugins/datepicker/datepicker3.css">
        <link rel="manifest" href="/public/manifest.json?v=<?php echo filemtime('public/manifest.json') ?>">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="/public/plugins/daterangepicker/daterangepicker-bs3.css">
        <link rel="stylesheet" href="/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <link href="/public/App.css?v=<?php echo filemtime("public/App.css"); ?>" rel="stylesheet" type="text/css" />


        <meta property="og:image" content="/public/Logo_full.png">
        <meta property="og:locale" content="vi_VN" />
        <meta property="og:url" content="<?php echo $actual_link; ?>">
        <meta property="og:type" content="website">
        <meta property="og:title" content="">
        <meta property="og:description" content="">
        <link rel="shortcut icon" href="/public/Logo_full.png">
        <link rel="apple-touch-icon" href="/public/Logo_full.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/public/Logo_full.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/public/Logo_full.png">

        <script src="/public/Ang1/angular.min.js" type="text/javascript"></script>
        <script src="/public/Ang1/angular-sanitize.min.js" type="text/javascript"></script>
        <script src="/public/Ang1/angular-route.min.js" type="text/javascript"></script>
        <script src="/public/plugins/jQuery/jQuery-2.1.4.min.js"></script>


        <script src="/public/Ang1/App.js?v=<?php echo filemtime("public/Ang1/App.js"); ?>" type="text/javascript"></script>
    <?php
    }

    public static function js()
    {
    ?>
        <!-- jQuery 2.1.4 -->

        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script src="/public/plugins/select2/select2.full.js" type="text/javascript"></script>

        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.5 -->
        <script src="/public/bootstrap/js/bootstrap.min.js"></script>
        <!-- Morris.js charts -->

        <!-- Sparkline -->
        <script src="/public/plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="/public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="/public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="/public/plugins/knob/jquery.knob.js"></script>
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="/public/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="/public/plugins/datepicker/bootstrap-datepicker.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="/public/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="/public/ckfinder/ckfinder.js" type="text/javascript"></script>
        <script src="/public/ckeditor/ckeditor.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src="/public/plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="/public/dist/js/app.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="/public/App.js?v=<?php echo filemtime("public/App.js"); ?>" type="text/javascript"></script>
        <script src="/public/dist/js/pages/dashboard.js?v=1"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="/public/dist/js/demo.js"></script>



    <?php
    }

    public static function aside()
    {
    ?>

        <div class="control-sidebar-bg"></div>
    <?php
    }

    public static function header()
    {
        $user = \Model\User::CurentUser();
    ?>
        <header class=" main-header">
            <!-- Logo -->
            <a href="/backend/" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>PK</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg" style="font-weight:500 ; font-size: 16px;">QUẢN LÝ PHÒNG KHÁM</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav ">

                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color: #193a9dd1; color: #fff;">
                                <img onerror="this.src='/public/no-user.jpg'" src="<?php echo $user->UserInfor(\Model\Users\UserInfor::HinhNhanVien)->Val; ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $user->Name; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">

                                    <img onerror="this.src='/public/no-user.jpg'" src="<?php echo $user->UserInfor(\Model\Users\UserInfor::HinhNhanVien)->Val; ?>" class="img-circle" alt="User Image">

                                    <p>
                                        <?php echo $user->Name; ?> - <?php echo $user->Username; ?>
                                        <small><?php echo $user->BODView(); ?></small>
                                    </p>
                                </li>
                                <li class="user-footer" style="background-color: #a3a1a19e;">
                                    <div class="pull-left">
                                        <a href="/profile" class="btn btn-primary btn-flat">Tài Khoản</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="/backend/logout" class="btn btn-primary btn-flat">Thoát</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li class="hidden">
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    <?php
    }

    public static function leftaside()
    {
        $user = User::CurentUser();
    ?>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class=" main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img onerror="this.src='/public/no-user.jpg'" src="<?php echo $user->UserInfor(\Model\Users\UserInfor::HinhNhanVien)->Val; ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $user->Name ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu">
                    <li class="<?php echo \Application::$_Controller == "dashboard" ? 'active' : '' ?> treeview">
                        <a href="/backend/">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="<?php echo \Application::$_Controller == "dashboard" ? 'active' : '' ?> treeview">
                        <a href="/profile/">
                            <i class="fa fa-info"></i> <span>Thông Tin</span>
                        </a>
                    </li>
                    <?php

                    ?>

                    <?php
                    // ----------------------------
                    if (\Model\Permission::CheckPremision([Permission::QLT_Thuoc_DS, Permission::QLT_DanhMuc_DS, User::Admin], []) == true) {
                    ?>
                        <li class="treeview <?php echo \Application::$_Module == "quanlythuoc" ? 'active' : '' ?>">
                            <a href="#">
                                <i class="fa fa-medkit"></i>
                                <span>Quản lý thuốc</span>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                if (\Model\Permission::CheckPremision([User::Admin, Permission::QLT_Thuoc_Post], []) == true) {
                                ?>
                                    <li><a href="/quanlythuoc/sanpham/"><i class="fa fa-circle-o"></i>
                                            Thuốc
                                        </a></li>
                                <?php  } ?>
                                <?php
                                if (\Model\Permission::CheckPremision([User::Admin, Permission::QLT_Thuoc_Post], []) == true) {
                                ?>
                                    <li><a href="/quanlythuoc/danhmuc/"><i class="fa fa-circle-o"></i>
                                            Danh Mục Thuốc
                                        </a>
                                    </li>
                                <?php  } ?>

                                <?php
                                if (\Model\Permission::CheckPremision([User::Admin, Permission::QLT_Thuoc_Post], []) == true) {
                                ?>
                                    <li><a href="/quanlythuoc/phieuxuatnhap/"><i class="fa fa-circle-o"></i>
                                            Xuất/Nhập Thuốc
                                        </a></li>
                                <?php  } ?>
                            </ul>
                        </li>
                    <?php
                    }

                    // ----------------------------
                    if (\Model\Permission::CheckPremision([KhachhangPermission::KhachHangDS, User::Admin], []) == true) {
                    ?>
                        <li class="<?php echo \Application::$_Module == "khachhang" ? 'active' : '' ?>">
                            <a href="/benhnhan/">
                                <i class="fa fa-user-plus"></i>
                                <span>Quản lý bệnh nhân</span>
                            </a>

                        </li>
                    <?php
                    }

                    if (\Model\Permission::CheckPremision([KhachhangPermission::KhachHangDS, User::Admin], []) == true) {
                    ?>
                        <li class="<?php echo \Application::$_Module == "khachhang" ? 'active' : '' ?>">
                            <a href="/donthuoc/">
                                <i class="fa fa-user-plus"></i>
                                <span>Quản lý đơn thuốc</span>
                            </a>

                        </li>
                    <?php
                    }

                    // \Module\nhanvien\Functions::menulayout(\Application::$_Module);

                    if (\Model\Permission::CheckPremision([\Model\User::Admin, "quanlysanpham_view"]) == true) {
                    ?>
                        <li class="hidden <?php echo \Application::$_Module == "quanlysanpham" ? 'active' : '' ?> treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span>Quản Lý Sản Phẩm</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                btnHtml::btnThemSanPham();
                                btnHtml::btnViewSanPham();
                                btnHtml::btnViewDanhMuc();
                                btnHtml::btnViewOptions();
                                ?>
                            </ul>
                        </li>
                    <?php
                    }

                    // \Module\congty\Functions::menulayout(\Application::$_Module);
                    // \Module\baocao\Functions::menulayout(\Application::$_Module);

                    if (\Model\Permission::CheckPremision([\Model\User::Admin, md5(\Controller\quanlyquyen::class . "_view")]) == true) {
                    ?>
                        <li class="<?php echo \Application::$_Controller == "quanlyquyen" ? 'active' : '' ?> treeview">
                            <a href="/quanlyquyen/">
                                <i class="fa fa-dashboard"></i> <span>Quản Lý Quyền</span>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    // \Module\giaodien\Functions::menulayout(\Application::$_Module);

                    if (\Model\Permission::CheckPremision([\Model\User::Admin, md5(\Controller\quanlyusers::class . "_view")]) == true) {
                    ?>
                        <li class="<?php echo \Application::$_Controller == "quanlyusers" ? 'active' : '' ?> treeview">
                            <a href="/quanlyusers/">
                                <i class="fa fa-dashboard"></i> <span>Quản Lý Tài Khoản</span>
                            </a>
                        </li>
                    <?php
                    }

                    if (\Model\Permission::CheckPremision([\Model\User::Admin]) == true) {
                    ?>
                        <li class="treeview <?php echo (\Application::$_Controller == "options" || \Application::$_Controller == "locations") ? 'active' : "" ?> ">
                            <a href="#">
                                <i class="fa fa-gears"></i>
                                <span>Cài Đặt</span>
                                <span class="label label-primary pull-right">4</span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/locations/index"><i class="fa fa-circle-o"></i> Tỉnh Thành Phố</a></li>
                                <li><a href="/options/donvitinh/"><i class="fa fa-circle-o"></i> Đơn Vị Tính</a></li>
                                <!-- <li><a href="/options/congty/"><i class="fa fa-circle-o"></i> Công Ty</a></li>
                                <li><a href="/options/index/phongban/"><i class="fa fa-circle-o"></i> Phòng Ban</a></li>
                                <li><a href="/options/hopdong/"><i class="fa fa-circle-o"></i> Hợp Đồng</a></li>
                                <li><a href="/options/tinhtrang/"><i class="fa fa-circle-o"></i>Tinh trạng Hợp Đồng</a></li>
                                <li><a href="/options/hinhthuchd/"><i class="fa fa-circle-o"></i> Hình Thức Hợp Đồng</a></li> -->
                                <li><a href="/options/gioitinh/"><i class="fa fa-circle-o"></i> Giới Tính</a></li>
                                <li><a href="/options/cachdungthuoc/"><i class="fa fa-circle-o"></i> Cách Dùng Thuốc</a></li>
                                <li><a href="/options/donviquydoi/"><i class="fa fa-circle-o"></i> Đơn vị quy đổi</a></li>
                                <li><a href="/options/optiondonthuoc/"><i class="fa fa-circle-o"></i> Cài Đặt Loại Đơn </a></li>
                                <!-- <li><a href="/options/chucvu/"><i class="fa fa-circle-o"></i> Chức Vụ</a></li>
                                <li><a href="/options/index/NameFunction/"><i class="fa fa-circle-o"></i> Module</a></li> -->
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="">
                        <a href="/backend/logout">
                            <i class="fa fa-sign-out"></i>
                            <span>Thoát</span>
                        </a>
                    </li>


                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
    <?php
    }

    public static function footer()
    {
    ?>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 0.0.1
            </div>
            <strong>Copyright<a href="http://bakco.com.vn"></a>.</strong> nhathuoc.bakco.com.vn
        </footer>
<?php
    }
}
