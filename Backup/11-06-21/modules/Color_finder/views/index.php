<div class="row">
    <div class="container-fluid p-0">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
       <!-- <ol class="carousel-indicators">
        <?php if($sliders != '') { 
      $i = 1;
      foreach($sliders as $slider) { ?>
          <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php ($i == 1)?'active':'';?>"></li>
          
          <?php $i++; } } ?>
        </ol>-->
        
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
       <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> 
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> 
		-->
		</div>
    </div>
  </div>
  
     
      <div class="row">
        <div class="container p-3 mt-5 pb-3 w-100">
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

                 	

                  
<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-xl-12 pb-5"><?php $product_id = $this->uri->segment(3); ?>
    <select name="product_id" id="product_id" class="form-control txt" onchange="$('#search_swatch_frm').submit();">
        <option value="">-- Select Products --</option>
        <?php
            $product_arr = array(3,15,16,17,18,38,26,41);
            foreach($get_products as $product) {
                if($product_id != '' && $product_id==$product['id'])
                    $selected = 'selected';
                else
                    $selected = '';
                
                if(!in_array($product['id'],$product_arr)){
        ?>
        <option value="<?php echo $product['id']; ?>" <?php echo $selected; ?>><?php echo $product['product_name']; ?></option>
        <?php
                }
            }
        ?>
    </select>
</div>
<div class="pt-5" id="finder_product_name"></div>
     
<?php /*<div class="pt-5">
<a href="#" class=" buttons">
  <button type="submit" class="draw meet button-big show_cursor">View Colors</button>
</a>
     </div> */ ?>
                        
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 col-xl-12 pt-2" id="show_swatches_section" style="display: none;">
                <?php   
                    if($product_id != '')
                        $selected = 'selected';
                    else
                        $selected = '';
                ?>
                        </div>
                        
                        
                        
                        <input type="hidden" class="csrf_token" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                  
                  </form>
                <!-- </div> -->
              </div>
          </div>
        </div>
      </div>


            <script>
            
            function loading_slider_2()
              {
                $(".regular").slick({
                  autoplay: false,
                  autoplaySpeed: 5000,
                  dots: false,
                  infinite: true,
                  slidesToShow: 4,
                  slidesToScroll: 1,
                  arrows: true,
                  responsive: [
                  {
                    breakpoint: 1024,
                    settings: {
                      slidesToShow: 3,
                      slidesToScroll: 1,
                      infinite: true,
                      dots: false
                    }
                  },
                  {
                    breakpoint: 780,
                    settings: {
                      slidesToShow: 2,
                      slidesToScroll: 1,
                      dots: false
                    }
                  },
                  {
                    breakpoint: 480,
                    settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      dots: false  
                    }
                  }

                  ]
                }); 
                
                //$('.regular').show();
              }
             
</script>

<script type="text/javascript">
  $(document).ready(function() {
     
       var csrf_token = "<?php echo $this->security->get_csrf_token_name(); ?>";
       
       
        var csrf_hash = "<?php echo $this->security->get_csrf_hash(); ?>";
       
      <?php if($product_id != '') { ?>
      var form = $('#search_swatch_frm').serialize();
       $.ajax({
             url: "<?php echo base_url();?>Color_finder/get_all_colors",
              type: 'POST',
              dataType: 'json',
              data: {'form':form, 'csrf_test_name':csrf_hash},
              success: function(response) {
                 // $('#finder_product_name').html($("#product_id option:selected" ).text());
                  $("#show_swatches_section").html(response);
                  loading_slider_2();
                  setTimeout(function(){ $('.lds-ellipsis').fadeOut(); }, 1000);
                  $('.regular').slickLightbox({
                      itemSelector        : 'a.reg_slide',
                      navigateByKeyboard  : true,
                      caption            : 'caption',
                    });

                  $('#show_swatches_section').css('display','block');
                  
                 //   $('.csrf_token').val(data.csrf_token);
              }
              
              
          });
    <?php } ?>
          
    $(".display_swatch").on("click", function () {
          //$('#view_all_swatch_btn').prop('disabled', true);
          $('.regular').slick('unslick');
          $('.lds-ellipsis').show();
          $.ajax({
              url: "<?php echo base_url();?>Color_finder/display_all_swatches",
              type: 'POST',
              dataType: 'json',
              data: { 'csrf_test_name':csrf_hash},
              success: function(response) {
                  $("#show_swatches_section").html(response);
                  loading_slider_2();
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
              data: {'form':form, 'csrf_test_name':csrf_hash},
              success: function(response) {
                  $("#show_swatches_section").html(response);
                  loading_slider_2();
                  setTimeout(function(){ $('.lds-ellipsis').fadeOut(); }, 1000);
                  $('.regular').slickLightbox({
                      itemSelector        : 'a.reg_slide',
                      navigateByKeyboard  : true,
                      caption            : 'caption',
                    });

                  $('#show_swatches_section').css('display','block');
              }
              
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
          data: {'order':order, 'search_text':search_text, 'search_category':search_category, 'csrf_test_name':csrf_hash},
          success: function(response) {
              $("#show_swatches_section").html(response);
              loading_slider_2();
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
