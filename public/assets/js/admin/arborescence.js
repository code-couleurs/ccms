$('document').ready(function()
{
    add_listeners();
});

var rubrique_action_id;

function add_listeners()
{
    $('.arbo_ajouter_rubrique').unbind('click').bind('click',form_ajout_rubrique);
    $('.arbo_supprimer_rubrique').unbind('click').bind('click',supprime_rubrique);
    $('.arbo_modifier_rubrique').unbind('click').bind('click',form_modifier_rubrique);
    $('.arborescence_racine ul').sortable(
    {
        update:deplace_branche,
        connectWith: '.arborescence_racine ul',
        placeholder: 'ui-state-highlight'
    }
    );
        /*
    $('.arborescence_racine ul').sortable(
    {
        update:deplace_page,
        connectWith: '.arborescence_racine ul.pages',
        placeholder: 'ui-state-highlight'
    }
    );
    */
    $('.arbo_ajouter_page').unbind('click').bind('click',form_ajout_page);
    $('.arbo_modifier_page').unbind('click').bind('click',form_modifier_page);
    $('.arbo_supprimer_page').unbind('click').bind('click',supprime_page);
}

function notify(message)
{
    $.pnotify({
        pnotify_text: message,
        pnotify_nonblock: false,
        pnotify_delay: 2000
    });
}

function set_rubrique_id(action_link)
{
    var rubrique_id = $(action_link).parent().attr('id').split('|');
    rubrique_action_id = rubrique_id[1];
}

function form_ajout_rubrique(event)
{
    set_rubrique_id(this);
    var template_vars = {rubrique_id:rubrique_action_id};
    $.fancy_form('Ajouter une rubrique','tpl_form_ajout_rubrique', form_ajout_rubrique_validate, template_vars);
}

function form_ajout_rubrique_validate(event, fancy_form)
{
    $.post(fuel_url+'admin_rubriques/ajouter.json', fancy_form.get_posted_data(), 
    function(data){
        $('#arbo_actions\\|'+rubrique_action_id).next('ul').append(data);
        notify('Rubrique ajoutée');
        fancy_form.close();
        add_listeners();
    });
    
}

function form_modifier_rubrique(event)
{
    set_rubrique_id(this);
    var template_vars = {rubrique_id:rubrique_action_id};
    var form = $.fancy_form('Modifier une rubrique','tpl_form_ajout_rubrique', form_modifier_rubrique_validate, template_vars);
    form.val('form_rubrique_title', $.trim($(this).parents('li').children('.arborescence_rubrique_title').first().text()));
}

function form_modifier_rubrique_validate(event, fancy_form)
{
    
    $.post(fuel_url+'admin_rubriques/modifier.json', fancy_form.get_posted_data(), 
    function(data){
        $('#arbo_actions\\|'+rubrique_action_id).parent('li').children('.arborescence_rubrique_title').first().text(data);
        notify('Rubrique modifiée');
        fancy_form.close();
    });
    
}

function supprime_rubrique(event)
{
    if(confirm('Voulez-vous vraiment supprimer cette rubrique et son contenu ?'))
    {
        set_rubrique_id(this);
        $.post(fuel_url+'admin_rubriques/supprimer.json', {id:rubrique_action_id},function(data)
        {
            if(data)
            {
                $('#arbo_actions\\|'+rubrique_action_id).parent().remove();
                notify('Rubrique supprimée');
            }
            else
            {
                notify('Erreur lors de la suppression de la rubrique');
            }
        });
    }
}

function deplace_branche(event, ui)
{
   var parent_id = $(this).parent('li').find('.arbo_actions').first().attr('id').split('|');
   parent_id = parent_id[1];
   
   var rubrique = {
       id: parent_id,
       branches: new Array()
   }
   
   $(this).children('li').each(
        function(element)
        {
            var branche_id;
            var branche;
            if($(this).hasClass('arborescence_rubrique'))
            {
                branche_id = $(this).find('.arbo_actions').first().attr('id').split('|');
                branche = 
                {
                    id: branche_id[1],
                    type: 'rubrique'
                }
            }
            else
            {
                branche_id = $(this).find('.arbo_actions_page').first().attr('id').split('|');
                branche = 
                {
                    id: branche_id[1],
                    type: 'page'
                }
            }
            rubrique.branches.push(branche);
        }
   );
       
   $.post(fuel_url+'admin_rubriques/ordonner', rubrique, function()
    {
        notify('Rubrique déplacée');
    });
}

function form_ajout_page(event)
{
    set_rubrique_id(this);
    var template_vars = {rubrique_id:rubrique_action_id};
    $.fancy_form('Ajouter une page','tpl_form_ajout_page', form_ajout_page_validate, template_vars);
}

function form_ajout_page_validate(event, fancy_form)
{
    $.post(fuel_url+'admin_pages/ajouter.json', fancy_form.get_posted_data(), 
    function(data){
        $('#arbo_actions\\|'+rubrique_action_id).parent('li').first().find('ul').first().append(data);
        notify('Page ajoutée');
        fancy_form.close();
        add_listeners();
    });
    
}

function form_modifier_page(event)
{    
    var page_id = $(this).parents('.arbo_actions_page').first().attr('id').split('|');
    var template_vars = {page_id:page_id[1]};
    var form = $.fancy_form('Modifier une page','tpl_form_ajout_page', form_modifier_page_validate, template_vars);
    form.val('form_page_title', $.trim($(this).parents('li').children('.arborescence_page_title').first().text()));
}

function form_modifier_page_validate(event, fancy_form)
{
    $.post(fuel_url+'admin_pages/modifier.json', fancy_form.get_posted_data(), 
    function(data){
        $('#arbo_actions_page\\|'+fancy_form.val('page_id')).parent('li').children('.arborescence_page_title').first().text(data);
        notify('Page modifiée');
        fancy_form.close();
    });
    
}

function deplace_page(event, ui)
{
   var rubrique_id = $(this).parent('li').find('.arbo_actions').first().attr('id').split('|');
   rubrique_id = rubrique_id[1];
   
   var pages = new Array();
   
   $(this).children('li.arborescence_page').each(
        function(element)
        {
            var page_id = $(this).find('.arbo_actions_page').first().attr('id').split('|');
            pages.push(page_id[1]);
        }
   );
       
   $.post(fuel_url+'admin_pages/ordonner', {rubrique_id:rubrique_id, pages:pages}, function()
    {
        notify('Page déplacée');
    });
}

function supprime_page(event)
{
    if(confirm('Voulez-vous vraiment supprimer cette page ?'))
    {
        var page_id = $(this).parent().attr('id').split('|');
        $.post(fuel_url+'admin_pages/supprimer.json', {id:page_id[1]},function(data)
        {
            if(data)
            {
                $('#arbo_actions_page\\|'+page_id[1]).parent().remove();
                notify('Page supprimée');
            }
            else
            {
                notify('Erreur lors de la suppression de la page');
            }
        });
    }
}