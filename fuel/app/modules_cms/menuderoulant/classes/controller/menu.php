<?php

namespace Menuderoulant;

class Controller_Menu extends \Controller_Base {
    
    public function action_index()
    {
        if(!\Request::is_hmvc())
            return false;
        
        if(\Request::main()->uri != '')
        {
            $current_page = $page = \Model_Page::find()->where('url', \Request::main()->uri)->get_one();
            $page_id = $current_page->id;
        }
        else
        {
            $page_id = 0;
        }
        
        try {
            $content = \Cache::get('menuderoulant_viewindex_'.$page_id);
        }
        catch(\CacheNotFoundException $e)
        {
            $view = \View::forge('index');
            $view->arbo = \Arborescence_Arbre::forge();
            $view->page_id = $page_id;
            $content = $view->render();
            \Cache::set('menuderoulant_viewindex_'.$page_id, $content, null, array('arborescence'));
        }
        
        return $content;
        
    }
    
    public static function invalidate_cache()
    {
        //\Cache::delete('menuderoulant_viewindex_')
    }
    
    
}