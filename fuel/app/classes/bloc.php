<?php

class Bloc {
    
    protected static $_blocs = array();
    
    protected $_code;
    protected $_uri;
    protected $_intitule;
    public $invisible;
    
    public function __construct($code, $intitule, $uri, $invisible)
    {
        $this->_uri = $uri;
        $this->_intitule = $intitule;
        $this->_code = $code;
        $this->invisible = $invisible;
    }
    
    public static function register($bloc_data)
    {
        if(empty($bloc_data['invisible']))
            $bloc_data['invisible'] = false;
        static::$_blocs[] = new Bloc($bloc_data['code'], $bloc_data['intitule'], $bloc_data['uri'], $bloc_data['invisible']);
    }
    
    public static function getBlocs()
    {
        return static::$_blocs;
    }
    
    public static function getVisibleBlocs()
    {
        return array_filter(static::$_blocs, function($bloc)
        {
            return !$bloc->invisible;
        });
    }
    
    public function getCode()
    {
        return $this->_code;
    }
    
    public function getIntitule()
    {
        return $this->_intitule;
    }
    
    public function getUri()
    {
        return $this->_uri;
    }
    
    public function getFormUri($revision_id, $bloc_id = null)
    {
        return $this->_uri.'/get_form/'.$revision_id.'/'.$bloc_id;
    }
    
    public function getViewUri($bloc_id)
    {
        return $this->_uri.'/view/'.$bloc_id;
    }
    
    public function duplicate($old_id, $new_id)
    {
        Request::forge($this->_uri.'/duplicate/'.$old_id.'/'.$new_id)->execute();
    }
    
    public static function forge($code)
    {
        foreach(static::$_blocs as $bloc)
        {
            if($bloc->getCode() == $code)
                return $bloc;
        }
    }
    
}