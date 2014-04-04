<?php if($rubrique->id == 0): ?>
<ul class="arborescence_racine">
<?php endif; ?>
    
    <li class="arborescence_rubrique">
        
        <span class="arborescence_rubrique_title">
            <?php echo $rubrique->getTitle() ?>
        </span>
        
        <span class="arbo_actions" id="arbo_actions|<?php echo $rubrique->id ?>">
            <a class="arbo_ajouter_rubrique">nouvelle rubrique</a>
            <a class="arbo_ajouter_page">nouvelle page</a>
            <?php if($rubrique->id != 0): ?>
            <a class="arbo_modifier_rubrique">modifier rubrique</a>
            <a class="arbo_supprimer_rubrique">supprimer rubrique</a>
            <?php endif; ?>
        </span>
        <ul>
            <?php foreach($rubrique->getChildren() as $branche): ?>
            <?php if(get_class($branche) == 'Arborescence_Rubrique') : ?>
            <?php echo Request::forge('admin_arborescence/rubrique/'.$branche->id)->execute(); ?>
            <?php else : ?>
            <?php echo Request::forge('admin_arborescence/page/'.$branche->id)->execute(); ?>
            <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </li>

<?php if($rubrique->id == 0): ?>
</ul>
<?php endif; ?>