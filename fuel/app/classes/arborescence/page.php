<?php

class Arborescence_Page extends Arborescence_Branche {
    
    public $model;
    public $id;
    
    public function __construct($model)
    {
        $this->model = $model;
        $this->id = $model->id;
    }
    
    public function getChildren()
    {
        return array();
    }
    
    public function hasChildren()
    {
        return false;
    }
    
    public function getTitle()
    {
        return $this->model->titre;
    }
    
    public function getUrl()
    {
        return $this->model->url;
    }
    
}