<div class="container" id="next_home_hide">
  <div class="main-wapper custpage1resc1">
    <!--======== Mid Containmer ========-->
    <div class="mid-conttainer">
      <div class="row">
        <!-- Indor Out Door -->
        <div class="col-xs-12 col-sm-12 col-md-12  col-lg-12">
           <p>Welcome to Dinoflex's newest digital do-it-yourself method of designing your very own custom color scheme. 
The Color Innovator uses a simple, yet innovative process divided into three steps; pick your colors, choose the ratios, and mix! 
You have 40 diverse colors to choose from and engineer into your own personal swatch. 
The final sample can be saved digitally via email, or can be made into a sample tile, which we can take into production afterwards</p>
      <div class="slogan">
           <h2><?php echo "GET STARTED"; ?></h2> 
          </div>
        </div>
<?php
  if ($this->session->userdata('logedin_user') == "") {
 ?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <div class="loginregiter" style="text-align: center;">
            <a  class="loginreg" href="<?php echo base_url(); ?>index.php/home/login">
              
              <span>Login</span>
            </a>

            <a  class="loginreg" href="<?php echo base_url(); ?>index.php/home/reg">
              
              <span>Register</span>
            </a>
          </div>
        </div>

        <?php }else{ ?>

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <div class="loginregiter" style="text-align: center;">
            <button class="btn btn-sm btn-info next_home" id="next_home">Next</button>

            
          </div>
        </div>
<?php }?>
      </div>
    </div>
    
    <!--<div class="step-links" type="hidden">      
        <a class="btn right rightcss go_to_step2" href="#">NEXT</a>
    </div>-->
  </div>
</div>
<style type="text/css">

.loginreg  {
    display: inline-block;
    color: #0c4d7d;
    min-width: 200px;
    /* min-height: 200px; */
    vertical-align: top;
    padding-top: 25px;
    margin: 0 15px;
    cursor: pointer;
    background: #ecc847;
     padding: 20px;
}


</style>