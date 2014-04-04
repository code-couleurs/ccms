<?php

class ModuleCms extends \Fuel\Core\Module {
    
    public static function bootstrap_cms_modules()
    {
        \Profiler::mark('ModuleCms::bootstrap_cms_modules Start');
        $modules = self::list_cms_modules();
        static::load($modules);
        foreach($modules as $module=>$path)
        {
            \Config::load($module.'::config');
        }
        self::record_listeners();
        self::record_blocs();
        \Profiler::mark('ModuleCms::bootstrap_cms_modules End');
    }
    
    public static function list_cms_modules()
    {
        $paths = \Config::get('module_cms_paths', array());

        $modules = array();
        foreach ($paths as $path)
        {
            $files = scandir($path);
            foreach($files as $module)
            {
                if(is_dir($path.$module) && $module != '.' && $module != '..')
                {
                    $modules[$module] = $path.$module.DS;
                }
            }
        }
        return $modules;
    }
    
    protected static function record_listeners()
    {
        
        foreach(Config::get('cms_listeners', array()) as $listener)
        {
            Event::register($listener['event'], $listener['callback']);
        }
        
    }
    
    protected static function record_blocs()
    {
        foreach(Config::get('cms_blocs', array()) as $bloc)
        {
            Bloc::register($bloc);
        }
    }
    
}