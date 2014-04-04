<?php if(isset($cache_removed)): ?>
<script type="text/javascript">

$(document).ready(function()
{
    $.pnotify({
        pnotify_text: 'Cache vidé',
        pnotify_nonblock: false,
        pnotify_delay: 2000
    });
});

</script>
<?php endif; ?>

<form method="POST">
    <input type="hidden" name="remove_cache" value="1" />
    <input type="submit" value="Vider le cache" />
</form>