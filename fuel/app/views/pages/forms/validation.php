Valideur :
<select name="valideur_id">
    <?php foreach($valideurs as $valideur): ?>
    <option value="<?php echo $valideur->id ?>"><?php echo $valideur->prenom ?> <?php echo $valideur->nom ?></option>
    <?php endforeach; ?>
</select><br />
Message :<br />
<textarea name="message" cols="60" rows="6"></textarea><br />
<input type="submit" value="Envoyer la demande" />
<input type="hidden" name="page_id" value="<?php echo $page_id ?>" />