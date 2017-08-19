var Contact = {

    sendEmail : function () {
            $(".form").submit(function () {
                var action = $(this).attr('action');
                var name = $("#name").val();
                var email = $("#email").val();
                var object = $("#object").val();
                var mail = $("#mail").val();

                $("#messages").slideUp('800', function () {
                    $('.buttonContact').hide().after('<i class="loader fa fa-circle-o-notch fa-spin fa-fw"></i><span class="loader sr-only">Loading...</span>');
                    $.post(action, {
                        name: name,
                        email: email,
                        object: object,
                        mail: mail
                    },function (data) {
                        $("#messages").html(data);
                        $("#messages").slideDown('slow');
                        $(".loader").fadeOut();
                        $('.buttonContact').fadeIn();
                    });
                });
                return false;
            })

    }

}