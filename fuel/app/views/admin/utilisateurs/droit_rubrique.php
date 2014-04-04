<?php if($rubrique->id == 0): ?>
<ul class="arborescence_racine">
<?php endif; ?>
    <li class="arborescence_rubrique">
        <input type="checkbox" <?php if($has_right) echo 'checked="checked"' ?> name="<?php echo $type_droit ?>[rubrique][]" value="<?php echo $rubrique->id ?>" />
        <span class="arborescence_rubrique_title">
            <?php echo $rubrique->getTitle() ?>
        </span>
        <ul class="sous_rubriques">
            <?php foreach($rubrique->getChildren('Arborescence_Rubrique') as $sousrubrique): ?>
            <?php echo Request::forge('admin_utilisateurs/droit_rubrique/'.$type_droit.'/'.$sousrubrique->id.'/'.$utilisateur_id)->execute(); ?>
            <?php endforeach; ?>
        </ul>
        <ul class="pages">
            <?php foreach($rubrique->getChildren('Arborescence_Page') as $page): ?>
            <?php echo Request::forge('admin_utilisateurs/droit_page/'.$type_droit.'/'.$page->id.'/'.$utilisateur_id)->execute(); ?>
            <?php endforeach; ?>
        </ul>
    </li>

<?php if($rubrique->id == 0): ?>
</ul>
<?php endif; ?>