<ul class="sousmenu_admin">
    <?php foreach($menu->getItems() as $item) : ?>
    <li><a href="<?php echo $item->getUrl() ?>"><?php echo $item->getTitle() ?></a></li>
    <?php endforeach; ?>
</ul>