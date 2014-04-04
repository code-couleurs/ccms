<div style="width:800px">
    Légende : 
    <input type="text" name="caption" /><br />
    Image : 
    <input type="file" id="bloc_image_path" type="file" name="image" data-url="/blocimage/image/ajouter.json" multiple /><br />
    <input type="hidden" name="bloc_id" value="<?php echo $bloc_id ?>" />
    <input type="button" id="btn_image_bloc" value="<?php echo empty($bloc_id) ? 'Ajouter' : 'Modifier' ?>" />
</div>

<script type="text/javascript">
$(document).ready(function()
{
    $('#bloc_image_path').fileupload({
        dataType: 'json',
        
        add:function (e, data) {
            data.formData = $('#bloc_image_path').parents('form').first().serializeArray();
            data.submit().success(function (bloc_id, textStatus, jqXHR)
            {
                $.get('/blocimage/image/view/'+bloc_id, function(bloc_html)
                {
                    $('#liste_blocs').append(bloc_html);
                    $.fancybox.close();
                    notify('Image ajoutée');
                })
            });
        }
    });
    
});


</script>