$(document).ready(function () {
    $('#retype').mouseenter(function () { 
        $('#password').attr('type','text');
    });
    $('#retype').mouseleave(function () { 
        $('#password').attr('type','password');
    });

    
});

