$(document).ready( function(){

    //Handle Login Click
    $('#login-submit').click( function() {

        var username = $('#username');
        var password = $('#password');
        var form = $('#login-form');
        var msgBox = $('.message-box');

        validateNotEmptyField(username);
        validateNotEmptyField(password);
        validateForm(form, msgBox);

    });

});


function validateNotEmptyField(field){
    if(field.val() == ''){
        field.addClass('validation-error');
    } else {
        field.removeClass('validation-error');
    }
}

function validateForm(form, msgBox){

    form.find('input').each( function(){
        if($(this).hasClass('validation-error') || $(this).hasClass('validation-error')){
            msgBox.text("Please fix the highlighted fields above.");
            msgBox.addClass('msg-error');
        } else {
            form.submit();
        }
    });


}

