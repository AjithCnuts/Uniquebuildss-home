$(document).ready(function() {
    jQuery(function($) {
        $("#btn_submit").on("click", function() {
            // Get input field values
            var user_name = $('input[name=name]').val();
            var user_phone = $('input[name=phone]').val();
            var user_email = $('input[name=email]').val();
            var user_message = $('textarea[name=message]').val();
            var post_data, output;

            // Reset previous error messages
            $("#result").slideUp().html('');

            // Simple validation at the client's end
            var proceed = true;

            if(user_name == "") {
                proceed = false;
                output = '<div class="alert-danger" style="padding:10px 0px 10px 5px;">Name is required.</div>';
            }
            if(user_phone == "") {
                proceed = false;
                output = '<div class="alert-danger" style="padding:10px 0px 10px 5px;">Phone is required.</div>';
            }
            if(user_email == "") {
                proceed = false;
                output = '<div class="alert-danger" style="padding:10px 0px 10px 5px;">Email is required.</div>';
            }
            if(user_message == "") {
                proceed = false;
                output = '<div class="alert-danger" style="padding:10px 0px 10px 5px;">Message is required.</div>';
            }

            // Additional client-side validation for email format
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if(user_email && !emailPattern.test(user_email)) {
                proceed = false;
                output = '<div class="alert-danger" style="padding:10px 0px 10px 5px;">Please enter a valid email.</div>';
            }

            // Additional client-side validation for phone number (simple numeric check)
            var phonePattern = /^[0-9]{10}$/;  // Assuming 10-digit phone number
            if(user_phone && !phonePattern.test(user_phone)) {
                proceed = false;
                output = '<div class="alert-danger" style="padding:10px 0px 10px 5px;">Please enter a valid 10-digit phone number.</div>';
            }

            // Everything looks good! Proceed...
            if(proceed) {
                // Data to be sent to the server
                post_data = {'userName': user_name, 'userPhone': user_phone, 'userEmail': user_email, 'userMessage': user_message};

                // AJAX post data to the server
                $.post('contact-submit.php', post_data, function(response) {
                    // Load JSON data from the server and output message
                    if(response.type == 'error') {
                        output = '<div class="alert-danger" style="padding:10px 0px 10px 5px;">' + response.text + '</div>';
                    } else {
                        output = '<div class="alert-success" style="padding:10px 0px 10px 5px;">' + response.text + '</div>';

                        // Reset values in all input fields
                        $('#contact-form input').val('');
                        $('#contact-form textarea').val('');
                    }

                    $("#result").hide().html(output).slideDown();
                }, 'json').fail(function() {
                    // Handle AJAX errors
                    output = '<div class="alert-danger" style="padding:10px 0px 10px 5px;">There was an error submitting your message. Please try again later.</div>';
                    $("#result").hide().html(output).slideDown();
                });
            } else {
                // If validation fails, display the error message
                $("#result").hide().html(output).slideDown();
            }
        });

        // Reset previously set border colors and hide all messages on keyup
        $("#contact-form input, #contact-form textarea").keyup(function() {
            $("#result").slideUp();
        });
    });
});
