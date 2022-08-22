const  LoadDanhSachHuyen = function(maTinh, idTarget) {
    $.ajax({
        type: "get",
        "url": "/api/GetQuanHuyenTag/" + maTinh
    }).done(function(res) {
        $(idTarget).html(res);
        $(idTarget).select2();
    });

}
$(function() {
    try {
        $(".btngeneratePassword").click(function() {
            var dataHtml = $(this).data();

            var length = 8,
                    charset = "!@#$%^&*()_+abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
                    retVal = "";
            for (var i = 0, n = charset.length; i < length; ++i) {
                retVal += charset.charAt(Math.floor(Math.random() * n));
            }
            $(dataHtml.target).val(retVal);
        });

        $(".btn-confirm").click(function() {
            return confirm($(this).attr("title"));
        });
        $(".btn-danger").click(function() {
            return confirm($(this).attr("title"));
        });

        $(".system-alert").hide(5000);

    } catch (e) {
        console.log(e);
    }
    try {


        $(".editor").each(function(index, el) {
            CKEDITOR.replace($(this).attr("id"), {
                height: "300px"
            });
        });
        $(".editorContent").each(function(index, el) {
            CKEDITOR.replace($(this).attr("id"), {
                height: "500px"
            });
        });

    } catch (e) {
        console.log(e);
    }
    try {
//        lưu tag cuối cùng
        var lastTag = sessionStorage.getItem("nav-tabs");
        if (lastTag) {
            $(".tab-content .tab-pane").removeClass("active");
            $(".nav-tabs li").removeClass("active");
            $(".nav-tabs li a[href=" + lastTag + "]").parent("li").addClass("active");

            console.log(lastTag);
            $(lastTag).addClass("active");
        }
        $(".nav-tabs li a").click(function() {
            var lastTag = $(this).attr("href");
            sessionStorage.setItem("nav-tabs", lastTag);

        });
    } catch (e) {

    }
    try {
        $(".select2").each(function() {
            $(this).select2();
        });
    } catch (e) {

    }
    try {
        var miniMenu = window.localStorage.getItem("sidebar-toggle");
        if (miniMenu) {
            $("body").addClass(miniMenu);
        }
        $(".sidebar-toggle").click(function() {
            if ($("body").hasClass("sidebar-collapse")) {
                console.log(true);
                window.localStorage.setItem("sidebar-toggle", "sidebar-collapse");
            } else {
                window.localStorage.setItem("sidebar-toggle", "");
            }
        });
    } catch (e) {

    }


});

app.controller("searchCtrl", function($scope) {
    $scope.showImg = true;
    var isShow = window.sessionStorage.getItem("showMore");
    $scope.showMore = isShow;
    $scope.isShowMore = function(showMore) {
        window.sessionStorage.setItem("showMore", showMore);
    };

})

function BrowseServer(idInput, thumnai)
{
    // You can use the "CKFinder" class to render CKFinder in a page:
    var finder = new CKFinder();
    finder.basePath = '../';	// The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = function(fileUrl) {
        document.getElementById(idInput).value = fileUrl;
        try {
            document.getElementById(thumnai).src = fileUrl;
        } catch (e) {

        }

    };
    finder.popup();

    // It can also be done in a single line, calling the "static"
    // popup( basePath, width, height, selectFunction ) function:
    // CKFinder.popup( '../', null, null, SetFileField ) ;
    //
    // The "popup" function can also accept an object as the only argument.
    // CKFinder.popup( { basePath : '../', selectActionFunction : SetFileField } ) ;
}