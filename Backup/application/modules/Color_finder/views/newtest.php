<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-lightbox/0.2.12/slick-lightbox.css" rel="stylesheet" />

<style type="text/css">
    html, body {
      margin: 0;
      padding: 0;
    }

    * {
      box-sizing: border-box;
    }

    .slick-prev:after,
    .slick-next:after {
      color: black;
    }

    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: 1;
    }
    .slick-prev:before, 
    .slick-next:before {
      background:  #191616;
      color: #191616;

    }
    .slick-prev:before, .slick-next:before{
      font-size: 30px !important;
      color: #556C11 !important;
      background: none !important;
    }
    
    .slick-prev, .slick-next
    {
      box-shadow: unset;
    }
    
    /*.slick-next {
      right: 0px !important;
    }*/
    .display_cursor{
      cursor:pointer; 
    }
    .regular{
      display:none; 
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
}


  </style>
 
  <div class="row">
    <div class="container-fluid p-0">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <?php if($sliders != '') { 
      $i = 1;
      foreach($sliders as $slider) { ?>
          <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php ($i == 1)?'active':'';?>"></li>
          
          <?php $i++; } } ?>
        </ol>
        
        <div class="carousel-inner">
        
        <?php if($sliders != '') { 
      $i = 1;
      foreach($sliders as $slider) { ?>
        
           <div class="carousel-item <?php echo ($i == 1)?'active':'';?>">

           <img class="d-block w-100" src="<?php echo base_url();?>uploads/color_finder_sliders/<?php echo $slider['slider_image']; ?>" alt="<?php echo $slider['title']; ?> Image">
                <div class="carousel-caption">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-10 col-sm-6 float-left d-flex align-items-end flex-column">
                   <h1 class="carousel-txt-h"><?php echo $slider['title']; ?></h1>
                    <?php /*?> <img src="<?php echo base_url();?>uploads/product_category_sliders/<?php echo $slider['middle_image']; ?>" width="40" height="36"><br>
                    <p class="carousel-txt"><?php echo $slider['title_2']; ?></p><?php */?>
                    <div class="col-xl-12 col-10 align-btn ml-0">
                     </div>
                  </div>
                </div>
              </div>
      
        <?php if($i == count($sliders))
      {
        $i = 1; 
      } else {
        $i++; 
      }
     } } ?>
          
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
    </div>
  </div>
  
     
      <div class="row">
        <div class="container p-3 text-center mt-5 pb-3 w-100">
          <p>
            <?php echo $contents['content']; ?>
          </p>
        </div>
      </div>

      <div class="row">
        <div class="container p-3 text-center pb-5 w-100">
          <div class="row">
              <div class="col-md-12 col-xs-12 col-sm-12 col-xl-12 col-lg-12">
               <!-- <div class="col-md-8 col-sm-12 col-xs-12 col-lg-10 col-xl-8 m-auto">-->
                <form name="search_swatch_frm" id="search_swatch_frm" method="post">

                  <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-xl-12 mb-3 cf_display_inline">

                    <div class="col-md-6 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-0 mt-3">

                      <div class="form-group text-left col-lg-12 col-xl-12 col-md-12 col-sm-12 responsivespace">
                    <label class="left txt"><b>Search By:</b></label>
                  </div>

                      <div class="form-group text-left col-lg-12 col-xl-12 col-md-12 col-sm-12 responsivespace cf_display_inline_radio_btn" style="float: left;">
                        <div class="mr-3">
                          <input type="radio" name="search_category" id="color" value="color" checked="checked">
                          <label for="Color" class="txt">Color</label><br/>
                        </div>

                        <div class="mr-3">
                          <input type="radio" name="search_category" id="name" value="name">
                          <label for="Name" class="txt">Name</label><br/>
                        </div>

                        <div class="mr-3">
                          <input type="radio" name="search_category" id="code" value="code">
                          <label for="Code" class="txt">Code</label><br/>
                        </div>
                    </div>
                    </div>

                  

                    <div class="col-md-6 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-0 mt-3">
                      <div class="form-group text-left col-lg-12 col-xl-12 col-md-12 col-sm-12 responsivespace">
                    <label class="left txt"><b>Search:</b></label>
                  </div>

                      <div class="form-group text-left col-lg-12 col-xl-12 col-md-12 col-sm-12">
                        <!--<label for="search_text"><b>Search:</b></label>-->
                        <input type="text" class="form-control txt" id="search_text" placeholder="Search" name="search_text" value="" >
                      </div>
                    </div>
                  </div>

                  <!--<div class="form-group text-left col-lg-12 col-xl-12 col-md-12 col-sm-12 responsivespace">
                    <label class="left txt"><b>Search By:</b></label>
                  </div>
                    <div class="form-group text-left col-lg-6 col-xl-6 col-md-6 col-sm-12 responsivespace cf_display_inline_radio_btn" style="float: left;">
                      <div class="mr-3">
                        <input type="radio" name="search_category" id="color" value="color" checked="checked">
                        <label for="Color" class="txt">Color</label><br/>
                      </div>

                      <div class="mr-3">
                        <input type="radio" name="search_category" id="name" value="name">
                        <label for="Name" class="txt">Name</label><br/>
                      </div>

                      <div class="mr-3">
                        <input type="radio" name="search_category" id="code" value="code">
                        <label for="Code" class="txt">Code</label><br/>
                      </div>
                  </div>

                  <div class="form-group text-left col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    
                    <input type="text" class="form-control col-lg-6 col-xl-6 col-md-6 col-sm-12 txt" id="search_text" placeholder="Search" name="search_text" value="" >
                  </div> -->

                  <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-xl-12 mb-3 cf_display_inline_btns">

                    <div class="col-md-6 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-0 mt-3">
                      <div class="btn-group-lg text-left requesthover" role="group" aria-label="Third group"> 
                        <a href="#" class=" buttons">
                          <button type="submit" class="draw meet button-big show_cursor">Find Your Color</button>
                        </a>
                        <div class="requesthide draw meet"> 
                          <a>
                            <div class="progress container btn-request-move"> 
                               <span class="mr-1" style="background-color:#003e70 !important;"></span>
                                <span class="mr-1" style="background-color:#e5ca3a !important;"></span>
                               <span class="mr-1" style="background-color:#556c11 !important;"></span> 
                               <span class="mr-1" style="background-color:#003e70 !important;"></span> 
                               <span class="mr-1" style="background-color:#003e70 !important;"></span>
                            </div>
                          </a> 
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-0 mt-3">
                      <div class="btn-group-lg text-left requesthover display_swatch cf_float_right" role="group" aria-label="Third group"> 
                        <a class=" buttons">
                          <button type="button" id="view_all_swatch_btn" class="draw meet button-big show_cursor">View All</button>
                        </a>
                        <div class="requesthide draw meet"> 
                          <a>
                            <div class="progress container btn-request-move"> 
                               <span class="mr-1" style="background-color:#003e70 !important;"></span>
                                <span class="mr-1" style="background-color:#e5ca3a !important;"></span>
                               <span class="mr-1" style="background-color:#556c11 !important;"></span> 
                               <span class="mr-1" style="background-color:#003e70 !important;"></span> 
                               <span class="mr-1" style="background-color:#003e70 !important;"></span>
                            </div>
                          </a> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-12 col-xs-12 col-sm-12 col-lg-12 col-xl-12 text-center">
                      <div class="lds-ellipsis" style="display: none;"><div></div><div></div><div></div><div></div></div></div>
                    </div>

                  
