<h2>Actions contributeur</h2>
<?php if(Session::get('mode_contribution', false)): ?>

<ul class="menu_contributeur">
    <li>
        Ajouter un bloc
        <ul class="liens_ajout_blocs">
            <li>
                <?php foreach(Bloc::getVisibleBlocs() as $bloc): ?>
                <a class="add_bloc" href="#<?php echo $bloc->getUri() ?>"><?php echo $bloc->getIntitule() ?></a>  -  
                <?php endforeach; ?>
            </li>
        </ul>
    </li>
    <?php if(!$valideur): ?>
    <a href="/pages/get_form_validation/<?php echo $page_id ?>" id="ask_validation"><li>Demander la validation de la page</li></a>
    <?php endif; ?>
    
</ul>

<?php endif; ?>