<?php echo Request::forge('admin_arborescence/rubrique/0')->execute() ?>

<script type="text/template" id="tpl_form_ajout_rubrique">
    <div id="form_ajout_rubrique">
        Rubrique : <input type="text" id="form_rubrique_title" name="intitule" />
        <input type="hidden" name="rubrique_id" value="{{rubrique_id}}" />
        <input type="button" value="Valider" class="fancy_form_validate" />
    </div>
</script>

<script type="text/template" id="tpl_form_ajout_page">
    <div id="form_ajout_page">
        Titre : <input type="text" id="form_page_title" name="titre" />
        <input type="hidden" name="rubrique_id" value="{{rubrique_id}}" />
        <input type="hidden" id="page_id" name="page_id" value="{{page_id}}" />
        <input type="button" value="Valider" class="fancy_form_validate" />
    </div>
</script>