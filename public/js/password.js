// password js script 

$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#icon-password').addClass( "fa-solid fa-eye-slash" );
            $('#icon-password').removeClass( "fa-solid fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#icon-password').removeClass( "fa-solid fa-eye-slash" );
            $('#icon-password').addClass( "fa-solid fa-eye" );
        }
    });
});