$(document).ready(function(){
    $("#sign_up_frm").validate({
    ignore: [],
      rules: {
        email: {
          required: true,
          minlength: 8,
          email: true
        },
        password: {
					required: true,
					minlength : 8,
				},
				confirm_password: {
					required: true,
					minlength : 8,
					equalTo : '#password'
				}      
    },
      messages: {
       password: {
        required:	"Please enter password.",
        minlength:	"password minimum legnth should be 8 character.",
      },
      confirm_password: {
        required:	"Please enter confirm password.",
        minlength:	"confirm password minimum legnth should be 8 character.",
        equalTo: "Your password and confirm password does not match."
      },

       email: {
        required: "Please enter email address",
        email: "Please enter a valid email address.",
       },
      },
    
    });
  });