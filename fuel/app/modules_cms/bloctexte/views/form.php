<script type="text/javascript">
$(document).ready(function()
{
    if(CKEDITOR.instances['form_contenu'])
        delete CKEDITOR.instances['form_contenu'];
    $('#form_contenu').ckeditor(
    {
        toolbar: "<?php echo \Auth::instance()->check_admin(false) ? 'Advanced' : 'Standard' ?>"
    });
});
</script>
<div style="width:650px" action="/form/method/">
    <form method="POST">
        Titre :<input type="text" name="titre" value="<?php echo $titre ?>" /><br />
        Contenu : <br />
        <textarea id="form_contenu" name="contenu"><?php echo $contenu ?></textarea><br />
        <input type="hidden" name="bloc_id" value="<?php echo $bloc_id ?>" />
        <input type="submit" value="<?php echo empty($bloc_id) ? 'Ajouter' : 'Modifier' ?>" />
    </form>
</div>