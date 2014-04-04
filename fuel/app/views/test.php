<?php echo Asset::js('jquery-1.8.2.min.js') ?>
<?php echo Asset::js('jquery-ui-1.9.1.custom.min.js'); ?>
<?php echo Asset::js('ckeditor/ckeditor.js') ?>
<?php echo Asset::js('ckeditor/adapters/jquery.js'); ?>
<?php echo Asset::js('fancybox/jquery.fancybox-1.3.4.pack.js'); ?>
<?php echo Asset::js('jquery.fileupload.js'); ?>
<?php echo Asset::add_path('assets/js/fancybox', 'css'); ?>
<?php echo Asset::css('jquery.fancybox-1.3.4.css'); ?>
<script>
$(document).ready(function()
{
    $('#editeur').ckeditor();
});
</script>

<textarea id="editeur"></textarea>