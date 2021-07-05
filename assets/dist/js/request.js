 $(document).ready(function(){
        
         $(".show_cursor").click(function(){
            
        $captcha = $( '#recaptcha' );
        response = grecaptcha.getResponse();

          if (response.length === 0) {
            $( '#g-recaptcha-response-error').text( "Please verify Recaptcha" );
            if( !$captcha.hasClass( "error" ) ){
              $captcha.addClass( "error" );
            }
          } 
          else {
            $( '#g-recaptcha-response-error' ).text('');
            $captcha.removeClass( "error" );
            // form submit return true
            
            
            
            /*	if($("#sample_form").valid()){
        				$("#sample_form").submit();
        				 return true;
        			}*/
           	
          }
    
    	
    
    	}); 
        
        
      $("#sample_form").submit(function(e){
  	 e.preventDefault();
			  }).validate({
			   rules:{
				   current_project:{
					 required:true,
					},
					 future_project:{
					 required:true,
					},
					 square_footage:{
					 required:true,
					 number:true,	 
					},
					 other_products:{
					 required:true,
					},
					name:{
					 required:true,
					},
					address:{
					 required:true,
					},
					city:{
					 required:true,
					},
					state:{
					 required:true,
					},
					postal:{
					 required:true,
					},
					email:{
					 required:true,
					 email:true,
					},
					phone:{
					 required:true,
					},
				    "g-recaptcha-response": {
                required: function() {
                    if (grecaptcha.getResponse() == '') {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
				
			   },
			   messages:{
				   current_project:{
					 required:"Current Project is Required",
					},
					 future_project:{
					 required:"Future Project is Required",
					},
					square_footage:{
					 required:"Square Footage of Project is Required",
					 number: "Please Enter Digits only"	
					},
					other_products:{
					 required:"Other Product is Required",
					},
					name:{
					 required:"Name is Required",
					},
					address:{
					 required:"Address is Required",
					},
					city:{
					 required:"City is Required",
					},
					state:{
					 required:"State is Required",
					},
					postal:{
					 required:"Postal / Zip is Required",
					},
					email:{
					 required:"Insert an email id",
					 email:"Insert valid Email id",
					},
					phone:{
					 required:"Phone Number is Required",
					}
				  
			   },
			   submitHandler:function(form){
			       
			       
			       $captcha = $( '#recaptcha' );
        response = grecaptcha.getResponse();
        
            
            if (response.length === 0) {
            $( '#g-recaptcha-response-error').text( "Please verify Recaptcha" );
            if( !$captcha.hasClass( "error" ) ){
              $captcha.addClass( "error" );
            }
          } 
          else {
            $( '#g-recaptcha-response-error' ).text('');
            $captcha.removeClass( "error" );
            // form submit return true
           
					
				    //var form = $('#sample_form');
					$.ajax({
					 url:'https://dinoflex.com/request/request_sample',
					 type:"POST",
					 data: $('#sample_form').serialize(),
					 success:function(res){
						console.log(res);
					  if(res==true){
						 	
					   $.alert({
								title: '',
								content: 'Your sample request has been submitted successfully !',
								type: 'blue',
								boxWidth: '300px',
								useBootstrap: true,
								typeAnimated: false,
							});
						  location.reload();
						 
						   
					  }
					  else{
						  
					   $.alert({
								title: 'Oops!!',
								content: 'Some Error occured.. Please Try Again !',
								type: 'red',
								boxWidth: '300px',
								useBootstrap: true,
								typeAnimated: false,
							});
					  }
					 },
				
					});
					
					
			   }
				   },
				  });
    });