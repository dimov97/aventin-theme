$(document).ready(function(){

    var swiper = new Swiper('.swiper-products', {
        slidesPerView: 4,
        slidesPerColumn: 2,
        spaceBetween: 40,
        breakpoints: {
            // when window width is >= 320px
            767: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            991: {
                slidesPerView: 2,
                spaceBetween: 20
            },
        },
        pagination: {
            el: '.swiper-pagination-products',
            clickable: true,
        },
    });
    var logo = new Swiper('.swiper-logo', {
        slidesPerView: 5,
        spaceBetween: 45,
        breakpoints: {
            // when window width is >= 320px
            767: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            1367: {
                slidesPerView: 3,
                spaceBetween: 20
            },
        },
        pagination: {
            el: '.swiper-pagination-logo',
            clickable: true,
        },
    });

    var manu = new Swiper('.swiper-manufacturers', {
        slidesPerView: 'auto',
        spaceBetween: 45,
        breakpoints: {
            767: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            991: {
                slidesPerView: 2,
                spaceBetween: 20
            },
        },
        pagination: {
            el: '.swiper-pagination-manufacturers',
            clickable: true,
        },
    });
    $(".menu .icon-menu, .menu-mobile .icon-menu").on("click", function(){
        $(".open-menu, .mobile-color").hide().slideDown();
    });
    $(".close-menu .icon-close").on("click", function(){
        $(".open-menu, .mobile-color").slideUp();
    });

    $(".content .icon-search").on("click", function(){
        $(".search-area").hide().slideDown();
    });
    $(".close-search .icon-close").on("click", function(){
        $(".search-area").slideUp();
    });

    $('ul.tabs li').on('click', function(){
        var tab_id = $(this).attr('data-tab');

        $('ul.tabs li').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#"+tab_id).addClass('current');
    });

    $('#menu-menyu li:first-child').on('click', function(){
        $('#menu-menyu li .sub-menu').toggle();
    });

    $('#menu-menu li:first-child').on('click', function(){
        $('#menu-menu li .sub-menu').toggle();
    });

    $('.mobile-language li:first-child').on('click', function(){
        $('.mobile-language li .sub-menu').fadeToggle();
        $(this).parent().toggleClass('rotate');
    });

    $('footer .col span.icon-next').on('click', function(){
        $(this).parent().parent().find('ul').slideToggle();
        $(this).toggleClass('rotate');
    });

    $('.contacts-info__block .icon').on('click', function(){
        $('.contacts-info__block .icon').removeClass("active")
        $(this).toggleClass("active");
    });
    $('.menu-container .icon-next').on('click', function(){
        $(this).parent().find('ul').slideToggle();
        $(this).toggleClass('rotate');
    });

    document.addEventListener( 'wpcf7mailsent', function( event ) {
        location.reload();
    }, false );

    $(".menu-container ul li a, .footer-inner a").addClass("hvr-fade");
});


// Popup
document.querySelectorAll('.popup-opener')
    .forEach(btn => {
        btn.addEventListener('click', function() {

            var $popup = document.querySelector('#' + btn.dataset.popup);
            $("#upload").fadeIn(350);
            $popup.hidden = false;
        })
    });

document.querySelectorAll('.popup-wrapper')
    .forEach($wrap => {
        $wrap.addEventListener('click', () => {
            $("#upload").fadeOut(350);
            $wrap.hidden = true;
        });

        var $popup = $wrap.querySelector('#popup');

        $popup.addEventListener('click', e => {
            e.stopPropagation();
        });

        var $close = $popup
            .querySelector('.close');

        if (!$close) {
            return;
        }

        $close.addEventListener('click', e => {
            $("#upload").fadeOut(350);
            $close.closest('.popup-wrapper').hidden = true;
        })
    });

AOS.init();