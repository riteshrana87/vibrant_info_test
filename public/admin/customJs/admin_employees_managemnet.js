        $('#add_employees_page').validate({
                ignore: [],
                rules: {
                    name: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    password: "required",
                    confirm_password: "required",
                    confirm_password: {
                        required: true,
                        equalTo: "#password"
                    }
                },
                messages: {
                   name: {
                    required: "Please enter name",
                   },
                   email: {
                    required: "Please enter email address",
                    email: "Please enter a valid email address.",
                   },
                   password: {
                    required: "Please enter password",
                   },      
                   confirm_password: {
                        required: "Please enter confirm password",
                        equalTo : "The password confirmation and password must match.",
                   },       
                },
                
            });
        $('#edit_form').validate({
                ignore: [],
                rules: {
                    name: "required",
                    email: {
                        required: true,
                        email: true
                    },
                },
                messages: {
                    company_name: {
                     required: "Please enter name",
                    },
                    email: {
                     required: "Please enter email address",
                     email: "Please enter a valid email address.",
                    },
                },
                
            }); 


    function deleteClient(id){
        swal({
            title: "Are you sure you want to delete ?",
            text: "",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#07689f",
              confirmButtonText: "Yes",
              cancelButtonText: "No",
              closeOnConfirm: true,
              closeOnCancel: true
            },
            function(isConfirm){
              if (isConfirm) {
                var Url = baseurl+'/admin/delete_employees/'+id;	
                window.location.href = Url;
              } else {

              }
            });
    }