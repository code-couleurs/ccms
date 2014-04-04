<?php if(\Auth::instance()->check_admin(false) && $contribution): ?>
<a href="/pagebox/pagebox/edit/<?php echo $pagebox_id ?>">
    Editer
</a>
<?php endif; ?>
<div id="content-left" style="padding-top:10px;">
<?php foreach($blocs as $bloc): ?>
<?php echo $bloc ?>
<?php endforeach; ?>
</div>
