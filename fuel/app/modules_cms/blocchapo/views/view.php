<div class="bloc bloc_chapo" id="bloc_<?php echo $bloc_id ?>">
    <?php if($contribution): ?>
    <div class="bloc_action">
        <a class="move_bloc">
            <img src="/assets/img/move_16.png" />
        </a>&nbsp;
        <a href="#/<?php echo Bloc::forge('bloc_chapo')->getUri() ?>" class="modifier_bloc">
            <img src="/assets/img/edit_16.png" />
        </a>&nbsp;
        <a href="#/<?php echo Bloc::forge('bloc_chapo')->getUri() ?>" class="supprimer_bloc">
            <img src="/assets/img/delete_16.png" />
        </a>
    </div>
    <?php endif; ?>
    <p>
        <?php echo $contenu ?>
    </p>
</div>