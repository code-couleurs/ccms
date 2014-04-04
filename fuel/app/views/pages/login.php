<h1 style="margin-bottom:30px">Se connecter</h1>
<form method="POST">
    <div class="form_intitule">
        <label for="login">NNI:</label>
    </div>
    <div class="form_element">
        <input id="input_login" type="text" name="login" />
    </div>
    <div class="clear"></div>
    <div class="form_intitule">
        <label for="password">Password : </label>
    </div>
    <div class="form_element">
        <input type="password" name="password" />
    </div>
    <div class="clear"></div>
    <div class="form_intitule form_submit_btn">
        <button type="submit" class="form_valider" name="btn_login" value="Se connecter">Se connecter</button>
    </div>
</form>

<script type="text/javascript">
$(document).ready(function(){
   $('#input_login').focus(); 
});
</script>