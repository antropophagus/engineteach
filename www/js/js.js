$(document).ready(function(){
    $('.close_message').click(function () {
        $('.messagetouser_error').hide('slow', function(){
            $(this).remove();
        });
        $('.messagetouser_success').hide('slow', function(){
            $(this).remove();
        });
        $('.messagetouser_warning').hide('slow', function(){
            $(this).remove();
        });
    }
)
});
