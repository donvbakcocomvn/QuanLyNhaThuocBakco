$(function () {

  $(".TinhThanhClass").each(function () {
    var self = $(this);
    var tinhThanhId = "#" + self.attr("id");
    // console.log(tinhThanhId);
    $(tinhThanhId).change(function () {
      var QuanHuyenId = $(this).data("target");
      var maTinh = $(this).val();
      $.ajax({
        type: "get",
        url: `/public/TinhThanh/tinhthanh.php?maTinh=${maTinh}`,
        dataType: "html",
        success: function (response) {
          $(QuanHuyenId).html(response);
          var data = $(QuanHuyenId).data();
          $(QuanHuyenId).val(data.value);
          $(QuanHuyenId).change();
        },
      });
    });

    $.ajax({
      type: "get",
      url: "/public/TinhThanh/tinhthanh.php",
      dataType: "html",
      success: function (response) {
        $(tinhThanhId).html(response);
        // console.log(tinhThanhId);
        var data = $(tinhThanhId).data();
        $(tinhThanhId).val(data.value);
        $(tinhThanhId).change();
        $(tinhThanhId).select2();

      },
    });
  });


  $(".QuanHuyenClass").each(function () {
    var self = $(this);
    var tinhThanhId = "#" + self.attr("id");
    var dataElement = self.data("tinhthanh");
    console.log(dataElement);
    $.ajax({
      type: "get",
      url: `/public/TinhThanh/tinhthanh.php?maTinh=${dataElement}`,
      dataType: "html",
      success: function (response) {
        $(tinhThanhId).html(response);
        var data = $(tinhThanhId).data();
        $(tinhThanhId).val(data.value);
        $(tinhThanhId).change();
        $(tinhThanhId).select2();
      },
    });
  });


  $(".PhuongXaClass").each(function () {
    var self = $(this);
    var phuongXaId = "#" + self.attr("id");
    var maTinh = self.data("tinhthanh");
    var maHuyen = self.data("quanhuyen");
    // console.log(dataElement);
    $.ajax({
      type: "get",
      url: `/public/TinhThanh/tinhthanh.php?maTinh=${maTinh}&maHuyen=${maHuyen}`,
      dataType: "html",
      success: function (response) {
        $(phuongXaId).html(response);
        var data = $(phuongXaId).data();
        $(phuongXaId).val(data.value);
        $(phuongXaId).change();
        $(phuongXaId).select2();
      },
    });
  });
  // alert("ok");
  // lấy danh sách tỉnh
  // $.ajax({
  //   type: "get",
  //   url: "/public/TinhThanh/tinhthanh.php",
  //   dataType: "html",
  //   success: function (response) {
  //     $("#tinhThanh").html(response);
  //     var data = $("#tinhThanh").data();
  //     $("#tinhThanh").val(data.value);
  //     $("#tinhThanh").change();
  //   },
  // });
  // khi chọn tỉnh thành phố thì
  //load danh sách quận huyen
  $("#tinhThanh").change(function () {
    //alert($(this).val());
    var maTinh = $(this).val();
    $.ajax({
      type: "get",
      url: `/public/TinhThanh/tinhthanh.php?maTinh=${maTinh}`,
      dataType: "html",
      success: function (response) {
        $("#quanHuyen").html(response);
        var data = $("#quanHuyen").data();
        $("#quanHuyen").val(data.value);
        $("#quanHuyen").change();
      },
    });
  });
  $("#quanHuyen").change(function () {
    var maTinh = $("#tinhThanh").val();
    var maHuyen = $(this).val();
    $.ajax({
      type: "get",
      url: `/public/TinhThanh/tinhthanh.php?maTinh=${maTinh}&maHuyen=${maHuyen}`,
      dataType: "html",
      success: function (response) {
        $("#phuongXa").html(response);
        var data = $("#phuongXa").data();
        $("#phuongXa").val(data.value);
      },
    });
  });
});
