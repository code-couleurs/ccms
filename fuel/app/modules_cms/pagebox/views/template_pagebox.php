<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr" dir="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript">var fuel_url = '<?php echo Uri::base(false) ?>';</script>
        <?php echo Asset::js('jquery-1.8.2.min.js') ?>
        <?php echo Asset::js('jquery-ui-1.9.1.custom.min.js'); ?>
        <?php echo Asset::css('jquery-ui-1.9.1.custom.min.css'); ?>
        <?php echo Asset::css('menu.css'); ?>
        <?php echo Asset::css('menu-rubrique.css'); ?>
        <?php echo Asset::css('ariane.css'); ?>
        <!--[if IE 7]>
        <?php echo Asset::css('ie7.css'); ?>
        <![endif]-->
        <?php echo Asset::render('cms') ?>
    </head>
    <title><?php echo empty($page) ? 'Portail DPS' : $page->titre; ?></title>
    <body>
        
        <div id="container">
        
            <div id="content">
                <div id="content-left">
                    <h1>Edition d'une pagebox</h1>
                    <?php echo $menu_contributeur ?>
                    <div  id="liste_blocs">
                        <?php foreach($blocs as $bloc): ?>
                            <?php echo $bloc ?>
                        <?php endforeach; ?>
                    </div>
                    <?php if(count($blocs) == 0): ?>
                    <p>Le contenu de cette page est en cours de rédaction</p>
                    <?php endif; ?>
                </div>
                <div style="float:right; margin-right:10px; margin-top:20px;">
                    <a href="/<?php echo $frompage_url ?>?brouillon=true">Revenir à la page</a>
                </div>
                <div style="clear:both"></div>
            </div>
        </div>
        <div id="footer">
            <div id="footer-content">
                <a href="/files/afaq.pdf" target="_blank">
                    <img border="0" src="/assets/img/logo-af-aq.gif" />
                </a>
            </div>
        </div>
    </body>
</html>