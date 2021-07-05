<style type="text/css">
	
    .form-control{
		padding:2rem 1.75rem !important;
	}
    .lds-ellipsis {
      display: inline-block;
      position: relative;
      width: 64px;
      height: 64px;
    }
    .lds-ellipsis div {
      position: absolute;
      top: 27px;
      width: 11px;
      height: 11px;
      border-radius: 50%;
      background: #cef;
      animation-timing-function: cubic-bezier(0, 1, 1, 0);
    }
    .lds-ellipsis div:nth-child(1) {
      left: 6px;
      animation: lds-ellipsis1 0.6s infinite;
    }
    .lds-ellipsis div:nth-child(2) {
      left: 6px;
      animation: lds-ellipsis2 0.6s infinite;
    }
    .lds-ellipsis div:nth-child(3) {
      left: 26px;
      animation: lds-ellipsis2 0.6s infinite;
    }
    .lds-ellipsis div:nth-child(4) {
      left: 45px;
      animation: lds-ellipsis3 0.6s infinite;
    }
    @keyframes lds-ellipsis1 {
      0% {
      transform: scale(0);
      }
      100% {
      transform: scale(1);
      }
    }
    @keyframes lds-ellipsis3 {
      0% {
      transform: scale(1);
      }
      100% {
      transform: scale(0);
      }
    }
    @keyframes lds-ellipsis2 {
      0% {
      transform: translate(0, 0);
      }
      100% {
      transform: translate(19px, 0);
      }

</style>

<div class="row" style="background-color:#404040;">
    <div class="container formspace">
      <div class="row formreview mt-5 mb-5">
        <div class="col-sm-12 col-xl-12 col-lg-12 col-md-12 spaceview request_frm">
          <div class="row">
            <div class="col-sm-12 ">
				<div class="tab-content ">
					<div id="order_sample_req">
                    		<div class="row">
						        <div class="container p-3 text-center mt-5 w-100 text-white">
						            <h1 class="mb-3"><?php echo $contents['title'];?></h1>
						            <h2><a href="<?php echo base_url(); ?>products">View all our Products</a></h2>
						        </div>
						    </div>
						    <div class="row">
						      <div class="col-md-8 m-auto">
								<form id="search_form" name="search_form" method="post" action="">
			                        <div class="form-group">
			                        	<label class="login_error error" ></label>
			                        </div>

									<div class=" col-12 col-lg-12 col-xl-12 col-md-12 col-sm-12">
										<div class="form-group">
											<input type="text" class="form-control m-auto mt-xl-3" id="search_text" placeholder="Search" name="search_text" value="">
										</div>
									</div>
									<div class="col-12 col-lg-12 col-xl-12 col-md-12 col-sm-12 mt-5 mb-5">

										<div class="bighover d-block mx-auto req_btn_width" role="group" aria-label="Third group"> 
											<a class=" buttons">
												<button type="submit" class="draw meet button-big show_cursor">Search</button>
											</a>
											<div class="bighide draw meet"> 
												<a>
													<div class="progress container btn-anm"> 
														                           <span class="mr-1" style="background-color:#7F7F7F !important;"></span>
                            <span class="mr-1" style="background-color:#e5ca3a !important;"></span>
                           <span class="mr-1" style="background-color:#414040 !important;"></span> 
                           <span class="mr-1" style="background-color:#7F7F7F !important;"></span> 
                           <span class="mr-1" style="background-color:#e5ca3a !important;"></span>
													</div>
												</a> 
											</div>
										</div>
									</div>
<input id="csrf_token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								</form>
							   </div>
								
		                      	<div class="col-md-8 m-auto">
		                    	  <div class="lds-ellipsis m-auto" style="display: none;">
		                    	  	<div></div><div></div><div></div><div></div>
		                    	  </div>
		                    	</div>
							</div>
						</div>
				</div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="container">
<div class="row">
<div class="col-md-12 m-auto display_search_section" style="display: none;">
								   	
								</div>
</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {

		$('#search_form').submit(function(e) {
		     e.preventDefault();
		  }).validate({
		       rules: {
		            search_text: {
		              required: true,
		             }, 
		            },
		            messages: {
		              search_text: 'Please enter your Search Text.',
		            },
		      submitHandler: function(form) {
		      	$('.lds-ellipsis').css('display','block');
		        var form = $(form).serialize();
		         $.ajax({
		              url: "https://dinoflex.com/search/start_searching",
		              type: 'POST',
		              dataType: 'json',
		              data: {'form':form,'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
		              success: function(response) {
		                  $('.display_search_section').css('display','inline');
						  $(".display_search_section").html(response);
		                  setTimeout(function(){ $('.lds-ellipsis').fadeOut(); }, 1000);
		                  
		              }            
		          });
		      }
		});
	});

</script>
