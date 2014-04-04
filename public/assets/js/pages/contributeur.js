$(document).ready(function(){
    
    add_listeners();
    
});

var bloc_uri;

function notify(message)
{
    $.pnotify({
        pnotify_text: message,
        pnotify_nonblock: false,
        pnotify_delay: 2000
    });
}

function add_listeners()
{
    $('.add_bloc').unbind('click').bind('click',open_add_form);
    $('.modifier_bloc').unbind('click').bind('click',open_edit_form);
    $('.supprimer_bloc').unbind('click').bind('click',delete_bloc);
    $('#liste_blocs').sortable({'update':move_bloc});
    $('#ask_validation').unbind('click').bind('click', open_valide_form);
}


function get_url_from_code(uri, url_type)
{
    switch(url_type)
    {
        case 'form' :
            return uri+'/get_form';
        case 'voir' :
            return uri+'/view';
        case 'ajouter' :
            return uri+'/ajouter.json';
        case 'modifier' :
            return uri+'/modifier.json';
        case 'supprimer' :
            return uri+'/supprimer.json';
        case 'deplacer' :
            return uri+'/deplacer.json';
    }
    return uri;
}

function open_add_form()
{
    bloc_uri = $(this).attr('href').substr(1);
    $.get(get_url_from_code(bloc_uri, 'form'), function(form_html)
    {
        $.fancy_form('Ajouter un bloc',form_html, validate_add_form);
    });
}

function validate_add_form(event)
{
    $.post(get_url_from_code(bloc_uri, 'ajouter'), event.data.form.get_posted_data(), function(bloc_id)
    {
        $.get(get_url_from_code(bloc_uri, 'voir')+'/'+bloc_id, function(bloc_html)
        {
            $('#liste_blocs').append(bloc_html);
            $.fancybox.close();
            notify('Bloc ajouté');
            add_listeners();
        });
    });
}

function open_edit_form(event)
{
    bloc_uri = $(this).attr('href').substr(1);
    var bloc_id = $(this).parents('div.bloc').first().attr('id').split('_');
    $.get(get_url_from_code(bloc_uri, 'form')+'/'+bloc_id[1], function(form_html)
    {
        $.fancy_form('Modifier un bloc',form_html, validate_edit_form);
    });
}

function validate_edit_form(event)
{
    $.post(get_url_from_code(bloc_uri, 'modifier'), event.data.form.get_posted_data(), function(bloc_id)
    {
        $.get(get_url_from_code(bloc_uri, 'voir')+'/'+bloc_id, function(bloc_html)
        {
            $('#bloc_'+bloc_id).replaceWith(bloc_html);
            $.fancybox.close();
            notify('Bloc modifié');
            add_listeners();
        });
    });
}

function delete_bloc()
{
    if(!confirm('Voulez-vous vraiment supprimer ce bloc ?'))
        return;
    bloc_uri = $(this).attr('href').substr(1);
    var bloc_id = $(this).parents('div.bloc').first().attr('id').split('_');
    $.post(get_url_from_code(bloc_uri, 'supprimer'), {bloc_id:bloc_id[1]}, function(success)
    {
        notify('Bloc supprimé');
        $('#bloc_'+bloc_id[1]).remove();
    });
}

function move_bloc(event, ui)
{
    var bloc_id = ui.item.attr('id').split('_');
    bloc_id = bloc_id[1];
    bloc_uri = ui.item.find('.supprimer_bloc').first().attr('href').substr(1);
    var newPosition = ui.item.index()+1;
    $.post(get_url_from_code(bloc_uri, 'deplacer'), {bloc_id:bloc_id, position:newPosition}, function(success)
    {
        notify('Bloc déplacé');
    });
}

function open_valide_form()
{
    $.get($(this).attr('href'), function(form_html)
    {
        $.fancy_form('Demander la validation de la page',form_html, validate_valide_form);
    });
    return false;
}

function validate_valide_form(event)
{
    $.post('/pages/post_form_validation', event.data.form.get_posted_data(), function(success)
    {
        notify('Demande envoyée');
        $.fancybox.close();
    });
}