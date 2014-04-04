<div id="login_bloc">
    <hr />
    <?php if(Auth::check()) : ?>
    <a  href="/admin/index?logout=true">Déconnexion</a>
    <?php else : ?>
    <?php Message\Message::display('echec_login') ?>
    <form method="POST" id="login_form">
    Login : <input type="text" name="login" id="field_login" /><br />
    Mot de passe : <input type="password" name="password" id="field_password" /><br />
    <input type="submit" name="btn_login" value="Se connecter" />
    </form>
    <?php endif; ?>
</div>