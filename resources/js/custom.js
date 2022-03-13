$(document).ready(function() {
    const cookieName = 'allowCookies';

    let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + cookieName.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));

    const cookieValue =  matches ? decodeURIComponent(matches[1]) : undefined;

    if (cookieValue === undefined || cookieValue === false) {
        $('.cookieAllow').show();
    }

    $('body').bind('copy paste cut drag drop', function (e) {
        e.preventDefault();
    });

    $('.hamburger').click(function() {
        $('.mainNav').show(500);
        $('.close').show(500);
        $('.hamburger').hide(500);
    });

    $('.close').click(function() {
        $('.mainNav').hide(500);
        $('.subMenu').hide(500);
        $('.close').hide(500);
        $('.hamburger').show(500);
        $('.navArrow').removeClass('rotateArr');
    });

    $('.subMenuOpen').click(function() {
        $('.subMenu').toggle(500);
        $('.navArrow').toggleClass('rotateArr');
    });

    $(".modal-toggle").click(function() {
        var selector = "#" + $(this).data("target");
        $(selector).toggleClass("is-visible");
    });

    $("#cookieAllow").click(function() {
        document.cookie = "allowCookies=true";
        $(".cookieAllow").hide();
    });

    // Totop
    $(".toTop").click(function () {
        $("html, body").animate({scrollTop: 0}, 700);
    });

    //breadcrumb open
    $("#breadcrumb").click(function(){
        $(".dropdown-menu").show(500);
    });
});

//breadcrumb close
$(document).on('click', function(e) {
  if (!$(e.target).closest(".dropdown").length) {
    $('.dropdown-menu').hide(500);
  }
  e.stopPropagation();
});

// Totop show
$(window).scroll(function() {
    if ($(this).scrollTop()>=500) {
        $('.toTop').fadeIn();
    } else {
        $('.toTop').fadeOut();
    }
});
