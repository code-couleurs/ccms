<?php

namespace blocchapo;

class Controller_BlocChapo extends \Controller_Blocs {
    
    
    public function action_get_form($bloc_id = null)
    {
        $view = \View::forge('form');
        if(is_null($bloc_id))
        {
            $bloc_texte = Model_BlocChapo::forge();
            $view->bloc_id = '';
            $view->titre = '';
            $view->contenu = '';
        }
        else
        {
            $bloc_texte = Model_BlocChapo::find_by_bloc_id($bloc_id);
            $view->bloc_id = $bloc_id;
            $view->contenu = $bloc_texte->contenu;
        }
        
        return \Response::forge($view);
    }
    
    public function action_view($bloc_id)
    {
        $bloc = Model_BlocChapo::find_by_bloc_id($bloc_id);
        $view = \View::forge('view');
        $view->bloc_id = $bloc->bloc_id;
        $view->set('contenu', $bloc->contenu, false);
        $view->contribution = \Session::get('mode_contribution', false);
        return \Response::forge($view);
    }
    
    public function post_ajouter()
    {
        $bloc_texte = new Model_BlocChapo();
        $bloc_texte->contenu = \Input::post('contenu');
        $bloc_texte->save(null, null, \Session::get('revision_id'));
        $bloc_texte->contenu = \Pagebox\Controller_Pagebox::build_pageboxes_from_text($bloc_texte->bloc->id, $bloc_texte->contenu);
        $bloc_texte->save();
        return array($bloc_texte->bloc->id);
    }
    
    public function post_modifier()
    {
        $bloc_texte = Model_BlocChapo::find_by_bloc_id(\Input::post('bloc_id'));
        $bloc_texte->contenu = \Input::post('contenu');
        $bloc_texte->save();
        $bloc_texte->contenu = \Pagebox\Controller_Pagebox::build_pageboxes_from_text($bloc_texte->bloc->id, $bloc_texte->contenu);
        $bloc_texte->save();
        return array($bloc_texte->bloc->id);
    }
    
    public function post_supprimer()
    {
        $bloc_texte = Model_BlocChapo::find_by_bloc_id(\Input::post('bloc_id'));
        $bloc_texte->delete();
        return array(true);
    }
    
    public function action_duplicate($old_bloc_id, $new_bloc_id)
    {
        if(!\Request::is_hmvc())
            die();

        Model_BlocChapo::find_by_bloc_id($old_bloc_id)->duplicate($new_bloc_id);
        
    }
}