<?php

namespace Menurubrique;

class Controller_Menu extends \Controller_Base 
{
    
    public function action_view($page_id)
    {
        try 
        {
            $content = \Cache::get('menurubrique_view_'.$page_id);
        }
        catch(\CacheNotFoundException $e)
        {
            $view = \View::forge('view');

            $arbo = \Arborescence_Arbre::forge();

            foreach($arbo->getChildren('Arborescence_Rubrique') as $rubrique)
            {
                if($rubrique->findChild('Arborescence_Page', $page_id))
                    break;

            }
            $view->rubrique = $rubrique;
            $view->page_id = $page_id;
            $content = $view->render();
            \Cache::set('menurubrique_view_'.$page_id, $content, false, 'arborescence');
        }
        return $content;
        
    }
    
}