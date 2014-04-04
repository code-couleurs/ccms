<?php if(!empty($pagebox_list)) : ?>
<?php foreach($pagebox_list as $pagebox) : ?>
<a href="/pagebox/pagebox/edit/<?php echo $pagebox->id; ?>"><?php echo $pagebox->titre; ?></a>
<?php endforeach; ?>
<?php else : ?>
Aucune pagebox.
<?php endif; ?>
