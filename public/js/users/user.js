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
                        confirmButtonText: 'OK'
                    }).then((result) => {
                      if (result.isConfirmed) {
                      window.location.href ="http://127.0.0.1:8000/users";
                      }
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


            //delete
             
     $('.delete_confirm').click(function(event) {
      var form =  $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      Swal.fire({
          title: `Are you sure you want to delete this record?`,
          text: "",
          icon: "warning",
          showCancelButton: false,
          showDenyButton: true,
          confirmButtonText: 'Yes',
          denyButtonText: 'Cancel',
          dangerMode: true,
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
          Swal.fire(
            'Deleted!',
            'Record has been deleted.',
            'successfully'
          )

        }
        else if (result.isDenied) {
          result.dismiss === Swal.DismissReason.cancel
          return false;
        }
      });
  });
  setTimeout(function() {

    // Do something after 3 seconds
    // This can be direct code, or call to some other function

$('.alert').hide();

   }, 3000);

   //show image profile

$('.img-profile').click(function(event) {

  var profile_src = $('.img-profile').attr('src');
  var imgfile= `<img src='${profile_src}' style='width:300px;height:300px;' id='img_profile'>`;
  console.log(imgfile);
  Swal.fire({
    title: 'Profile',
    text: '',
    html: `<img src='${profile_src}' style='width:100%;' id='img_profile'>`,
    imageAlt: 'Profile',
  })
 

});

    
          });

   
    