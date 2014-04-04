<?php

class Controller_Admin_Arborescence extends Controller_Admin {
        
    public function action_arbo(){
        
        Asset::js('admin/arborescence.js', array(), 'cms');
        $this->template->content = View::forge('admin/arborescence/arbo');
        //$this->template->content->set('arbo',Arborescence_Arbre::forge()->render(),false);
        
    }
    
    public function action_rubrique($id){
        
        if(!Request::is_hmvc())
            die('Accès interdit');

        $arbo = Arborescence_Arbre::forge();
        if($rubrique = $arbo->findChild('Arborescence_Rubrique', $id))
        {
        
            $view = View::forge('admin/arborescence/rubrique');
            $view->rubrique = $rubrique;
            return \Fuel\Core\Response::forge($view);
            
        }
        else
        {
            return ' ';
        }
        
    }
    
    public function action_page($id){
        
        if(!Request::is_hmvc())
            die('Accès interdit');
        
        $arbo = Arborescence_Arbre::forge();
        if($page = $arbo->findChild('Arborescence_Page', $id))
        {
        
            $view = View::forge('admin/arborescence/page');
            $view->page = $page;
            return \Fuel\Core\Response::forge($view);
            
        }
        else
        {
            return ' ';
        }
        
    }
    
}