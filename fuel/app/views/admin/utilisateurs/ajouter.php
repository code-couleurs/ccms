<?php echo Request::forge('admin_utilisateurs/menu')->execute(); ?>

<form method="POST">
    
    <?php \Message\Message::display('form_utilisateur') ?>
    
    <div class="intitule">Login</div>
    <?php echo Form::input('login', Input::post('login') ?: ''); ?>
    <?php echo $validation->error('login'); ?>
    <div style="clear:both;"></div>
    
    <div class="intitule">Mot de passe</div>
    <?php echo Form::password('password', Input::post('password') ?: ''); ?>
    <?php echo $validation->error('password'); ?>
    <div style="clear:both;"></div>
    
    <div class="intitule">Nom</div>
    <?php echo Form::input('nom', Input::post('nom') ?: ''); ?>
    <?php echo $validation->error('nom'); ?>
    <div style="clear:both;"></div>
    
    <div class="intitule">Prénom</div>
    <?php echo Form::input('prenom', Input::post('prenom') ?: ''); ?>
    <?php echo $validation->error('prenom'); ?>
    <div style="clear:both;"></div>
    
    <div class="intitule">Adresse email</div>
    <?php echo Form::input('email', Input::post('email') ?: ''); ?>
    <?php echo $validation->error('email'); ?>
    <div style="clear:both;"></div>
    
    <div class="intitule">Est admin ?</div>
    <?php echo Form::checkbox('is_admin', null, Input::post('is_admin') ? 'checked' : null); ?>
    <div style="clear:both;"></div>
    
    <?php echo Form::submit('modifier', 'Valider') ?>
    
</form>