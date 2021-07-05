$(document).ready(function () {


    $(".show_cursor").click(function () {

        $captcha = $('#recaptcha');
        response = grecaptcha.getResponse();

        if (response.length === 0) {
            $('#g-recaptcha-response-error').text("Please verify Recaptcha");
            if (!$captcha.hasClass("error")) {
                $captcha.addClass("error");
            }
        } else {
            $('#g-recaptcha-response-error').text('');
            $captcha.removeClass("error");
            // form submit return true


            if ($("#custom-form").valid()) {
                $("#custom-form").submit();
                return true;
            }

        }


    });


    $('#custom-form').validate({
        rules: {
            name: 'required',
            subject: 'required',
            email: {
                required: true,
                email: true,
            },
            number: {
                required: true,
                number: true
            },
            comment: 'required',


        },

        messages: {
            name: 'Please Enter Your Name',
            subject: 'Please Enter Name',
            email: 'Please Enter valid email address',
            number: 'Please Enter Valid Number',
            comment: 'Please Enter Comment',
        },


        submitHandler: function (form) {
            $captcha = $('#recaptcha');
            response = grecaptcha.getResponse();


            if (response.length === 0) {
                $('#g-recaptcha-response-error').text("Please verify Recaptcha");
                if (!$captcha.hasClass("error")) {
                    $captcha.addClass("error");
                }
            } else {
                $('#g-recaptcha-response-error').text('');
                $captcha.removeClass("error");
                // form submit return true
                $("#custom-form").submit();
                return true;


            }


        }

    });





//alert('start');
        $(".regular").slick({
            lazyLoad: 'ondemand',
            autoplay: false,
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
//alert('end');




$('.show_slider_loader').css('display', 'none');
$('.regular').show();

   
    var $videoSrc;
    $('.video-btn').click(function () {
        $videoSrc = $(this).data("src");

    });
    console.log($videoSrc);


// when the modal is opened autoplay it
    $('#myModal').on('shown.bs.modal', function (e) {

// set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
        $("#video").attr('src', $videoSrc + "?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;autoplay=1");
    });


// stop playing the youtube video when I close the modal
    $('#myModal').on('hide.bs.modal', function (e) {
        // a poor man's stop video
        $("#video").attr('src', $videoSrc);
    });




});
