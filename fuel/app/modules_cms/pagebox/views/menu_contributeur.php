<h2>Actions contributeur</h2>

<ul class="menu_contributeur">
    <li>
        Ajouter un bloc
        <ul class="liens_ajout_blocs">
            <li>
                <?php foreach(\Bloc::getVisibleBlocs() as $bloc): ?>
                <a class="add_bloc" href="#/<?php echo $bloc->getUri() ?>"><?php echo $bloc->getIntitule() ?></a>  -  
                <?php endforeach; ?>
            </li>
        </ul>
    </li>
    
</ul>
