$(document).ready(function(){
    // Setup CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function ajaxRequest(options) {
        console.log(options)
        if(options.method == 'POST'){            
            options.data.append('_token', $('meta[name="csrf-token"]').attr('content'));
            options.data.append('_method', 'POST');
        }
        if(options.method == 'PUT' || options.method == 'PATCH'){
            options.data.append('_method', options.method);
            options.method = 'POST'; // Laravel requires POST for form data with _method
        }
        if(options.method == 'DELETE'){
            options.data = options.data || new FormData();
            options.data.append('_method', 'DELETE');
            options.method = 'POST';
        }
          $.ajax({
                url :options.url,
                type : options.method || 'POST',
                data : options.data || {},
                processData: options.processData ?? false,
                contentType: options.contentType ??  false,
                // beforeSend:function(){
                //     form.find('button[type="submit"]')
                //     .prop('disabled',true)
                //     .text('Please wait...');
                // },
                beforeSend:function(){
                    if(options.beforeSend){
                        options.beforeSend();
                    }
                },
                success:function(response){   
                    if(response.message){
                       toastr.success(response.message);
                    }
                    if(options.success){
                        options.success(response);
                    }
                    // if(respose.status){
                    //     toastr.success(respose.message);
                        if(response.redirect){
                           setTimeout(function(){ window.location.href = response.redirect},1000);
                        }
                    // }else{
                    //     toastr.error(respose.message);
                    // }
                },
                error:function(xhr){
                    if(xhr.status === 422){
                        // let errors = xhr.responseJSON.errors;
                        // $.each(errors,function(key,value){
                        //     form.find('.'+ key + '-error').html(value[0]);
                        // });
                        toastr.error(xhr.responseJSON.message || xhr.responseJSON.errors[Object.keys(xhr.responseJSON.errors)[0]][0]
                        .message);
                    }else{
                        toastr.error('Something went wrong');
                    }
                },
                complete:function(){
                    // form.find('button[type="submit"]')
                    //     .prop('disabled',false)
                    //     .text('Sumbit');
                    // }      
                    if (options.complete) {
                        options.complete();
                    }  
                }        
            });
    }

    $(document).on('submit','.ajax-form',function(e){
        e.preventDefault();
        let form = $(this);
        // let url = form.attr('action');
        // let formData = new FormData(this);
        // let redirect = form.data('redirect');
        form.find('.error').html();
            ajaxRequest({
                url : form.attr('action'),
                method : form.attr('method'),
                data : new FormData(this),
                form: form
            })
    });

    $('.data-show').each(function(){
        let element = $(this);
        ajaxRequest({            
            url: element.data('url'),
            success: function(response){
                if(response.status){
                    element.html(response.html);
                }
            },
            error: function(xhr){
                console.error('Error loading data:', xhr);
            }
        })
      
    });

   $(document).on('click', '#logout', function () {
        ajaxRequest({
            url :$(this).data('url'),
        })
    })
    $(document).on('click','.editRecord',function(){
       
        ajaxRequest({
            url: $(this).data('url'),
            method: 'GET',
            success: function(response){
                console.log(response);
                if(response.status){
                    $.each(response.data,function(key,value){
                        $('#editModal').find('[name="'+key+'"]').val(value);
                    })
                    $('#editModal').modal('show');
                }
            }
        })
    })

    $(document).on('click','.updateForm',function(){
          let button = $(this);
          let modal = button.closest('.modal');
          let form = modal.find('form');
          let id = form.find('#id').val();
          let baseUrl = form.data('url');
          
          console.log('Form found:', form.length);
          console.log('ID:', id);
          console.log('Base URL:', baseUrl);
          console.log('Name:', form.find('#name').val());
          console.log('Email:', form.find('#email').val());
          
          if(!id){
              toastr.error('User ID is missing');
              return;
          }
          
          if(!baseUrl){
              toastr.error('Form URL is missing');
              return;
          }
          
          let url = baseUrl + '/' + id;
          console.log('Final URL:', url);
          
          let formData = new FormData(form[0]);
          console.log('FormData entries:');
          for (let pair of formData.entries()) {
              console.log(pair[0] + ': ' + pair[1]);
          }
          
        ajaxRequest({
            url: url,
            method:"PUT",
            data: formData,
            form:form
        })
    })

});