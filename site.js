// function for see production's filter.





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
                    document.location.href = 'index.php';
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


// function for hide product description
function seeProduct($number) {
    $("#P"+$number).hover(function () {
        $(".P"+$number).slideToggle();
    })}

