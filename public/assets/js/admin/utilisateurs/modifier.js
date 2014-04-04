$('document').ready(function(){
    
    togglePassword();
    $('#form_modifier_password').change(togglePassword);
    
});

function togglePassword() {

    if($('#form_modifier_password').attr('checked') != 'checked')
    {
        $('#form_password').hide();
    }
    else
    {
        $('#form_password').show();
    }
    
}