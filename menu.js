var Menu = {

    menuHide: function () {
        $("#nav").hide();
        $("#menu").click(function () {
            $("#nav").toggle(1000);
            $(".empty").toggle(1000);
        });
    },

    hoverDiv: function () {
      $(".production").hover(function () {
          $(".info").fadeToggle(1000);
      })
    }

}