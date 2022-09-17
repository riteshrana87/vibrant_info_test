$('#add_holiday_page').validate({
    ignore: [],
    rules: {
        title: "required",
        holiday_date: "required",
    },
    messages: {
        title: {
        required: "Please enter title",
       },
       holiday_date: {
        required: "Please enter holiday date",
       },      
    },
    
});
$('#edit_form').validate({
    ignore: [],
    rules: {
        title: "required",
        holiday_date: "required",
    },
    messages: {
        title: {
            required: "Please enter title",
        },
        holiday_date: {
            required: "Please enter holiday date",
        }, 
    },
    
}); 



  $(document).ready(function() {
    $( function() {
        $( "#datepicker" ).datepicker();
      } );
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
    var Url = baseurl+'/admin/delete_holiday/'+id;	
    window.location.href = Url;
  } else {

  }
});
}