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
          
                $.ajax({
                  url:"/users/add_user",
                  type:"POST",
                  data:data,                  
                  dataType:'json',
                  processData: false,
                  contentType: false,
                  success:function(response){
                     console.log(response);
                      alert('success');
                      window.location.href ="http://localhost:9000/users";
                   },

                  error: function(error) {
                   alert('Error failed!');
                   console.log(error);
               
                  },
                 });
            });
    
          });
    
   
    