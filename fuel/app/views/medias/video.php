<script type="text/javascript">

$(document).ready(function()
{
    flowplayer('player_<?php echo $gen_id ?>', '/assets/js/flowplayer/flowplayer.swf',{
    clip: {
scaling:'fit',
autoPlay: false
}});
});
    
</script>

<div class="video_player" href="<?php echo $media ?>" id="player_<?php echo $gen_id ?>">
<?php if(!empty($thumb)) : ?>
<img src="<?php echo $thumb ?>" />
<?php endif; ?>
</div>