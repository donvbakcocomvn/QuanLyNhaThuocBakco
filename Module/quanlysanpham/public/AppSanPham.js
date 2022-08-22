app.controller("SanPhamPut", function ($scope, $http) {
    $scope._onLuuThongTinBanHang = false;
    $scope.SanPhamPutInit = function (idSanPham) {

        $http.get("/index.php?module=quanlysanpham&controller=api&action=GetThongTinBanHang&id=" + idSanPham).then(function (res) {
            $scope._ThongTinBanHang = res.data;
        });

        $scope.LuuTatCaThongTinBanHang = function () {
            $http.post("/index.php?module=quanlysanpham&controller=api&action=luutatcattbanhang",
                    $.param({"ThongTinBanHang": $scope._ThongTinBanHang})
                    ).then(function (res) {
                alert("Đã Lưu");
            });
        }
        $scope.LuuThongTinBanHang = function ($item) {
            $scope._onLuuThongTinBanHang = $item.Id;
            $http.post("/index.php?module=quanlysanpham&controller=api&action=luuttbanhang",
                    $.param($item)
                    ).then(function (res) {
                $scope._onLuuThongTinBanHang = false;
            });
        }

        $scope.XoaThongTinBanHang = function ($id) {
            if (window.confirm("Bạn có muốn xóa thông tin bán hàng này không?") == false) {
                return;
            }
            $http.get("/index.php?module=quanlysanpham&controller=api&action=xoattbanhang&id=" + $id).then(function (res) {
                $http.get("/index.php?module=quanlysanpham&controller=api&action=GetThongTinBanHang&id=" + idSanPham).then(function (res) {
                    $scope._ThongTinBanHang = res.data;
                });
            });
        }

        $scope.TaoThongTinBanHang = function (idSanPham) {
            $http.get("/index.php?module=quanlysanpham&controller=api&action=testTaoThongTinBanHang&id=" + idSanPham).then(function (res) {
                $scope._ThongTinBanHang = res.data;
            });
        }

        $scope.GetSanPhamById = function (idSanPham) {
            $http.get("/index.php?module=quanlysanpham&controller=api&action=getsanphambyid&id=" + idSanPham).then(function (res) {
                console.log(res.data);
                $scope._SanPham = res.data;
                $scope.SPO1 = "0"
                $scope.SPO2 = "0"
                if ($scope._SanPham.Options[0] != undefined) {
                    if ($scope._SanPham.Options[0].Options == "1") {
                        $scope.SPO1 = $scope._SanPham.Options[0].OptionsTypeId;
                    } else {
                        $scope.SPO2 = $scope._SanPham.Options[0].OptionsTypeId;
                    }
                }
                if ($scope._SanPham.Options[1] != undefined) {
                    if ($scope._SanPham.Options[1].Options == "1") {
                        $scope.SPO1 = $scope._SanPham.Options[1].OptionsTypeId;
                    } else {
                        $scope.SPO2 = $scope._SanPham.Options[1].OptionsTypeId;
                    }
                }
            });
        }
        $scope.GetSanPhamById(idSanPham);

        $scope.CapNhatThuocTinhSanPham = function (idSanPham) {
            $http.get("/index.php?module=quanlysanpham&controller=api&action=DanhSachThuocTinhTheoSanPham&id=" + idSanPham).then(function (res) {
                $scope._DSThuocTinhSanPham = res.data;
                var dsidThuocTinh = [];
                for (var index in $scope._DSThuocTinhSanPham) {
                    console.log($scope._DSThuocTinhSanPham[index].Id);
                    dsidThuocTinh.push($scope._DSThuocTinhSanPham[index].Id);
                }
                $http.post("/index.php?module=quanlysanpham&controller=api&action=dsthuoctinhchitiet",
                        $.param({"loaithuocTinh": dsidThuocTinh})).then(function (_res) {
                    $scope._DanhSachThuocTinhChiTiet = _res.data;
                });
            });
        }
        $scope.CapNhatThuocTinhSanPham(idSanPham);


        $http.get("/index.php?module=quanlysanpham&controller=api&action=DanhSachLoaiThuocTinhSanPham").then(function (res) {
            $scope._DSThuocTinh = res.data;

        });


        $scope.XoaThuocTinhSanPham = function (idThuocTinh) {
            $http.get("/index.php?module=quanlysanpham&controller=api&action=xoathuoctinh&id=" + idThuocTinh).then(function (res) {
                $scope.CapNhatThuocTinhSanPham(idSanPham);
            });
        }
        $scope.CapNhatThuocTinhOptions = function (idThuocTinh, Options, idSanPham) {
            // idThuocTinh, Options
            console.log(idSanPham);
            console.log(idThuocTinh);
            console.log(Options);
            if (idSanPham == "") {
                return;
            }
            var data = {
                "IdSanPham": idSanPham,
                "OptionsTypeId": idThuocTinh,
                "Options": Options
            };
            $http.post("/index.php?module=quanlysanpham&controller=api&action=themthuoctinh", $.param(data)).then(function (res) {
                $scope.CapNhatThuocTinhSanPham(idSanPham);
                $scope.GetSanPhamById(idSanPham);
            });
        }
        $scope.ThemThuocTinhSanPham = function (idThuocTinh) {
            var Options = $scope._DSThuocTinhSanPham.length + 1;
            $http.get("/index.php?module=quanlysanpham&controller=api&action=themthuoctinh&id=" + idThuocTinh + "&idSanPham=" + idSanPham + "&Options=" + Options).then(function (res) {
                $scope.CapNhatThuocTinhSanPham(idSanPham);
            });
        }
        $scope.ThemThuocTinhChiTiet = function (thuoctinhchitiet) {


            $http.post("/index.php?module=quanlysanpham&controller=api&action=themthuoctinhchitiet", $.param(thuoctinhchitiet)).then(function () {
                $scope.ThuocTinhChiTiet.TenThuocTinh = "";
                $scope.CapNhatThuocTinhSanPham(idSanPham);
            });
        }
        $scope.XoaThuocTinhChiTiet = function (idTTCT) {
            $http.post("/index.php?module=quanlysanpham&controller=api&action=XoaThuocTinhChiTiet", $.param({"id": idTTCT})).then(function (res) {
                $scope.CapNhatThuocTinhSanPham(idSanPham);
            });
        }
    }

});