<div>
    <select name="product_id" id="product_id" class="form-control txt">
        <optoin value="">-- Select Products --</optoin>
        <?php
            foreach($get_products as $product) {
        ?>
        <option value="<?php echo $product['id']; ?>"><?php echo $product['product_name']; ?></option>
        <?php
            }
        ?>
    </select>
</div>

<a href="#" class=" buttons">
  <button type="submit" class="draw meet button-big show_cursor">Find Your Color</button>
</a>
                        
                        
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-xl-12 pt-2" id="show_swatches_section" style="display: none;">
                   


                        </div>
                  
                  </form>
                <!-- </div> -->
              </div>
          </div>
        </div>
      </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-lightbox/0.2.12/slick-lightbox.min.js"></script>               
          <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/slick/slick.css"/>

            <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/slick/slick-theme.css"/>
            <script src="<?php echo base_url();?>assets/slick/slick.min.js"></script>
            <script>
            
            function loading_slider()
              {
                $(".regular").slick({
                  autoplay: true,
                  autoplaySpeed: 5000,
                  dots: false,
                  infinite: true,
                  slidesToShow: 5,
                  slidesToScroll: 1,
                  arrows: true,
                  responsive: [
                  {
                    breakpoint: 1024,
                    settings: {
                      slidesToShow: 5,
                      slidesToScroll: 1,
                      infinite: true,
                      dots: false
                    }
                  },
                  {
                    breakpoint: 780,
                    settings: {
                      slidesToShow: 3,
                      slidesToScroll: 1,
                      dots: false
                    }
                  },
                  {
                    breakpoint: 480,
                    settings: {
                      slidesToShow: 2,
                      slidesToScroll: 1,
                      dots: false  
                    }
                  }

                  ]
                }); 
                
                //$('.regular').show();
              }
              $(document).ready(function(){
                  
                //  var myVar;
                 // myVar = setTimeout(loading_slider, 1000);
                  
                  //loading_slider();
                 // setTimeout(function(){ $('.lds-ellipsis').fadeOut(); }, 1000);
                  

                /*$('.regular').slickLightbox({
                  itemSelector        : 'a',
                  navigateByKeyboard  : true,
                  //captionPosition     : 'dynamic',
                  caption            : 'caption'
                });*/

  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $(".display_swatch").on("click", function () {
          //$('#view_all_swatch_btn').prop('disabled', true);
          $('.regular').slick('unslick');
          $('.lds-ellipsis').show();
          $.ajax({
              url: "<?php echo base_url();?>Color_finder/display_all_swatches",
              type: 'POST',
              dataType: 'json',
              success: function(response) {
                  $("#show_swatches_section").html(response);
                  loading_slider();
                  setTimeout(function(){ $('.lds-ellipsis').fadeOut(); }, 1000);
                  $('.regular').slickLightbox({
                      itemSelector        : 'a',
                      navigateByKeyboard  : true,
                      caption            : 'caption'
                    });
                  $('#show_swatches_section').css('display','block');
              }            
          });
    });

    $(document).on('click', '.sort_price a', function() {
        var sort_order = $(this).attr('id');
        perform_sorting(sort_order);
    });

    $('input[type=radio][name=search_category]').change(function() {
        $('#search_text').val('');
        if(this.value == 'name') {
          $('#search_text').attr("placeholder", "ex.Irish Moss");
        } else if(this.value == 'code') {
          $('#search_text').attr("placeholder", "ex.014e19");
        } else if(this.value == 'color') {
          $('#search_text').attr("placeholder", "ex.blue");
        }
    });

  $('#search_swatch_frm').submit(function(e) {
     e.preventDefault();
  }).validate({
      /* rules: {
            search_text: {
              required: true,
             }, 
             search_category: {
              required: true,
            },
            },
            messages: {
              search_text: 'Please enter your Search Text.',
              search_category: {
                required: 'Please select your Search Category',
               },
            },*/
      submitHandler: function(form) {
        var form = $(form).serialize();
         $.ajax({
             url: "<?php echo base_url();?>Color_finder/get_all_colors",
              type: 'POST',
              dataType: 'json',
              data: {'form':form},
              success: function(response) {
                  $("#show_swatches_section").html(response);
                  loading_slider();
                  setTimeout(function(){ $('.lds-ellipsis').fadeOut(); }, 1000);
                  $('.regular').slickLightbox({
                      itemSelector        : 'a',
                      navigateByKeyboard  : true,
                      caption            : 'caption',
                    });

                  $('#show_swatches_section').css('display','block');
              }
              
              /*url: "<?php echo base_url();?>Color_finder/get_swatches",
              type: 'POST',
              dataType: 'json',
              data: {'form':form},
              success: function(response) {
                  $("#show_swatches_section").html(response);
                  loading_slider();
                  setTimeout(function(){ $('.lds-ellipsis').fadeOut(); }, 1000);
                  $('.regular').slickLightbox({
                      itemSelector        : 'a',
                      navigateByKeyboard  : true,
                      caption            : 'caption',
                    });

                  $('#show_swatches_section').css('display','block');
              }  */          
          });
      }
  });

  function perform_sorting(order)
  {
    var search_text = $('#search_text').val();
    var search_category = $('input:radio[name="search_category"]:checked').val();

      $.ajax({
          url: "<?php echo base_url();?>Color_finder/sort_swatches",
          type: 'POST',
          dataType: 'json',
          data: {'order':order, 'search_text':search_text, 'search_category':search_category},
          success: function(response) {
              $("#show_swatches_section").html(response);
              loading_slider();
              setTimeout(function(){ $('.lds-ellipsis').fadeOut(); }, 1000);
              $('.regular').slickLightbox({
                  itemSelector        : 'a',
                  navigateByKeyboard  : true,
                  caption            : 'caption',
                });

              $('#show_swatches_section').css('display','block');
          }            
      });
    }

  });
</script>
