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
        <div id="barre-haut-page">
            <div class="content">
                <ul id="menu-barre-haut">
                </ul>
            </div>
        </div>
        
        <div id="container">
            <div id="header">
                <?php if(!isset($nomenu)): ?>
                    <div id="menu"><?php echo Request::forge('menuderoulant/menu/index')->execute() ?></div>
                    <?php echo Request::forge('ariane/fil/voir/'.$page->id)->execute() ?>
                <?php endif; ?>
            </div>
            <div id="content">
                <?php echo $content ?>
            </div>
            <?php //echo Request::forge('utilisateurs/login_form')->execute(); ?>
        </div>
        <div id="footer">
            <div id="footer-content">
            </div>
        </div>
    </body>
</html>