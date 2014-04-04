<?php

class Arborescence_Observer extends Orm\Observer {
    
    public function after_save()
    {
        Cache::delete('arborescence');
        Event::trigger('cache/arborescence/delete');
    }
    
    public function after_delete()
    {
        Cache::delete('arborescence');
        Event::trigger('cache/arborescence/delete');
    }
    
}