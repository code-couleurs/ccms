<?php

abstract class Arborescence_Branche {
    
    public $id;
    
    public function findChild($class_name, $id)
    {
        if(get_class($this) == $class_name && $this->id == $id)
            return $this;
        foreach($this->getChildren() as $branche)
        {
            if(get_class($branche) == $class_name && $id == $branche->id)
                return $branche;
            else if($child_searched = $branche->findChild($class_name, $id))
                return $child_searched;
        }
        return false;
        
    }
    /**
     *
     * @param type $branche le parent supérieur max (= racine le plus souvent)
     * @param type $parents
     * @return type 
     */
    public function getParents($branche, $parents = array())
    {
        foreach($branche->getChildren() as $sousbranche)
        {
            if($sousbranche->findChild(get_class($this), $this->id))
            {
                $parents[] = $sousbranche;
                $parents = $this->getParents($sousbranche, $parents);
            }
        }
        return $parents;
    }
    
    abstract public function getUrl();
    abstract public function getTitle();
    abstract public function hasChildren();
    abstract public function getChildren();
    
}