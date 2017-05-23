$( document ).ready(function() {

    //Validation for login page

    $("#login_page").validate({
        rules: {

            username: {
                required: true,
                email: true,
            },
            password: {
                required: true,
            },



        },
        messages: {

            username: {
                        required: "Please enter username",
                        email: "Please enter correct email"
                        },
            password: "Please enter password",

        },


    });


});
