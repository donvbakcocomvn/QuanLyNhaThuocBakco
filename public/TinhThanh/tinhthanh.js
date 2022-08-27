$(function () {
  // alert("ok");
  // lấy danh sách tỉnh
  $.ajax({
    type: "get",
    url: "/public/TinhThanh/tinhthanh.php",
    dataType: "html",
    success: function (response) {
      $("#tinhThanh").html(response);
      var data = $("#tinhThanh").data();
      $("#tinhThanh").val(data.value);
      $("#tinhThanh").change();
    },
  });
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
