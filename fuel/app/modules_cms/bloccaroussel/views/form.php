<div style="width:800px" id="caroussel_data">
    <input type="file" id="upload_caroussel_image" type="file" name="image" data-url="/bloccaroussel/caroussel/upload.json" multiple /><br />
    <ul id="caroussel_files">
        <?php foreach($images as $image): ?>
        <li class="caroussel_file">
            <img src="<?php echo \Config::get('bloccaroussel.relpath').'thumbs/'.$image ?>" style="cursor:move" />
        <input type="hidden" name="images[]" value="<?php echo $image ?>"><a onclick="removeImage(this)"><img class="icon" src="/assets/img/delete_16.png" /></a></li>
        <?php endforeach; ?>
    </ul>
    <input type="hidden" name="bloc_id" value="<?php echo $bloc_id ?>" />
    <input type="submit" id="btn_caroussel_bloc" value="<?php echo empty($bloc_id) ? 'Ajouter' : 'Modifier' ?>" />
</div>

<script type="text/javascript">
$(document).ready(function()
{
    
    $('#upload_caroussel_image').fileupload({
        dataType: 'json',
        
        add:function (e, data) {
            data.submit().success(function (filename, textStatus, jqXHR)
            {
                $('#caroussel_files').append('<li class="caroussel_file"><img src="<?php echo \Config::get('bloccaroussel.relpath').'thumbs/'; ?>'+filename+'" style="cursor:move" /><input type="hidden" name="images[]" value="'+filename+'"><a onclick="removeImage(this)"><img class="icon" src="/assets/img/delete_16.png" /></a></li>');
            });
        }
    });
    
    $('#caroussel_files').sortable();

    
    
});
function removeImage(image_link)
{
    if(confirm('Etes-vous sûr de vouloir supprimer cette image ?'))
    {
        $(image_link).parents('li').first().remove();
    }
}


</script>