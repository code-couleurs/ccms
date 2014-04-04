<div style="width:800px" action="/form/method/">
    <form method="POST">
        Contenu : <br />
        <textarea id="form_contenu" name="contenu"><?php echo $contenu ?></textarea>
        <?php if(\Auth::instance()->check_admin(false)): ?>
        <!--<a id="switch_advanced" href="#">Mode avancé on / off</a>-->
        <?php endif; ?><br /><br />
        <input type="hidden" name="bloc_id" value="<?php echo $bloc_id ?>" />
        <input type="submit" value="<?php echo empty($bloc_id) ? 'Ajouter' : 'Modifier' ?>" />
    </form>
</div>
<script type="text/javascript">
$(document).ready(function()
{
    if(CKEDITOR.instances['form_contenu'])
        delete CKEDITOR.instances['form_contenu'];
    var editor = $('#form_contenu').ckeditor(
    {
        toolbar: "<?php echo \Auth::instance()->check_admin(false) ? 'Advanced' : 'Chapo' ?>"
    });
    
    $('#switch_advanced').click(function()
    {
        
    })
});
</script>