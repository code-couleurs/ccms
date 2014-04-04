<?php

class Controller_Admin extends Controller_Base {
    
    public $template = 'template_admin';
    
    public function before(){
        
        Profiler::mark('Controller_Admin:before start');
        
        parent::before();
        
        if(Request::active()->controller !== 'Controller_Admin' && Request::active()->action !== 'index')
        {
            Auth::instance()->check_admin();
        }
        
        Asset::add_path('assets/js/fancybox/', 'css');
        Asset::add_path('assets/js/pnotify/', 'css');
        Asset::css('jquery.fancybox-1.3.4.css', array(), 'cms');
        Asset::js('fancybox/jquery.fancybox-1.3.4.pack.js', array(), 'cms');
        Asset::js('fancy_form2.js', array(), 'cms');
        Asset::js('pnotify/jquery.pnotify.min.js', array(), 'cms');
        Asset::css('jquery.pnotify.default.css', array(), 'cms');
       
        Profiler::mark('Controller_Admin:before end');
        
    }
    
    public function action_index(){
        
        $this->template->content = View::forge('admin/index');
        
    }
    
    public function action_admin_menu(){
        $view = View::forge('admin/menu');
        $view->menu = new Menu_Admin();
        return $view;
    }
    
    
}