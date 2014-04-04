<?php

class Menu_Item {
    
    protected $url;
    protected $title;
    
    public function __construct($url, $title)
    {
        $this->url = $url;
        $this->title = $title;
    }
    
    public function getUrl()
    {
        return $this->url;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
    
}
