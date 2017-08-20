var Contact = {

    sendLogin: function () {
        if($(document).find('.formContact')){
            Contact.sendEmail();
        }
        if($(document).find('.formLogin')){
            Contact.sendLogin();
        }
    },

    sendEmail : function () {
        $('.formContact').submit(function () {
            var action = $(this).attr('action');
            var name = $("#name").val();
            var email = $("#email").val();
            var object = $("#object").val();
            var mail = $("#mail").val();
            $(".messages").slideUp('800', function () {
                $('.buttonForm').hide().after('<i class="loader fa fa-circle-o-notch fa-spin fa-fw"></i><span class="loader sr-only">Loading...</span>');
                $.post(action, {
                    name: name,
                    email: email,
                    object: object,
                    mail: mail
                },function (data) {
                    $(".messages").html(data);
                    $(".messages").slideDown('slow');
                    $(".loader").fadeOut();
                    $(".buttonForm").fadeIn();
                });
            });
            return false;
        })
    },

    sendForm : function () {
        $('.formLogin').submit(function () {
            var action = $(this).attr('action');
            var login = $("#login").val();
            var password = $("#password").val();
            $("#messages").slideUp('800', function () {
                $('#button').hide().after('<i class="loader fa fa-circle-o-notch fa-spin fa-fw"></i><span class="loader sr-only">Loading...</span>');
                $.post(action, {
                    login: login,
                    password: password
                },function (data) {
                    $("#messages").html(data);
                    $("#messages").slideDown('slow');
                    $(".loader").fadeOut();
                    $("#button").fadeIn();
                });
            });
            return false;
        })
    }

}