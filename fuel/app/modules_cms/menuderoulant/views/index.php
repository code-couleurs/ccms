<ul class="menu_niveau_1">
    <li class="accueil"><a href="/">Accueil</a></li>
    <?php foreach($arbo->getChildren('Arborescence_Rubrique') as $key=>$branche): ?>
    <li class="item_niveau_1 menu-<?php echo $key ?> <?php if($branche->findChild('Arborescence_Page', $page_id)) echo 'active-trail' ?>">
        <a href="<?php echo $branche->getUrl() ?>" <?php if(strpos($branche->getUrl(), 'http') !== false) echo 'target="_blank"' ?>>
            <?php echo $branche->getTitle(); ?>            
        </a>
        <?php if(count($branche->getChildren())>1): ?>
        <ul class="menu_niveau_2">
            <?php foreach($branche->getChildren() as $key=>$sousbranche): ?>
            <li class="item_niveau_2 menu-<?php echo $key ?>">
                <a href="<?php echo $sousbranche->getUrl() ?>" <?php if(strpos($sousbranche->getUrl(), 'http') !== false) echo 'target="_blank"' ?>>
                    <?php echo $sousbranche->getTitle() ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </li>
    <?php endforeach; ?>
    <li class="last">
        <a href="/utilisateurs/quick_login" class="fancy_link login_link">
            <img border="0" src="/assets/img/icone-user-infos.png" />
        </a>
    </li>
</ul>