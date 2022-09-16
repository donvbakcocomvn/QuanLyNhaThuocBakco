$(document).ready(function () {

    $("#LamLai").click(function () {
        $.ajax({
            url: `/quanlythuoc/phieuxuatnhap/lamlai/`,
            type: 'Get',
            contentType: false,
            processData: false,
            success: function (response) {
                window.location.reload();
            },
            complete: function () {
                //spinner.close();
            }
        });
    });
    // Xóa SESSION
    $(".deleterow").click(function () {
        var index = $("#" + $(this).attr("id")).attr("index");
        // var TongNgayDungThuoc = $("#TongNgayDungThuoc").val();
        $.ajax({
            url: `/quanlythuoc/phieuxuatnhap/DeleteSP/${index}/`,
            type: 'Get',
            // data:{$id : $id},
            //dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {
                window.location.reload();
                console.log(response);
            },
            complete: function () {
                //spinner.close();
            }
        });
    });

    // Thêm SESSION
    $("#btn-addrow").click(function () {
        // var index = $("#" + $(this).attr("id")).attr("index");
        // alert("index");
        // var TongNgayDungThuoc = $("#TongNgayDungThuoc").val();
        $.ajax({
            url: `/quanlythuoc/phieuxuatnhap/ThemSanPham/`,
            type: 'post',
            // data:{$id : $id},
            //dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {
                window.location.reload();
                console.log(response);
            },
            complete: function () {
                //spinner.close();
            }
        });
    })

    // Change Thuốc
    $(".changename").each(function (index, e) {

        // console.log(e.attr("id"));
        $(this).change(function (param) {
            // console.log($(this).attr("id")); // Lấy Id thuốc
            $($(this).attr("id")).val();
            // console.log($("#"+$(this).attr("id")).val()); // Lấy Mã Thuốc
            // console.log($("#" + $(this).attr("id")).attr("index")); // Lấy index thuốc
            var index = $("#" + $(this).attr("id")).attr("index");
            var idName = "#" + $(this).attr("id");
            var idDVT = "#DVT" + $("#" + $(this).attr("id")).attr("index");
            var idSoLuong = "#SoLuong" + $("#" + $(this).attr("id")).attr("index");
            var idSoLo = "#SoLo" + $("#" + $(this).attr("id")).attr("index");
            var idNhaSanXuat = "#NhaSanXuat" + $("#" + $(this).attr("id")).attr("index");
            var idNuocSanXuat = "#NuocSanXuat" + $("#" + $(this).attr("id")).attr("index");
            var idHanSuDung = "#HanSuDung" + index;
            var idPrice = "#Price" + $("#" + $(this).attr("id")).attr("index");
            var index = $("#" + $(this).attr("id")).attr("index");
            var idThuoc = $(idName).val();
            $.ajax({
                url: `/quanlythuoc/phieuxuatnhap/capnhatdanhsachsanpham/${idThuoc}/${index}/`,
                type: 'get',
                contentType: false,
                processData: false,
                success: function (response) {
                    if (idThuoc != "") {
                        $(idSoLuong).val(response.Soluong);
                        $(idSoLo).val(response.Solo);
                        $(idNhaSanXuat).val(response.NhaSX);

                        $(idNuocSanXuat).val(response.NuocSX);
                        $(idPrice).val(response.Gianhap);
                        $(idDVT).val(response.DVTTitle);
                        if ($("#XuatNhapId").val() == "1") {
                            $(idHanSuDung).attr("Required", "");
                        } else {
                            $(idHanSuDung).removeAttr("Required");
                        }
                        $(idSoLuong).attr("Required", "");
                        $(idSoLo).attr("Required", "");
                        // $(idNhaSanXuat).attr("Required", "");
                        // $(idNuocSanXuat).attr("Required", "");
                        $(idPrice).attr("Required", "");
                    }


                },
                complete: function () {
                    //spinner.close();
                }
            });
        });
    });
    $("#XuatNhapId").change(function (e) {
        $(".changename").change();
        var xuatNhap = $(this).val();
        if (xuatNhap == 1) {
            $(".hansudung").show();
            $(".txtTongTien").attr("colspan",8);
        }else{
            $(".hansudung").hide();
            $(".txtTongTien").attr("colspan",7);
        }
    });
    $(".formpostdata").each(function (index, e) {
        $(".formpostdata").change();
        $(this).change(function (param) {
            var IdPhieu = $("#IdPhieu_Id");
            var DonViCungCap = $("#DonViCungCap_Id");
            var XuatNhap = $("#XuatNhap_Id");
            var NoiDungPhieu = $("#NoiDungPhieu_Id");
            var GhiChu = $("#GhiChu_Id");
            var NgayNhap = $("#NgayNhap_Id");
            $.ajax({
                url: `/quanlythuoc/phieuxuatnhap/setformdefault/`,
                type: 'post',
                data: JSON.stringify({
                    "IdPhieu": IdPhieu.val(),
                    "DonViCungCap": DonViCungCap.val(),
                    "XuatNhap": XuatNhap.val(),
                    "NoiDungPhieu": NoiDungPhieu.val(),
                    "GhiChu": GhiChu.val(),
                    "NgayNhap": NgayNhap.val(),
                }),
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.Status == "1") {
                        $('#btnTaoPhieu').removeAttr('disabled');
                        IdPhieu.parents(".form-group").removeClass("has-error");
                        IdPhieu.parents(".form-group").addClass("has-success");
                    } else {
                        $('#btnTaoPhieu').attr('disabled', 'disabled');
                        IdPhieu.parents(".form-group").removeClass("has-success");
                        IdPhieu.parents(".form-group").addClass("has-error");

                    }
                    IdPhieu.val(response.IdPhieu);
                }
            });
        });
    });
    $(".changenum").each(function (index, e) {
        $(this).change(function (param) {
            $($(this).attr("id")).val();
            // console.log($("#"+$(this).attr("id")).val()); // Lấy Mã Thuốc
            // console.log($("#" + $(this).attr("id")).attr("index")); // Lấy index thuốc
            var index = $("#" + $(this).attr("id")).attr("index");
            var idName = "#" + $(this).attr("id");
            var idDVT = "#DVT" + $("#" + $(this).attr("id")).attr("index");
            var idSoLuong = "#SoLuong" + $("#" + $(this).attr("id")).attr("index");
            var idSoLo = "#SoLo" + $("#" + $(this).attr("id")).attr("index");
            var idNhaSanXuat = "#NhaSanXuat" + $("#" + $(this).attr("id")).attr("index");
            var idNuocSanXuat = "#NuocSanXuat" + $("#" + $(this).attr("id")).attr("index");
            var idThanhTien = "#ThanhTien" + $("#" + $(this).attr("id")).attr("index");
            var idPrice = "#Price" + $("#" + $(this).attr("id")).attr("index");
            var idHanSuDung = "#HanSuDung" + index;
            var idThuoc = $(idName).val();
            $.ajax({
                url: `/quanlythuoc/phieuxuatnhap/capnhatsanpham/`,
                type: 'post',
                data: JSON.stringify({
                    "index": index,
                    "soLuong": $(idSoLuong).val(),
                    "nhaSanXuat": $(idNhaSanXuat).val(),
                    "nuocSanXuat": $(idNuocSanXuat).val(),
                    "hsd": $(idHanSuDung).val(),
                    "soLo": $(idSoLo).val(),
                    "gia": $(idPrice).val(),
                }),
                contentType: false,
                processData: false,
                success: function (response) {
                    $(idSoLuong).val(response.Soluong);
                    $(idSoLo).val(response.Solo);
                    $(idNhaSanXuat).val(response.NhaSX);
                    $(idHanSuDung).val(response.HSD);
                    $(idNuocSanXuat).val(response.NuocSX);
                    $(idThanhTien).html((response.Soluong * response.Giaban).toLocaleString('en-US'));
                    $(idPrice).val(response.Giaban);
                    $("#TongTien").html(response.TongTien.toLocaleString('en-US'));
                },
                complete: function () {
                    //spinner.close();
                }
            });
        });
    });
}); 