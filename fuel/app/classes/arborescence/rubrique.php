<?php

class Arborescence_Rubrique extends Arborescence_Branche {
    
    public $id;
    public $model;
    
    public function __construct($model = null)
    {
        $this->model = $model;
        if($model != null)
        {
            $this->id = $model->id;
        }
        else
        {
            $this->id = 0;
        }
        $this->buildChildren();
    }
    
    public static function forge($model = null)
    {
        return new Arborescence_Rubrique($model);
    }
    
    public function getChildren($class_name = null)
    {
        if(is_null($class_name))
        {
            return $this->_children;
        }
        else
        {
            $cmp_function = function($child) use ($class_name)
                            {
                                return get_class($child) == $class_name;
                            };
            return array_filter($this->_children, $cmp_function);
                    
        }
    }
    
    public function hasChildren()
    {
        return !empty($this->_children);
    }
    
    public function buildChildren()
    {
        
        $this->_children = array();
        $rubriques_models = Model_Rubrique::find()
                                ->where('parent_id', $this->id)
                                ->order_by('position')
                                ->get();
        foreach($rubriques_models as $rubrique_model)
        {
            $this->_children[] = new Arborescence_Rubrique($rubrique_model);
        }
        
        $pages_models = Model_Page::find()
                            ->where('rubrique_id',$this->id)
                            ->order_by('position')
                            ->get();
        foreach($pages_models as $page_model)
        {
            $this->_children[] = new Arborescence_Page($page_model);
        }
        
        usort($this->_children, 
            function($branche1, $branche2)
            {
                if($branche1->model->position > $branche2->model->position)
                    return 1;
                else if($branche1->model->position < $branche2->model->position)
                    return -1;
                else
                    return 0;
            }
        );
        
    }
    
    public function getTitle()
    {
        if($this->model)
        {
            return $this->model->intitule;
        }
        else
        {
            return 'Racine';
        }
    }
    
    public function getUrl()
    {
        foreach($this->getChildren() as $branche)
        {
            if($branche->getUrl())
                return $branche->getUrl();
        }
        return false;
    }
    
    public function findChild($class_name, $id)
    {
        foreach($this->getChildren() as $branche)
        {
            if(get_class($branche) == $class_name && $id == $branche->id)
                return $branche;
            else if($child_searched = $branche->findChild($class_name, $id))
                return $child_searched;
        }
        return false;
        
    }
    
}
