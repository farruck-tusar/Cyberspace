    jQuery(function($) {
        'use strict';

      //================= countdown ==============
      
        $(window).on('load', function () {
            $('#page-loader').fadeOut(500);
        });

        //================= countdown ==============
        
        var countdown=$('#countdown');//variable declaration for countdown
        if (countdown.length)
        {
            countdown.downCount({
            date: '10/15/2018 23:59:00' // m/d/y
            }, function () {
                alert('WOOT WOOT, done!');
            });
        }// end of countdown
        
        //================= tooltip =================
        
        var tooltip=$('.tooltip1');//variable declaration for tooltip
        if (tooltip.length)
        {
           tooltip.tooltip();   
        }// end of tooltip

       //================= sliding popup =================
        
       //hamburguer working js
       var hamburguer=$('.hamburguer'); //variable declaration for hamburguer
       var mava_menu=$(".mava-menu"); //variable declaration for mava-menu
        
       if (hamburguer.length)
       {
         hamburguer.on("click", function() {
            mava_menu.toggleClass("active full-screen");
            hamburguer.toggleClass("close-hamburguer");
        });
       }//end of hamburguer
        
       //================= animated popup =================
       
       //about section 
       var about_sec=$('#about_sec');//variable declaration for about_sec
       if (about_sec.length)
       {
           about_sec.animatedModal({
                modalTarget:'about'
            });
        }//end of about section
        
       //service section    
       var service_sec=$('#ser');//variable declaration for service_sec
       if (service_sec.length)
       {
            service_sec.animatedModal({
                modalTarget:'services'
            });
       }//end of service section
        
       //contact section    
       var contact_sec=$('#con');//variable declaration for contact_sec
       if (contact_sec.length)
       {
            contact_sec.animatedModal({
                modalTarget:'contact'
            });
       }//end of contact section
       // end of animated popup
        
        //================= down sliding window ================= 
        
        //about section
        var about_round=$('.about-round a');//variable declaration for about_round
        var about_down=$('#about-down');//variable declaration for about_down
        var about_down_remove=$('#services-down,#contact-down');//variable declaration for about_down_remove
        about_round.on("click", function(){
             about_down.toggleClass('open');
             about_down_remove.removeClass('open');
        });//end of about section
        
        //services section
        var services_round=$('.services-round a');//variable declaration for services-round
        var services_down=$('#services-down');//variable declaration for services-down
        var services_down_remove=$('#about-down,#contact-down');//variable declaration for services_down_remove
        services_round.on("click", function(){
             services_down.toggleClass('open');
             services_down_remove.removeClass('open');
        });//end of services section
        
        //contact section
        var contact_round=$('.contact-round a');//variable declaration for contact-round
        var contact_down=$('#contact-down');//variable declaration for contact-down
        var contact_down_remove=$('#about-down,#services-down');//variable declaration for contact_down_remov
        contact_round.on("click", function(){
             contact_down.toggleClass('open');
             contact_down_remove.removeClass('open');
        });//end of conatct section
        
        //close button down sliding window section
        var bottom_close=$('.bottom-close');//variable declaration for bottom_close
        var pattern=$('.pattern');//variable declaration for pattern
        bottom_close.on("click", function(){
            pattern.removeClass('open');
        });//end of close button down sliding window section
        // end of down sliding window

        });




