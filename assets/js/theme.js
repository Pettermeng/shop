$(document).ready(function () {

    // search popup
    $('.search img').click(function(){
        $('body').addClass('overflow-hidden');
        $('.search-popup').fadeIn(300);
    })
    $('.search-popup .cancel').click(function(){
        $('body').removeClass('overflow-hidden');
        $('.search-popup').fadeOut(300);
    })

    // Login Register Form
    $('.register-form').hide();
    $('.btn-register').click(function(){
        $(this).addClass('active')
        $('.btn-login').removeClass('active')
        $('.login-form').hide();
        $('.register-form').fadeIn(500);
    })
    $('.btn-login').click(function(){
        $(this).addClass('active')
        $('.btn-register').removeClass('active')
        $('.login-form').fadeIn(500);
        $('.register-form').hide();
    })

    // Select variant   
    $('.variant ul li').click(function(){
        $(this).addClass('active')
        $(this).siblings().removeClass('active')
    })
    
});