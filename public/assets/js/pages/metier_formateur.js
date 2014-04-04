var is_closed = false;

$(document).ready(function()
{
    $("#content-right").css('min-height', '0px');
    $("#content-right .menu_rubrique_title").click(toggleMenu);
    $("#content-right .menu_rubrique_title").css('cursor', 'pointer');
    setTimeout(toggleMenu, 1000);
    
})

function toggleMenu()
{
    $("ul.menu_rubrique_sousrubriques").slideToggle();
}