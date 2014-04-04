<?php

class Cache extends Fuel\Core\Cache {
    
    public static function get($identifier, $use_expiration = true)
    {
        if(!Config::get('cache_enabled'))
        {
            throw new CacheNotFoundException();
        }
        else
        {
            return parent::get($identifier, $use_expiration);
        }
        return false;
    }
    
    public static function set($identifier, $contents = null, $expiration = false, $dependencies = array())
    {
        if(!Config::get('cache_enabled'))
        {
            return false;
        }
        else
        {
            parent::set($identifier, $contents, $expiration, $dependencies);
        }
        return false;
    }
    
}