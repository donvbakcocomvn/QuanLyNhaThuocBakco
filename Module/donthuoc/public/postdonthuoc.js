$(document).ready(function () {

    // Xử lý dữ liệu sáng, trưa, chiều, số lượng thuốc
    $(".changenumber").each(function (index, e) {
        // console.log(e.attr("id"));
        $(this).change(function (param) {
            // console.log($(this).attr("id"));
            $($(this).attr("id")).val();
            // console.log($("#"+$(this).attr("id")).val());
            console.log($("#" + $(this).attr("id")).attr("index"));
            var idName = "#" + $(this).attr("id");
            var idDVT = "#dvt" + $("#" + $(this).attr("id")).attr("index");
            var index = $("#" + $(this).attr("id")).attr("index");
            var idThuoc = $(idName).val();
            var idSoNgaySD = "#SoNgaySD" + $("#" + $(this).attr("id")).attr("index");
            var idSang = "#sang" + $("#" + $(this).attr("id")).attr("index");
            var idTrua = "#trua" + $("#" + $(this).attr("id")).attr("index");
            var idChieu = "#chieu" + $("#" + $(this).attr("id")).attr("index");
            var idSoLuong = "#soluong" + $("#" + $(this).attr("id")).attr("index");
            var idGiaBan = "#giaban" + $("#" + $(this).attr("id")).attr("index");

            $.ajax({
                url: `/donthuoc/index/capnhatsoluong/`,
                type: 'post',
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                // data: JSON.stringify(data),
                data: JSON.stringify({
                    "index": index,
                    "sang": $(idSang).val(),
                    "chieu": $(idChieu).val(),
                    "trua": $(idTrua).val(),
                    "ngaydungthuoc": $(idSoNgaySD).val(),
                }),
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    $(idGiaBan).val(response.Giaban);
                    $(idSang).val(response.Sang);
                    $(idTrua).val(response.Trua);
                    $(idChieu).val(response.Chieu);
                    $(idSoNgaySD).val(response.SoNgaySDThuoc);
                    $(idSoLuong).val(response.Soluong);
                },
                complete: function () {
                    //spinner.close();
                }
            });
        });
    });

    // Xử lý nút button Cập nhật tổng ngày dùng
    $("#btn-capnhattongngaydungthuoc").click(function () {
        var TongNgayDungThuoc = $("#TongNgayDungThuoc").val();
        $.ajax({
            url: `/donthuoc/index/capnhatngaydungthuoc/${TongNgayDungThuoc}/`,
            type: 'Get',
            // data:{$id : $id},
            //dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response);
                window.location.reload();
            },
            complete: function () {
                //spinner.close();
            }
        });
    })

    // Thay đổi dữ liệu khi change name thuốc
    $(".changename").each(function (index, e) {
        // console.log(e.attr("id"));
        $(this).change(function (param) {
            // console.log($(this).attr("id"));
            $($(this).attr("id")).val();
            // console.log($("#"+$(this).attr("id")).val());
            // console.log($("#" + $(this).attr("id")).attr("index"));
            var index = $("#" + $(this).attr("id")).attr("index");
            var idName = "#" + $(this).attr("id");
            var idDVT = "#dvt" + index;
            var idThuoc = $(idName).val();
            var idSoNgaySD = "#SoNgaySD" + index;
            var idSang = "#sang" + index;
            var idTrua = "#trua" + index;
            var idChieu = "#chieu" + index;
            var idSoLuong = "#soluong" + index;
            var idSLHienTai = "#SLHienTai" + index;
            var idGiaBan = "#giaban" + index;
            var idCachDungThuoc = "#cachdungthuoc" + index;
            var idGhiChu = "#ghichu" + index;

            console.log(idDVT);
            console.log(index);
            console.log(idThuoc);
            console.log(idCachDungThuoc);

            $.ajax({
                url: `/donthuoc/index/capnhatthuoc/${idThuoc}/${index}/`,
                type: 'Get',
                // data:{$id : $id},
                //dataType: 'json',
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    // console.log("ádasdsadsdadasdsd");
                    if (response.SoNgaySDThuoc == null) {
                        alert("Thuốc đã có trong danh sách");
                        console.log(idName);
                        window.location.reload();
                        $(idName).val("");
                        console.log($(idName + " option:selected").val());
                        return;
                    }
                    console.log(response);
                    $(idGiaBan).val(response.Giaban);
                    $(idDVT).val(response.DVTTitle);
                    $(idSang).val(response.Sang);
                    $(idTrua).val(response.Trua);
                    $(idChieu).val(response.Chieu);
                    $(idSoNgaySD).val(response.SoNgaySDThuoc);
                    $(idSoLuong).val(response.Soluong);
                    $(idCachDungThuoc).val(response.CachDung);
                    $(idGhiChu).val(response.Ghichu);
                    $(idSLHienTai).val(response.SLHienTai);
                },
                complete: function () {
                    //spinner.close();
                }
            });
        });
    });


    $(".changeinfo").each(function (index, e) {
        $(this).change(function (param) {
            $($(this).attr("id")).val();
            console.log();
            $id = $("#tenbenhnhan").val();
            $sdt = $("#sodienthoai").val();
            var dataFormString = {
                "Name": $id,
                "Phone": $sdt,
            }
            $.ajax({
                url: `/donthuoc/index/timkhachhang/`,
                type: 'POST',
                data: dataFormString,
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                // dataType: 'application/json; charset=utf-8',
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    console.log(response.QuanHuyen);
                    $("#tenbenhnhan").val(response.Name);
                    $("#Namsinh").val((response.Ngaysinh).substring(0, 4));
                    $("#Thangsinh").val((response.Ngaysinh).substring(5, 7));
                    $("#Ngaysinh").val((response.Ngaysinh).substring(8, 10));
                    $("#sodienthoai").val(response.Phone);
                    $('#CMND').val(response.CMND);
                    $('#Gioitinh').val(response.Gioitinh);
                    $('#TinhThanh').val(response.Address);
                    $('#tinhThanh').val(response.TinhThanh).change();
                    // $('#quanHuyen').val(response.QuanHuyen);
                    $(`select#quanHuyen option[value="` + $(response.QuanHuyen) + `"]`).attr("selected", true);
                    $('#quanHuyen').data('value', response.QuanHuyen);
                    $('#quanHuyen').change();

                    $(`select#phuongXa option[value="` + $(response.PhuongXa) + `"]`).attr("selected", true);
                    $('#phuongXa').data('value', response.PhuongXa);
                    $('#phuongXa').change();
                },
                error: function () {
                    // alert("error");
                }
            });
        });
    });


    // Thêm SESSION
    $("#btn-add").click(function () {
        // var index = $("#" + $(this).attr("id")).attr("index");
        // alert("index");
        // var TongNgayDungThuoc = $("#TongNgayDungThuoc").val();
        $.ajax({
            url: `/donthuoc/index/themdong/`,
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
});