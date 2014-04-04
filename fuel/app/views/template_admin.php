<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr" dir="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript">var fuel_url = '<?php echo Uri::base(false) ?>';</script>
        <?php echo Asset::js('jquery-1.8.2.min.js'); ?>
        <?php echo Asset::js('jquery-ui-1.9.1.custom.min.js'); ?>
        <?php echo Asset::css('jquery-ui-1.9.1.custom.min.css'); ?>
        <?php echo Asset::css('admin.css'); ?>
        <?php echo Asset::render('cms') ?>
    </head>
    <body>
        
        <?php if(Auth::instance()->check_admin(false)): ?>
        <?php echo Request::forge('admin/admin_menu')->execute(); ?>
        <div id="content"><?php echo $content ?></div>
        <?php else : ?>
        Vous n'avez pas les droits admin
        <?php endif; ?>
        
        <?php echo Request::forge('utilisateurs/login_form')->execute() ?>
        <?php echo Request::forge('admin_cache/remove_cache')->execute() ?>
        
    </body>
</html>