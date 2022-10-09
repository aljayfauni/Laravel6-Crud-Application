$(function () {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
            $("#add_form").on('submit',function(e){
    
     
    
                e.preventDefault();
       
   
               var data = new FormData(this);
                    
                //  let fname = $("input[name=fname]").val();
                // let lname = $("input[name=lname]").val();
                // let email = $("input[name=email]").val();
                // let password = $("input[name=password]").val();
                // let bday = $("input[name=bday]").val();
                // let profile = $("input[name=profile]").val();
                // let _token   = $('meta[name="csrf-token"]').attr('content');
                Swal.fire({
                  icon: 'warning',
                    title: 'Are you sure you want to Add new Record?',
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: 'Yes'
                }).then((result) => {
                  if (result.isConfirmed) {

                 
                $.ajax({
                  url:"/users/add_user",
                  type:"POST",
                  data:data,                  
                  dataType:'json',
                  processData: false,
                  contentType: false,
                  success:function(response){
                     console.log(response);
                     Swal.fire({//alert success
                      icon: 'success',
                        title: response,
                        showDenyButton: false,
                        showCancelButton: false,
                        confirmButtonText: 'Yes'
                    }).then((result) => {
                      window.location.href ="http://127.0.0.1:8000/users";
                    });
                
                   },

                  error: function(error) {
                   alert('Error failed!');
                   console.log(error);
               
                  },
                 });
                }
              });//end of swal
            });
    
          });
    
   
    