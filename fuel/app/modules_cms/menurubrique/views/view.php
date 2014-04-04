<span class="menu_rubrique_title">
    <?php echo $rubrique->getTitle() ?>
</span>
<ul class="menu_rubrique_sousrubriques">
    <?php foreach($rubrique->getChildren() as $sousrubrique): ?>
    <li <?php if($sousrubrique->findChild('Arborescence_Page', $page_id)) echo 'class="active-trail"' ?>>
        <div><a href="<?php echo $sousrubrique->getUrl() ?>" <?php if(strpos($sousrubrique->getUrl(), 'http') !== false) echo 'target="_blank"' ?>><?php echo $sousrubrique->getTitle() ?></a></div>
        <ul class="menu_rubrique_pages">
            <?php foreach($sousrubrique->getChildren('Arborescence_Page') as $page) : ?>
            <li>
                <a <?php if($page->id == $page_id) echo 'class="active"' ?> href="<?php echo $page->getUrl() ?>" <?php if(strpos($page->getUrl(), 'http') !== false) echo 'target="_blank"' ?>><?php echo $page->getTitle() ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </li>
    <?php endforeach; ?>
</ul>