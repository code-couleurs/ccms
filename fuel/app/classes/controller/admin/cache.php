<?php

class Controller_Admin_Cache extends Controller {
    
    public function action_remove_cache()
    {
        $view = View::forge('admin/cache');
        if(Input::post('remove_cache'))
        {
            Cache::delete_all();            
            $view->cache_removed = true;
        }
        return $view;
    }
    
}