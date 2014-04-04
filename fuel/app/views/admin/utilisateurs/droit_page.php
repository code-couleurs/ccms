<li class="arborescence_page">
    <input type="checkbox" <?php if($has_right) echo 'checked="checked"' ?> name="<?php echo $type_droit ?>[page][]" value="<?php echo $page->id ?>" />
    <span class="arborescence_page_title">
        <?php echo $page->getTitle() ?>
    </span>   
</li>
