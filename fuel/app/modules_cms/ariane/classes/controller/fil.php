<?php

namespace Ariane;

class Controller_Fil extends \Controller_Hybrid
{
    
    public function action_voir($page_id)
    {
        try {
            $content = \Cache::get('ariane_'.$page_id);
        }
        catch(\CacheNotFoundException $e)
        {
            $arbo = \Arborescence_Arbre::forge();
            $page = $arbo->findChild('Arborescence_Page', $page_id);
            $parents = $page->getParents($arbo);
            $content = \View::forge('voir', array('parents'=>$parents, 'page'=>$page))->render();
            \Cache::set('ariane_'.$page_id, $content, null, array('arborescence'));
        }
        return $content;
        
    }
    
}