$(document).ready(function(){
    $('#password').click(function(){
        alert($(this).is(':checked'));
        $(this).is(':checked') ? $('#allpass').attr('type', 'text') : $('#allpass').attr('type', 'password');
    });
});