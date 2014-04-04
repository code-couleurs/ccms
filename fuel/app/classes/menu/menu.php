<?php

namespace Menu;

abstract class Menu {
    
    public static $type;
    protected $items = array();
    
    public function __construct()
    {
        $this->items = array();
        $this->buildItems();
    }
    
    public function buildItems(){
        
        \Event::trigger('menu_buildItems', $this);
        
    }
    
    public function addItem($url, $title){
        
        $this->items[] = new \Menu_Item($url, $title);
        
    }
    
    public function getItems()
    {
        return $this->items;
    }
            
    
}