<?php

class Arborescence_Arbre {
    
    protected $_racine;
    protected static $_instance;
    
    public function __construct()
    {
        $this->_racine = Arborescence_Rubrique::forge();
    }
    
    public static function instance()
    {
        if(empty(self::$_instance))
        {
            try {
                self::$_instance = Cache::get('arborescence');
            } 
            catch(CacheNotFoundException $e)
            {
                self::$_instance = new Arborescence_Arbre();
                Cache::set('arborescence', self::$_instance);
            }
            
        }
        return self::$_instance;
    }
    
    public static function forge()
    {
        $arbo = self::instance();
        return $arbo;
    }
    
    public function render()
    {
        return $this->_racine->render();
    }
    
    public function getChildren($class_name = null)
    {
        return $this->_racine->getChildren($class_name);
    }
    
    public function findChild($class_name, $id)
    {
        if($id == 0)
            return $this->_racine;
        return $this->_racine->findChild($class_name, $id);
    }
    
    public function getTitle()
    {
        return 'Accueil';
    }
    
    public function getUrl()
    {
        return '/';
    }
}