
// Validate Booking Form
$("#BookingForm").validate({
    rules: {
        full_name: {
            required: true,
            minlength: 3
        },
        email: {
            required: true,
            minlength: 4
        }
        ,
        mobile: {
            required: true
        },
        age: {
            required: true
        },
        date: {
            required: true
        },
        gender: {
            required: true
        }
    },
    messages: {
        full_name: {
            required: "Please Enter Name",
            minlength: "Name must consist of at least 3 characters"
        },
        email: {
            required: "Please provide a Email",
            minlength: "Email must be at least 4 characters long"
        },
        mobile: {
            required: "Please provide Mobile Number"
        },
        age: {
            required: "Please Enter Age"
        },
        date: {
            required: "Please Choose Date and Time"
        },
        gender: {
            required: "Please Select Gender"
        }
    },

    submitHandler: function(form) {
        //Send Booking Mail AJAX
        var formdata = jQuery("#BookingForm").serialize();
        jQuery.ajax({
            type:"POST",
            url:"contact_form/booking.php",
            data:formdata,
            dataType:'json',
            async: false,
            success:function(data){
                if(data.success){
                    alert('Thank You, Your Appintment is Registered');
                }else{
                    alert('Error on Booking, Please Try Again');
                }

            },
            error:function(error){
                alert('Something Went Wrong');
            }

        });
    }
});

// Validate Contact Form
$("#ContactForm").validate({
    rules: {
        full_name: {
            required: true,
            minlength: 3
        },
        email: {
            required: true,
            minlength: 4
        }
        ,
        mobile: {
            required: true
        },
        subject: {
            required: true
        },
        message: {
            required: true
        }
    },
    messages: {
        full_name: {
            required: "Please Enter Name",
            minlength: "Name must consist of at least 3 characters"
        },
        email: {
            required: "Please provide a Email",
            minlength: "Email must be at least 4 characters long"
        },
        mobile: {
            required: "Please provide Mobile Number"
        },
        subject: {
            required: "Please Enter Subject"
        },
        message: {
            required: "Please Enter Message"
        }
    },

    submitHandler: function(form) {
        //Send Booking Mail AJAX
        var formdata = jQuery("#ContactForm").serialize();
        jQuery.ajax({
            type:"POST",
            url:"contact_form/contact.php",
            data:formdata,
            dataType:'json',
            async: false,
            success:function(data){
                if(data.success){
                    alert('Thank You, Your Message Has been Sent');
                }else{
                    alert('Error on Sending Message, Please Try Again');
                }

            },
            error:function(error){
                alert('Something Went Wrong');
            }

        });
    }
});

