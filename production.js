var Production = {

    $number: 5,

    seeInformation: function () {
        this.seeInformationTest(1);
        this.seeInformationTest(2);
        this.seeInformationTest(3);
        this.seeInformationTest(4);
        this.seeInformationTest(5);
        this.seeInformationTest(6);
    },

    seeInformationTest: function ($number) {
        $("#P"+$number).hover(function () {
            $(".P"+$number).slideToggle();
        });
    }

}