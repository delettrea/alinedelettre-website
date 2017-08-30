// function for see production's filter.
$("#all, #html, #css, #javascript, #php").click(function () {
    $('.test-filter').removeClass('active');
    var input = $(this);
    $(input).addClass('active');
    var filter = $(input).attr("id");
    var action = 'index.php?action=test';
    $(".rowProduct").slideUp('800', function () {
        $.ajax({method: "GET", url :action, data:{
            filter: filter
        }}).done(function (data) {
            $(".rowProduct").html(data);
            $(".rowProduct").slideDown('slow');
        });
    });
    return false;
});

// function for see error Contact.
$(document).ready(function () {
    $(".formContact").submit(function () {
        var action = $(this).attr('action');
        var name = $("#name").val();
        var email = $("#email").val();
        var object = $("#object").val();
        var mail = $("#mail").val();
        $("#messages").slideUp('800', function () {
            $('input[type="submit"]').hide().after('<i class="loader fa fa-circle-o-notch fa-spin fa-fw"></i><span class="loader sr-only">Loading...</span>');
            $.post(action, {
                name: name,
                email : email,
                object: object,
                mail: mail
            }, function (data) {
                $("#messages").html(data);
                $("#messages").slideDown('slow');
                $(".loader").fadeOut();
                $('input[type="submit"]').fadeIn();
            });
        });
        return false;
    })
});

// function for see error Login.
$(document).ready(function () {
    $(".formLogin").submit(function () {
        var action = $(this).attr('action');
        var login = $("#login").val();
        var password = $("#password").val();
        $("#messages").slideUp('800', function () {
            $('input[type="submit"]').hide().after('<i class="loader fa fa-circle-o-notch fa-spin fa-fw"></i><span class="loader sr-only">Loading...</span>');
            $.post(action, {
                login: login,
                password: password
            }, function (data) {
                $("#messages").html(data);
                if(data.match('.succes') !== null) {
                    setTimeout(function() {
                        $(location).attr('href',"index.php")}, 800);
                }
                $("#messages").slideDown('slow');
                $(".loader").fadeOut();
                $('input[type="submit"]').fadeIn();
            });
        });
        return false;
    })

});



//function for hide website's Menu
$(document).ready(function (){
    $("#nav").hide();
    $("#menu").click(function () {
        $("#nav").toggle(1000);
        $(".empty").toggle(1000);
    })
});

// Scroll Magic fade elements
$(document).ready(function () {
    var controller = new ScrollMagic.Controller();
    var FirstScene = new ScrollMagic.Scene({
        triggerElement: '#fade'
    })
        .setClassToggle('.fade', 'fade-in')
        .addTo(controller);

    var SecondScene = new ScrollMagic.Scene({
        triggerElement: '#fade2'
    })
        .setClassToggle('.fade2', 'fade-in2')
        .addTo(controller);

    var ThirdScene = new ScrollMagic.Scene({
        triggerElement: '#fade3'
    })
        .setClassToggle('.fade3', 'fade-in3')
        .addTo(controller);

    var FourthScene = new ScrollMagic.Scene({
        triggerElement: '#fade4'
    })
        .setClassToggle('.fade4', 'fade-in4')
        .addTo(controller);

    var FifthScene = new ScrollMagic.Scene({
        triggerElement: '#fade5'
    })
        .setClassToggle('.fade5', 'fade-in5')
        .addTo(controller);
});


