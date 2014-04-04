<div class="bloc bloc_texte_media" id="bloc_<?php echo $bloc_id ?>">
    <?php if($contribution): ?>
    <div class="bloc_action">
        <a class="move_bloc">
            <img src="/assets/img/move_16.png" />
        </a>&nbsp;
        <a href="#/<?php echo Bloc::forge('bloc_texte_media')->getUri() ?>" class="modifier_bloc">
            <img src="/assets/img/edit_16.png" />
        </a>&nbsp;
        <a href="#/<?php echo Bloc::forge('bloc_texte_media')->getUri() ?>" class="supprimer_bloc">
            <img src="/assets/img/delete_16.png" />
        </a>
    </div>
    <?php endif; ?>
    <h2>
        <?php echo $titre ?>
    </h2>
    <div class="bloc_texte_media_media">
        <?php echo $media ?>
    </div>
    <div class="bloc_texte_media_texte">
        <p>
            <?php echo $contenu ?>
        </p>
    </div>
</div>
