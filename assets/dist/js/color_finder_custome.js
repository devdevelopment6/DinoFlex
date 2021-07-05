          
            
           

  $(document).ready(function() {
     
      function loading_slider()
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
