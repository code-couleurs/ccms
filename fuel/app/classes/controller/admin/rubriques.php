<?php

class Controller_Admin_Rubriques extends Controller_Admin
{
    
    
    public function post_ajouter()
    {
        $rubrique = Model_Rubrique::forge();
        $rubrique->intitule = Input::post('intitule');
        $rubrique->parent_id = intval(Input::post('rubrique_id'));
        $rubrique->auto_position();
        $rubrique->save();
        $data = Request::forge('admin_arborescence/rubrique/'.$rubrique->id, false)->execute()->__toString();
        return array($data);
    }
    
    public function post_modifier()
    {
        $rubrique = Model_Rubrique::find(Input::post('rubrique_id'));
        $rubrique->intitule = Input::post('intitule');
        error_log($rubrique->intitule.' '.$rubrique->id);
        $rubrique->save();
        
        $data = array($rubrique->intitule);
        return $data;
    }
    
    public function post_supprimer()
    {
        try {
            Model_Rubrique::find(Input::post('id'))->delete();
            return array(true);
        }
        catch(Exception $e){
            return false;
        }
    }
    
    public function post_ordonner()
    {
        
        $position = 0;
        foreach(Input::post('branches', array()) as $branche)
        {
            if($branche['type'] == 'rubrique')
            {
                $sousrubrique = Model_Rubrique::find($branche['id']);
                $sousrubrique->parent_id = Input::post('id');
                $sousrubrique->position = ++$position;
                $sousrubrique->save();
            }
            else {
                $page = Model_Page::find($branche['id']);
                $page->rubrique_id = Input::post('id');
                $page->position = ++$position;
                $page->save();
            }
        }
        
        return array(true);
        
    }
    
}