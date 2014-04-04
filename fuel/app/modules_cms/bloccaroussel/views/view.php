<div class="bloc bloc_caroussel" id="bloc_<?php echo $bloc_id ?>">
    <?php if($contribution): ?>
    <div class="bloc_action">
        <a class="move_bloc">
            <img src="/assets/img/move_16.png" />
        </a>&nbsp;
        <a href="#/<?php echo Bloc::forge('bloc_caroussel')->getUri() ?>" class="modifier_bloc">
            <img src="/assets/img/edit_16.png" />
        </a>&nbsp;
        <a href="#/<?php echo Bloc::forge('bloc_caroussel')->getUri() ?>" class="supprimer_bloc">
            <img src="/assets/img/delete_16.png" />
        </a>
    </div>
    <?php endif; ?>
    <div class="caroussel_container">
        <div class="bloc_caroussel_nav">
            <div class="bloc_caroussel_prev"><a class="bloc_caroussel_prev_btn"></a></div>
            <div class="bloc_caroussel_next"><a class="bloc_caroussel_next_btn"></a></div>
        </div>

        <div class="bloc_caroussel_diapos_container">
            <div class="bloc_caroussel_diapos">
                <?php for($i = 0; $i<(count($images)+((3 - count($images)%3))%3); $i++): ?>

                <?php if($i % 3 == 0): ?>
                <div class="bloc_caroussel_diapo_set">
                <?php endif; ?>

                    <div class="bloc_caroussel_diapo">
                        <?php if(isset($images[$i])): ?>
                        <a href="<?php echo \Config::get('bloccaroussel.relpath').$images[$i]; ?>" target="_blank" class="fancy_image">
                            <img border="0" src="<?php echo \Config::get('bloccaroussel.relpath').'thumbs/'.$images[$i]; ?>" />
                        </a>
                        <?php endif; ?>
                    </div>

                <?php if($i % 3 == 2 || $i == count($images)+(count($images)%3)): ?>
                </div>
                <?php endif; ?>
                <?php endfor; ?>
            </div>
            <div class="caroussel_container_instruction">Cliquez sur une image pour l'agrandir</div>
        </div>
    </div>
</div>

<?php echo \Asset::js('jquery_cycle.min.js'); ?>
<?php echo \Asset::css('bloccaroussel.css') ?>

<script type="text/javascript">
    
$(document).ready(function() {
    $('#bloc_<?php echo $bloc_id ?> .bloc_caroussel_diapos').cycle({ 
        fx: 'scrollHorz', 
        timeout: 0,
        prev:   '#bloc_<?php echo $bloc_id ?> .bloc_caroussel_prev_btn', 
        next:   '#bloc_<?php echo $bloc_id ?> .bloc_caroussel_next_btn', 
        after:   onAfter
    });

    function onAfter(curr, next, opts) {
        
        var index = opts.currSlide;

        if(index == 0) {
            $('#bloc_<?php echo $bloc_id ?> .bloc_caroussel_prev_btn').hide();
        } else {
            $('#bloc_<?php echo $bloc_id ?> .bloc_caroussel_prev_btn').show();
        }

        if(index == opts.slideCount - 1) {
            $('#bloc_<?php echo $bloc_id ?> .bloc_caroussel_next_btn').hide();
        } else {
            $('#bloc_<?php echo $bloc_id ?> .bloc_caroussel_next_btn').show();
        }
    }
    
    <?php if (count($images)<=3) : ?>
    $('#bloc_<?php echo $bloc_id ?> .bloc_caroussel_nav').hide();
    <?php endif; ?>
    

});
    
</script>

