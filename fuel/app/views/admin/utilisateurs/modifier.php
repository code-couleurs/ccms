<?php echo Request::forge('admin_utilisateurs/menu')->execute(); ?>

<form method="POST">
    
    <?php \Message\Message::display('form_utilisateur') ?>
    
    <h2>Infos utilisateur</h2>
    
    <div class="intitule">Login</div>
    <?php echo Form::input('login', Input::post('modifier') ? Input::post('login') : $utilisateur->login); ?>
    <?php echo $validation->error('login'); ?>
    <div style="clear:both;"></div>
    
    <div class="intitule">Mot de passe</div>
    <?php echo Form::checkbox('modifier_password', 'true') ?>
    <?php echo Form::password('password', Input::post('modifier') ? Input::post('password') : ''); ?>
    <?php echo $validation->error('password'); ?>
    <div style="clear:both;"></div>
    
    <div class="intitule">Nom</div>
    <?php echo Form::input('nom', Input::post('modifier') ? Input::post('nom') : $utilisateur->nom); ?>
    <?php echo $validation->error('nom'); ?>
    <div style="clear:both;"></div>
    
    <div class="intitule">Prénom</div>
    <?php echo Form::input('prenom', Input::post('modifier') ? Input::post('prenom') : $utilisateur->prenom); ?>
    <?php echo $validation->error('prenom'); ?>
    <div style="clear:both;"></div>
    
    <div class="intitule">Adresse email</div>
    <?php echo Form::input('email', Input::post('modifier') ? Input::post('email') : $utilisateur->email); ?>
    <?php echo $validation->error('email'); ?>
    <div style="clear:both;"></div>
    
    <div class="intitule">Est admin ?</div>
    <?php echo Form::checkbox('is_admin', 'is_admin', Input::post('modifier') ? (boolean)Input::post('is_admin') : (boolean)$utilisateur->is_admin); ?>
    <div style="clear:both;"></div>
    
    <h2>Contribution</h2>
    <?php echo Request::forge('admin_utilisateurs/droit_rubrique/contributeur/0/'.$utilisateur->id)->execute() ?>
    
    
    <h2>Validation</h2>
    <?php echo Request::forge('admin_utilisateurs/droit_rubrique/valideur/0/'.$utilisateur->id)->execute() ?>
    
    
    <?php echo Form::submit('modifier', 'Valider') ?>
    
</form>