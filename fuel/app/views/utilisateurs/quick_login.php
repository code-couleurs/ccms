<?php if(!Auth::check()): ?>
<form method="POST">
    NNI : <input type="text" name="login" /> 
    Passe : <input type="password" name="password" /> 
    &nbsp;<button type="submit" value="Se connecter" name="btn_login" class="form_valider">Se connecter</button>
</form>

<?php else: ?>

Vous êtes connecté (<?php echo Auth::instance()->get_screen_name() ?>)<br />
<a href="<?php Uri::main() ?>?logout=true">Se déconnecter</a>

<?php endif; ?>