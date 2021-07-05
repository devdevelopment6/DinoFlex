<div class="row">
	<div class="container-fluid footer-bg">
		<div class="container pt-5 pb-5">
			<div class="row">
				<div class="col-xl-4">
					<h3>Quick Links</h3>
					<ul >
					<li><a href="<?php echo base_url(); ?>color_finder/index/13" class="font18" title="Color Finder">Find Your Color</a></li>
						<li><a href="http://madmimi.com/signups/f1484eca39e74246b730960818c9da1a/join" target="_blank" class="font18" title="Subscribe">Subscribe to Our Mailing List</a></li>

					</ul>
				</div>
				

				<div class="col-xl-4">
					<div class="pb-1"><a href="#" class="green-link"><h3>Newsletter Signup</h3></a></div>
				<form id="newsletterForm"> 
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

						<div class="row">
				    <div class="col-sm-10" >
				      <input type="text" name="yurEmail" id="yurEmail" class="form-control required email" placeholder="Email" required="">

				    </div>
				    <div class="col-sm-2 text-xl-left" style="padding:0px">
				      <input type="submit"class="" style="background:#fff; color:#d7b435 ; padding: 5px; border: solid 1px #d7b435;border-radius: 3px;width: 50px;" id="newsletter" value="Go" >
				    </div>
				  	</div>
				</form>  	
				<p id="errortext" style="display:none; font-size: 14px; color: red;">Please Enter Email Id. </p>
				<p id="errortextEmail" style="display:none; font-size: 14px; color: red;">Invalid Email. </p>

					<p id="showtext" style="display:none; font-size: 14px; color: green;">Thank you You have successfully <br>signed up for our newsletter </p>

	          <!-- <p style="font-size: 14px;margin-top: 10px;">And don't worry, we don't love spam either! <br>You can unsubscribe at anytime.</p> -->

	          <p style="margin-top: 10px;">
	          	<a href="<?php echo base_url();?>monthlynewsletter" class="font16" title="Subscribe">Archive Newsletter</a>
	          </p>
				</div>

		
          <div class="col-xl-4 text-xl-right">
          	<div class="pb-1 "><a href="<?php echo base_url()?>Resources" class="green-link">
          		<h3 style="padding-right: 17px;">Technical Information</h3></a></div>
							<div class="text-xl-center" style="padding-left: 50px;">
								<img src="<?php echo base_url();?>frontside/images/scs-logo.png" class="mr-2" alt="SCS Logo">
								<img src="<?php echo base_url();?>frontside/images/cgbc-logo.png" class="mr-2" alt="CGBC Logo">
								<img src="<?php echo base_url();?>frontside/images/recycled-rubber-floor-logo.png" class="mr-2" alt="Recycled Rubber Floor Logo">
								<img src="<?php echo base_url();?>frontside/images/usgbc-logo.png" class="mr-2" alt="USGBC Logo"> 
							</div>
							<p></p>
					<div class="pb-1 text-xl-center">
					<h3 style="padding-right: 70px;">Follow Us</h3>
					
                        <a href="<?php echo $contacts['twitter_link'];?>" class="fa fa-twitter fa-bg" target="_blank" title="Twitter"></a>
                        <a href="<?php echo $contacts['fb_link'];?>" class="fa fa-facebook fa-bg" target="_blank" title="Facebook"></a>
                        <a href="<?php echo $contacts['pinterest_link'];?>" class="fa fa-instagram fa-bg" target="_blank" title="Instagram"></a> 
                        <a href="<?php echo $contacts['linkedin_link'];?>" class="fa fa-linkedin fa-bg" target="_blank" title="LinkedIn"></a>
                        <p></p>
          </div>              
          	
						

        </div>          
				<div class="col-xl-12 pt-4 float-right">
					<p class="text-center font18">&copy; <?php echo date('Y'); ?>. Dinoflex Recycled Rubber Reimagined. All rights reserved.<br/> Built by theOneCo and Powered by <a href="https://www.ciprcommunications.com/"><span class="yellowcolor">CIPR Communications </span></a> 
					</p>
					<!-- <p class="text-center font18">&copy; <?php echo date('Y'); ?>. Dinoflex Recycled Rubber Reimagined. All rights reserved.<br/>Complete Convergent Communication provided by <a href="http://theoneco.com/" target="_blank" title="theONEco">theONEco</a></p> -->
				</div>
			</div>
		</div>
	</div>
	<a href="javascript:" id="return-to-top"><i class="fa fa-arrow-up" style="background: none;"></i></a>
</div>
</div>
<!--container end-->
</div> 
 	<div class="loading" id="custloading">
		<div class="row" style="display: block;">
      	<center>
          <div class="loader_div">
              <img src="<?php echo base_url();?>frontside/preloader/preload.gif">
          </div>
      	</center>
		</div>
  	</div>   


   

	<script src="<?php echo base_url();?>assets/dist/js/home_custome.js"></script>
	
	
	
	<script src="<?php echo base_url();?>assets/dist/js/common.js"></script>

<script type="text/javascript">

function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
           return false;
        }else{
           return true;
        }
      }


/// ajax post request
    $(document).ready(function () {

        $("#newsletter").click(function(e) {
            e.preventDefault();
          var email = $("#yurEmail").val(); 

          if($("#yurEmail").val() == 0 ){          	
          	$("#errortext").show();
						$("#errortext").delay(2000).fadeOut();
						return false;					
          }
          if(IsEmail(email)==false){
                $('#errortextEmail').show();
                $("#errortextEmail").delay(2000).fadeOut();
                return false;
            }

          var post_url =  "<?php echo base_url(); ?>home/newsletter_signup/";
            $.ajax({
                type: "POST",
                url: post_url,
                data : {"email" : email},
                dataType: "json",
                success: function (data) {
                    //console.log(data);
                    $("#newsletterForm")[0].reset();
                    $("#showtext").show();
										$("#showtext").delay(5000).fadeOut();
                }
            });
         // }  

        });

    });
	</script>

</body>
</html>
