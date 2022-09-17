$(document).ready(function(){
    $("#signin_frm").validate({
    ignore: [],
      rules: {
        email: {
          required: true,
          email: true
        },
        password: "required",
    },
      messages: {
        password: {
        required: "Please enter password",
       },      
       email: {
        required: "Please enter email address",
        email: "Please enter a valid email address.",
       },
      },
    
    });
  });