<?php

class Controller_Admin_Pages extends Controller_Admin
{
    
    
    public function post_ajouter()
    {
        $page = Model_Page::forge();
        $page->titre = Input::post('titre');
        $page->rubrique_id = intval(Input::post('rubrique_id'));
        $page->build_url_from_title();
        $page->auto_position();
        $page->save();
        $data = Request::forge('admin_arborescence/page/'.$page->id, false)->execute()->__toString();
        return array($data);
    }
    
    public function post_modifier()
    {
        $page = Model_Page::find(Input::post('page_id'));
        $page->titre = Input::post('titre');
        $page->save();
        
        $data = array($page->titre);
        return $data;
    }
    
    
    public function post_supprimer()
    {
        try {
            Model_Page::find(Input::post('id'))->delete();
            return array(true);
        }
        catch(Exception $e){
            return false;
        }
    }
    
     /*
    public function post_ordonner()
    {
        $position = 0;
        foreach(Input::post('pages', array()) as $page_id)
        {
            $page = Model_Page::find($page_id);
            $page->rubrique_id = Input::post('rubrique_id');
            $page->position = ++$position;
            $page->save();
        }
        
        return array(true);
        
    }*/
    
}