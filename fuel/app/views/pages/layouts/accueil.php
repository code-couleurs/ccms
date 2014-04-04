<div id="content-left" class="content-one">
	<?php echo $menu_revisions ?>
	<?php echo $menu_contributeur ?>
	<?php echo $menu_valideur ?>
	<h1>
		<?php echo $page->titre ?>
	</h1>
	<div  id="liste_blocs">
		<?php foreach($blocs as $bloc): ?>
			<?php echo $bloc ?>
		<?php endforeach; ?>
	</div>
	<?php if(count($blocs) == 0): ?>
	<p>Le contenu de cette page est en cours de rédaction</p>
	<?php endif; ?>
</div>
<div class="clear"></div>