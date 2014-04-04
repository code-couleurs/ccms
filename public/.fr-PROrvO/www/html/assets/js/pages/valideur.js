$(document).ready(function()
{
    $('#link_refus_validation').click(openRefusForm);
});


function openRefusForm()
{
    $.get($(this).attr('href'), function(form_html)
    {
        $.fancy_form('Refuser la validation de la page',form_html, validate_refus_form);
    });
    return false;
}

function validate_refus_form(event)
{
    $.post('/pages/post_form_refuse', event.data.form.get_posted_data(), function(success)
    {
        notify('Refus envoyé');
        $.fancybox.close();
    });
}