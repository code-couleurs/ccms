<h2>Actions valideur</h2>
<?php if(Session::get('mode_validation', false)): ?>
<ul class="menu_valideur">
    <a href="/pages/valide/<?php echo $page_id ?>"><li>Valider la page en construction</li></a>
    <a id="link_refus_validation" href="/pages/get_form_refuse/<?php echo $page_id ?>"><li>Refuser la page en construction</li></a>
</ul>
<?php endif; ?>