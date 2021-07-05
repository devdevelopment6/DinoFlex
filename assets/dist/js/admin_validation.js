$(document).ready(function(){
	$("#change_password_form").validate({
		rules : {
				current_password:{
					required:true,
				},
                new_password : {
					required:true,
                    minlength : 5
                },
                confirm_new_password : {
					required:true,
                    minlength : 5,
                    equalTo : "#new_password"
                }
            },
		});
	$("#edit_profile_form").validate({
		rules : {
				email_id:{
					required:true,
					email:true,
				},
                name : {
					required:true,
                },
                contact_number : {
					required:true,
                    minlength : 7,
					maxlength : 15,
                },
            }
		});
	$("#edit_color_frm").validate({
            rules:{
                color_name:{
                    required:true,
                },
                color_haxcode:{
                    required:true,
                }
            },
        });
		 $("form[name=add_user_frm]").validate({
   rules: {
	user_name: {
		required:true
	},
	email_id: {
      required: true,
      email: true,
	 remote: {
			   url: base_url+"users/check_email",
			   type: "post",
		 	   data: {
						email: function(){ return $("#email_id").val(); }
				}
			},
      //onkeyup: true
    },
	   mobile:{
		required:true
	},
  	password: {
      required: true,
      minlength: 5,
    },
	con_password: {
      required: true,
      minlength: 5,
	  equalTo: "#password"
    },	
	status:{
		required:true,
	},
  },
  messages: {
   user_name: {
		required:"A name  is required."
	},
	 email_id: {
      required: "An e-mail address is required.",
      email: "Please enter a valid e-mail address.",
	  remote:"Email Id Already Exist.",
    },
	mobile:{
		required:"An mobile no.  is required."
	},
	
    password: {
      required: "A Password is required.",
      minlength: "Password must be at least 5 characters in length."
    },
    con_password: {
      required: "A Confirm Password is required.",
      minlength: "Repeat Password must be at least 5 characters in length.",
	  equalTo:"Confirm Password must be same as above password",
    },
	status:{
		required:"Choose a status",
	},
 },
});
	 $("form[name=edit_user_frm]").validate({
   rules: {
	user_name: {
		required:true
	},
	email_id: {
      required: true,
      email: true,
	 remote: {
			   url: base_url+"users/check_email_edit",
			   type: "post",
		 	   data: {
						email: function(){ return $("#email_id").val(); },
				   		user_id:  function(){ return $("#user_id").val(); },
				}
			},
      //onkeyup: true
    },
	   mobile:{
		required:true
	},
  	password: {
      minlength: 5,
    },
	con_password: {
      minlength: 5,
	  equalTo: "#password"
    },	
	status:{
		required:true,
	},
  },
  messages: {
   user_name: {
		required:"An name  is required."
	},
	 email_id: {
      required: "An e-mail address is required.",
      email: "Please enter a valid e-mail address.",
	  remote:"Email Id Already Exist.",
    },
	mobile:{
		required:"An mobile no.  is required."
	},
	
    password: {
      minlength: "Password must be at least 5 characters in length."
    },
    con_password: {
      minlength: "Repeat Password must be at least 5 characters in length.",
	  equalTo:"Confirm Password must be same as above password",
    },
	status:{
		required:"Choose a status",
	},
 },
});
});
function validateImage(id) {
    var file = document.getElementById(id).files[0];
    var t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
		$("#"+id).addClass('error');
        $("#"+id+"-error").html('Please select a valid image file');
        document.getElementById(id).value = '';
        return false;
    }
    if (file.size > 1024000) {
		$("#"+id).addClass('error');
         $("#"+id+"-error").html('Max Upload size is 1MB only');
        document.getElementById(id).value = '';
        return false;
    }
	$("#"+id).removeClass('error');
	$("#"+id+"-error").html('');
    return true;
}