$('#edit_profile').validate({
    ignore: [],
    rules: {
        name: "required",
        company_name: "required",
        email: {
            required: true,
            email: true
        },
    },
    messages: {
        company_name: {
         required: "Please enter company name",
        },
        name: {
            required: "Please enter company name",
           },
        email: {
         required: "Please enter email address",
         email: "Please enter a valid email address.",
        },
    },
    
}); 