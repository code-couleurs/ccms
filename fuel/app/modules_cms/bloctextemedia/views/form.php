<script type="text/javascript">
$(document).ready(function()
{
    if(CKEDITOR.instances['form_contenu'])
        delete CKEDITOR.instances['form_contenu'];
    $('#form_contenu').ckeditor(
    {
        toolbar: "<?php echo \Auth::instance()->check_admin(false) ? 'Advanced' : 'Standard' ?>"
    });
 
    $('#form_media').fileupload({
        dataType: 'json',
        add:function (e, data) {
            alert('fichier choisi');
            data.formData = $('#bloc_video_path').parents('form').first().serializeArray();
            data.submit().success(function (filepath, textStatus, jqXHR)
            {
                alert('fichier uploadé '+filepath);
                $('#media_path_displayed').text(filepath);
                $('#media_path').val(filepath);
            });
        }
    });
});
</script>
<div style="width:650px" action="/form/method/">
    <form method="POST">
        Titre :<input type="text" name="titre" value="<?php echo $titre ?>" /><br />
        Media :<input id="form_media" type="file" name="media" data-url="bloctextemedia/bloctextemedia/upload.json" /><br />
        <input type="hidden" name="media_path" id="media_path" value="<?php echo $media_path ?>" />
        <div id="media_path_displayed"><?php echo $media_path ?></div><br />
        Contenu : <br />
        <textarea id="form_contenu" name="contenu"><?php echo $contenu ?></textarea><br />
        <input type="hidden" name="bloc_id" value="<?php echo $bloc_id ?>" />
        <input type="submit" value="<?php echo empty($bloc_id) ? 'Ajouter' : 'Modifier' ?>" />
    </form>
</div>
