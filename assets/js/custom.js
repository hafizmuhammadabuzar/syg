/* Start Project Open Code */
function openProject() {
    document.getElementById("startproject").style.width = "100%";
}

function closeProject() {
    document.getElementById("startproject").style.width = "0%";
}

/* Add/remove Class on Body */
$(function () {
    $("#getQuote .icon").click(function () {
        $("body").addClass("active");
    });

    $("#getQuote .closebtn").click(function () {
        $("body").removeClass("active");
    });
});

/* ---- back to Top ---- */
jQuery(document).ready(function () {

    var offset = 250;
    var duration = 300;

    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });

    jQuery('.back-to-top').click(function (event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    });
    
    $('input[type=checkbox]').click(function () {
        var allVals = [];
        $('input[type=checkbox]').each(function(){
            if(this.checked){
                allVals.push($(this).val());
            }
         });
         $('#chkList').val(allVals);
    });
});

/* ----  Menu DropDown ---- */
/* When the user clicks on the button, 
 toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

function myFunctionSecond() {
    document.getElementById("myDropdownSecond").classList.toggle("show");
}

function myFunctionThird() {
    document.getElementById("myDropdownThird").classList.toggle("show");
}

function myFunctionFour() {
    document.getElementById("myDropdownFour").classList.toggle("show");
}

function myFunctionFive() {
    document.getElementById("myDropdownFive").classList.toggle("show");
}

window.onclick = function (event) {
    if (!event.target.matches(".dropbtn")) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains("show")) {
                openDropdown.classList.remove("show");
            }
        }
    }
}

/* --- Start Project --- */
$(function () {
    var $signupForm = $('#SignupForm');

    $signupForm.submit(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('.prev').before(response);
            }
        }); 
    });

    $signupForm.validate({
        errorElement: 'em',
        submitHandler: function (form) {
        }
    });

    $signupForm.formToWizard({
        submitButton: 'SaveAccount',
        nextBtnClass: 'btn btn-primary next',
        prevBtnClass: 'btn btn-default prev',
        buttonTag: 'button',
        validateBeforeNext: function (form, step, e) {
            var stepIsValid = true;
            var validator = form.validate();
            $(':input',  step).each(function (index) {
                var xy = validator.element(this);
                stepIsValid = stepIsValid && (typeof xy == 'undefined' || xy);
            });
            return stepIsValid;
        },
        progress: function (i, count) {
            $('#progress-complete').width('' + (i / count * 100) + '%');
        }
    });
});

/* --- Light Slider --- */

$(document).ready(function () {
    $("#content-slider").lightSlider({
        loop: true,
        keyPress: true,
        item: 8,
        autoWidth: false,
        slideMove: 1,
        slideMargin: 10,
        pager: false,
        auto: true,
        controls: false,

        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    item: 5,
                    slideMove: 1,
                    slideMargin: 6,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    item: 3,
                    slideMove: 1
                }
            },
            {
                breakpoint: 479,
                settings: {
                    item: 1,
                    slideMove: 1
                }
            }
        ],
    });
    
    
    $('#loadmore').click(function(e){
        e.preventDefault();
        $('#loader').show();
        $count = $('.BlogBox').length;
        $.ajax({
            url: 'http://localhost/projects/syg/blog/loadmore',
            type: 'POST',
            data: {offset: $count},
            success: function(response) {
                $('#loader').hide();
                $('#blog-list').append(response).fadeIn(500);
            }
        }); 
    });
    
});
