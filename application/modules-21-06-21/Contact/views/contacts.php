  <div class="row">
    <div class="container-fluid bg-contact-top-content" style="background:linear-gradient(rgba(20, 20, 20, 0.4),rgba(20, 20, 20, 0.4)),url('./../uploads/contacts/<?php echo $contacts['banner_image'];?>');background-size: cover;">
      <div class="row">
        <div class="container">
          <div class="row">
            <div class="col-sm-9 text-left pb-5">
              <h1 class="carousel-txt-h carousel-txt-h-product white-txt"><?php echo $contacts['header_title'];?></h1>
              <div class="white-txt pb-5 "><?php echo $contacts['header_content'];?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="container pt-5 pb-5">
      <div class="row">
        <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6">
         <div class="row">
            <div class="col-sm-12">
              <h4>Contact Us</h4>
              <address>
                <strong>Toll Free : </strong> <a href="tel:<?php echo $contacts['toll_free_contact'];?>"><?php echo $contacts['toll_free_contact'];?></a><br>
                <strong>Direct : </strong> <a href="tel:<?php echo $contacts['direct_contact'];?>"><?php echo $contacts['direct_contact'];?></a> <br>
                <strong>Fax Toll Free : </strong> <?php echo $contacts['fax_toll_free'];?> <br>
                <strong>Fax Direct : </strong> <?php echo $contacts['fax_direct_contacat'];?>
              </address>
			  <address>
				<strong>Mailing Address:</strong><br/><?php echo $contacts['address'];?>
				<br/><br/>
			<strong>Email (Sales and General Inquiries) : </strong> <a href="mailto:<?php echo $contacts['email'];?>" target="_blank"><?php echo $contacts['email'];?></a><br>
			  </address>
			  
            </div>
			
			<div class="col-sm-12">
			<h4><?php echo $contacts['content_title']; ?></h4>
			<?php echo $contacts['content']; ?><br/><br/>
            </div>

          </div>
          <div class="row">
            <div class="col-sm-12">
              
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-xl-6 col-lg-6 col-md-6">
        <div class="row">
            <div class="col-sm-12">
			<?php if(!empty($this->session->flashdata('success'))){echo '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>';}?>
		  <form method="post" class="w-100" id="custom-form" action="<?php echo base_url();?>contact/add-contact-details">
                <div class="form-group">
                  <label for="name"><strong>Name : </strong></label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="subject"><strong>Subject : </strong></label>
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                </div>
                <div class="form-group">
                  <label for="email"><strong>Email : </strong></label>
                  <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="number"><strong>Phone Number : </strong></label>
                  <input type="text" class="form-control" name="number" id="number" placeholder="Phone Number">
                </div>
                <div class="form-group">
                  <label for="comment"><strong>Message : </strong></label>
                  <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                </div>
                <!--<div class="col-xl-12 text-left pl-0">
                  <div class="btn-group-lg" role="group" aria-label="Third group">
                   <button type="submit" class="btn btn-secondary">
                    <img src="<?php echo base_url();?>uploads/home_slide/dinoflex-button-icon.svg" class="btn-icon-w pr-1"><a href="#" class="text-blink"></a>Submit
                    </button>
                  </div>
				</div>-->
				
			<?php //$site_key = $this->config->item('recaptcha_site_key'); ?>
                
               <!--  <div class="form-group captcha-container">
                                                    <div class="g-recaptcha" id="RecaptchaField1"
                                                         data-sitekey="6LcvQdYZAAAAAIjvMDvz-i1ZqgtfkMXWPUzBfF8j">
                                                    </div>
                                               

                                                <span id="g-recaptcha-response-error" class="error"
                                                       for="g-recaptcha-response"></span>
										
											</div> -->
											
											
								
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
			
				
				 <div class="submithover float-left" role="group" aria-label="Third group"> 
					<a href="#" class="buttons">
						<button class="draw meet show_cursor">Submit</button>
					</a>
					<div class="submithide draw meet "> 
						<a href="#">
							<div class="progress container submit-btn-move"> 
								 <span class="mr-1" style="background-color:#7F7F7F !important;"></span>
                            <span class="mr-1" style="background-color:#e5ca3a !important;"></span>
                           <span class="mr-1" style="background-color:#414040 !important;"></span> 
                           <span class="mr-1" style="background-color:#7F7F7F !important;"></span> 
                           <span class="mr-1" style="background-color:#e5ca3a !important;"></span>
							</div>
						</a> 
					</div>
				</div>
              </form>            
         </div>
		 </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row pb-2">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2528.9435853464656!2d-119.22268204828997!3d50.66530797940503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x537e8b294b86baff%3A0xb631c67dfd24123a!2sDinoflex+Group+Ltd+Partnership!5e0!3m2!1sen!2sca!4v1515692307002" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen=""></iframe>
  </div>
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
 <!-- <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>-->
 <!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>-->
  
 <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.js"></script>-->
 
 
 <script src="https://www.google.com/recaptcha/api.js"></script>

    

  
