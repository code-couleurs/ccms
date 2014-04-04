<?php echo Request::forge('admin_utilisateurs/menu')->execute(); ?>

<table id="admin_liste_utilisateurs" class="admin_liste">
    <tr>
        <th>Id</th>
        <th>Login</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Actions</th>
    </tr>
    <?php foreach($utilisateurs as $utilisateur): ?>
    <tr>
        <th><?php echo $utilisateur->id ?></th>
        <th><?php echo $utilisateur->login ?></th>
        <th><?php echo $utilisateur->nom ?></th>
        <th><?php echo $utilisateur->prenom ?></th>
        <th><a href="<?php echo Uri::create('admin_utilisateurs/modifier/'.$utilisateur->id) ?>">Modifier</th>
    </tr>
    <?php endforeach; ?>
</table>