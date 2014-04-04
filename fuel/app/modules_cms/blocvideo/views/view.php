<div class="bloc bloc_video" id="bloc_<?php echo $bloc_id ?>">
    <?php if($contribution): ?>
    <div class="bloc_action">
        <a class="move_bloc">
            <img src="/assets/img/move_16.png" />
        </a>&nbsp;
        <a href="#/<?php echo Bloc::forge('bloc_video')->getUri() ?>" class="modifier_bloc">
            <img src="/assets/img/edit_16.png" />
        </a>&nbsp;
        <a href="#/<?php echo Bloc::forge('bloc_video')->getUri() ?>" class="supprimer_bloc">
            <img src="/assets/img/delete_16.png" />
        </a>
    </div>
    <?php endif; ?>
    <div style="width:630px;height:472px;" href="<?php echo \Config::get('blocvideo.relpath').$path ?>" id="player_<?php echo $bloc_id ?>"></div>
</div>

<script type="text/javascript">

$(document).ready(function()
{
    flowplayer('player_<?php echo $bloc_id ?>', '/assets/js/flowplayer/flowplayer.swf',{
    clip: {
scaling:'fit',
autoPlay:false
}});
});
    
</script>