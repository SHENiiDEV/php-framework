function getCookie(e) {
    try {
        for (var t = e + "=", o = document.cookie.split(";"), n = 0; n < o.length; n++) {
            for (var a = o[n];
                 " " == a.charAt(0);) a = a.substring(1);
            if (-1 != a.indexOf(t)) return a.substring(t.length, a.length)
        }
        return !1
    } catch (e) {
        fehler("getCookie")
    }
}

function setSessionCookie(e, t) {
    try {
        var o = new Date,
            n = new Date;
        n.setTime(n.getTime() + 15e9), o = o.getTime() + 18e5, document.cookie = e + "=" + t + "; expires=" + n + "; path=/;"
    } catch (e) {
        fehler("setSessionCookie")
    }
}

function openlang() {
    $("#set-language").modal("show")
}

function sessionCheck() {
    try {
        var e = getCookie("vt_lg");
        e ? window.location.pathname.substring(1) != e + "" && "ru" != e && window.location.replace(e + "") : (setSessionCookie("vt_lg", "ru"), openlang())
    } catch (e) {
        fehler("sessionCheck")
    }
}

function fehler(e) {
    var t = "fehler.function." + e;
    console.log(t)
}

function scroll_to(e, t) {
    var o = e.attr("href").replace("#", "."),
        n = 0;
    ".top-content" != o && (o += "-container", n = $(o).offset().top - t), $(window).scrollTop() != n && $("html, body").stop().animate({
        scrollTop: n
    }, 1e3)
}
jQuery(document).ready(function() {
    $("#lightgallery").lightGallery({
        download: !1,
        counter: !1,
        share: !1,
        actualSize: !1,
        zoom: !1,
        fullScreen: !1,
        autoplay: !1,
        autoplayControls: !1
    }), $("a.scroll-link").on("click", function(e) {
        e.preventDefault(), scroll_to($(this), 0)
    }), $(".top-content").backstretch("assets/img/backgrounds/1.jpg"), $(".call-to-action-1").backstretch("assets/img/backgrounds/1.jpg"), $(".testimonials-container").backstretch("assets/img/backgrounds/2.jpg"), $(".call-to-action-2").backstretch("assets/img/backgrounds/2.jpg"), $('a[data-toggle="tab"]').on("shown.bs.tab", function() {
        $(".testimonials-container").backstretch("resize")
    }), (new WOW).init(), $(".launch-modal").on("click", function(e) {
        e.preventDefault(), $("#" + $(this).data("modal-id")).modal()
    })
}), jQuery(window).load(function() {
    $(".modal-body img, .testimonial-image img").attr("style", "width: auto !important; height: auto !important;")
}), jQuery(function() {
    "use strict";
    jQuery("#contactfrm").length && jQuery("#contactfrm").validate({
        errorPlacement: function(e, t) {
            e.insertBefore(t)
        },
        submitHandler: function(e) {
            $(e).ajaxSubmit({
                target: ".result",
                success: function() {
                    $(".result div#handler-answer").length && $("#contactfrm").trigger("reset")
                }
            })
        },
        onkeyup: !1,
        onclick: !1,
        highlight: function(e) {
            $(e).closest(".form-group").addClass("has-error")
        },
        errorElement: "div",
        success: function(e) {
            e.closest(".form-group").removeClass("has-error")
        },
        rules: {
            name: {
                required: !0,
                minlength: 3
            },
            email: {
                required: !0,
                email: !0
            },
            comment: {
                required: !0,
                minlength: 10,
                maxlength: 350
            }
        }
    })
}), sessionCheck();
var tm = Date.now() / 1e3;
document.cookie = "timesp=" + tm + "; path=/;";