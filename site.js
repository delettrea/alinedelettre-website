// function for see production's filter.
$("#all, #html, #css, #javascript, #php").click(function () {
    $('.test-filter').removeClass('active');
    var input = $(this);
    $(input).addClass('active');
    var filter = $(input).attr("id");
    var action = 'filter.php';
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

//function for scroll to the target.
// go to the section 1.
$('.toSection1').click(function () {
    var action = $_GET('action');
    if(action === null) {
        var elem = $('#section1');
        $('html, body').animate({scrollTop: elem.offset().top}, 1000);
    }
    else{
        $(location).attr('href',"index.php");
    }
});
// go to the section 2.
$('.toSection2').click(function () {
    var action = $_GET('action');
    if(action === null) {
        var elem = $('#section2');
        $('html, body').animate({scrollTop: elem.offset().top}, 1000);
    }
    else{
        $(location).attr('href',"index.php");
    }
});
// go to the section 3.
$('.toSection3').click(function () {
    var action = $_GET('action');
    if(action === null) {
        var elem = $('#section3');
        $('html, body').animate({scrollTop: elem.offset().top}, 1000);
    }
    else{
        $(location).attr('href',"index.php");
    }
});
// go to the top .
$('.top').click(function () {
    var action = $_GET('action');
    if(action === null) {
        var elem = $('header');
        $('html, body').animate({scrollTop: elem.offset().top}, 1000);
    }
    else{
        $(location).attr('href',"index.php");
    }
});


function $_GET(param) {
    var vars = {};
    window.location.href.replace( location.hash, '' ).replace(
        /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
        function( m, key, value ) { // callback
            vars[key] = value !== undefined ? value : '';
        }
    );
    if ( param ) {
        return vars[param] ? vars[param] : null;
    }
    return vars;
}
