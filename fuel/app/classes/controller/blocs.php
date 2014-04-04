<?php

abstract class Controller_Blocs extends Controller_Base
{
    
    abstract function action_get_form();
    abstract function post_ajouter();
    abstract function post_modifier();
    abstract function post_supprimer();
    abstract function action_view($bloc_id);
    abstract function action_duplicate($old_bloc_id, $new_bloc_id);
    
    function post_deplacer()
    {
        $bloc = Model_Bloc::find(Input::post('bloc_id'));
        $bloc->save_position(Input::post('position'));
        return true;
    }
    
}