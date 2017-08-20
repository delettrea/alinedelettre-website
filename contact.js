var Contact = {

    form: '',

    sendEmail : function (action) {
            Contact.editVariables();
            $(Contact.form).submit(function () {
                var action = $(this).attr('action');
                $("#messages").slideUp('800', function () {
                    $('.buttonForm').hide().after('<i class="loader fa fa-circle-o-notch fa-spin fa-fw"></i><span class="loader sr-only">Loading...</span>');
                    $.post(action, {
                        name: name,
                        email: email,
                        object: object,
                        mail: mail,
                        login: login,
                        password: password
                    },function (data) {
                        $("#messages").html(data);
                        $("#messages").slideDown('slow');
                        $(".loader").fadeOut();
                        $(".buttonForm").fadeIn();
                    });
                });
                return false;
            })
        },

    editVariables : function(){
        if($(document).find('.formContact')){
            Contact.form = '.formContact';
            var name = $("#name").val();
            var email = $("#email").val();
            var object = $("#object").val();
            var mail = $("#mail").val()
        }
        else if($(document).find('.formLogin')){
            Contact.form = '.formLogin';
            var login = $("#login").val();
            var password = $("#password").val();
        }
    }

}