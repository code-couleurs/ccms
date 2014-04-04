<div id="ariane">
    <div>VOUS ETES ICI</div>
    <ul id="fil-ariane">
        <li><a href="/">Accueil</a></li>
        <?php foreach($parents as $parent): ?>
        <?php if(get_class($parent) == 'Arborescence_Page')continue; ?>
        <li><a href="<?php echo $parent->geturl() ?>"><?php echo $parent->getTitle() ?></a></li>
        <?php endforeach; ?>
    </ul><br/>
</div>