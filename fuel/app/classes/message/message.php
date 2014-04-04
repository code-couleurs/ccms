<?php

namespace Message;

abstract class Message {
    
    protected $text;
    protected static $_collection;
    
    public function __construct($text)
    {
        $this->text = $text;
    }    
    
    abstract function render();
    
    public function __toString()
    {
        return $this->render();
    }
    
    public static function __callStatic($method, $args)
    {
        if(empty(static::$_collection))
        {
            static::$_collection = new \Message_Collection();
        }
        if(method_exists(static::$_collection, $method))
        {
            return call_user_func_array(array(static::$_collection, $method), $args);
        }
        
        throw new \BadMethodCallException('Invalid method: '.get_called_class().'::'.$method);
    }
}