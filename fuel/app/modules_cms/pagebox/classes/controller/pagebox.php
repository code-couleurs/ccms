<?php

namespace Pagebox;

class Controller_Pagebox extends \Controller_Base {
    
    
    public $template = 'template_pagebox';
    
    public function action_list($bloc_id)
    {
        $a_pagebox = Model_Pagebox::get_list($bloc_id);
        
        $view = \View::forge('view_list');
        $view->bloc_id = $bloc_id;
        $view->pagebox_list = $a_pagebox;
        
        $contenu = $view->render();
        return \Response::forge($contenu);
    }
    
    public function action_view($pagebox_id)
    {
        /*
        \Asset::css('style.css', array(), 'cms');        
        \Asset::add_path('assets/js/fancybox/', 'css');
        \Asset::css('jquery.fancybox-1.3.4.css', array(), 'cms');
        \Asset::js('fancybox/jquery.fancybox-1.3.4.pack.js', array(), 'cms');
        \Asset::js('pages/partout.js', array(), 'cms');
        \Asset::css('jquery.fancybox-1.3.4.css', array(), 'cms');
        \Asset::js('flowplayer/flowplayer.js', array(), 'cms');
        \Asset::css('flowplayer/minimalist.css', array(), 'cms');
        */
        
        $pagebox = Model_Pagebox::find($pagebox_id);
        $blocs = array();
        foreach($pagebox->blocs as $bloc)
        {
            $blocs[] = \Request::forge(\Bloc::forge($bloc->code)->getViewUri($bloc->id))->execute();
        }
        $view = \View::forge('public');
        $view->set('blocs', $blocs, false);
        $view->pagebox_id = $pagebox_id;
        $view->contribution = \Session::get('mode_contribution', false);
        return new \Response($view);

    }
    
    
    public function action_edit($pagebox_id)
    {
       
        \Session::set('revision_id', 0);
        if(intval($pagebox_id)>0)
            \Session::set('pagebox_id', $pagebox_id);
        
        \Asset::css('style.css', array(), 'cms');        
        \Asset::add_path('assets/js/fancybox/', 'css');
        \Asset::css('jquery.fancybox-1.3.4.css', array(), 'cms');
        \Asset::js('fancybox/jquery.fancybox-1.3.4.pack.js', array(), 'cms');
        \Asset::js('pages/partout.js', array(), 'cms');
        \Asset::css('jquery.fancybox-1.3.4.css', array(), 'cms');
        \Asset::js('flowplayer/flowplayer.js', array(), 'cms');
        \Asset::css('flowplayer/minimalist.css', array(), 'cms');
        \Asset::js('jquery.iframe-transport.js', array(), 'cms');
        \Asset::js('jquery.fileupload.js', array(), 'cms');
        \Asset::add_path('assets/js/pnotify/', 'css');
        \Asset::js('fancy_form.js', array(), 'cms');
        \Asset::js('pnotify/jquery.pnotify.min.js', array(), 'cms');
        \Asset::css('jquery.pnotify.default.css', array(), 'cms');
        \Asset::js('pages/contributeur.js', array(), 'cms');
        \Asset::js('pages/valideur.js', array(), 'cms');
        \Asset::js('ckeditor/ckeditor.js', array(), 'cms');
        \Asset::js('ckeditor/adapters/jquery.js', array(), 'cms');
        
        $pagebox = Model_Pagebox::find($pagebox_id);
        $this->template->set('frompage_url', $pagebox->get_parent_page()->url);
        
        $this->template->set('menu_contributeur',\Request::forge('pagebox/menu_contributeur/'.$pagebox_id)->execute(), false);
        
        $blocs = array();
        foreach($pagebox->blocs as $bloc)
        {
            $blocs[] = \Request::forge(\Bloc::forge($bloc->code)->getViewUri($bloc->id))->execute();
        }
        $this->template->set('blocs', $blocs, false);
        
    }
    
    public function action_menu_contributeur($pagebox_id)
    {
        return \View::forge('menu_contributeur', array('pagebox_id'=>$pagebox_id));
    }
    
    public static function handle_save_bloc($bloc)
    {
        if(empty($bloc->id) && (is_null($bloc->revision_id) || $bloc->revision_id == 0) && \Session::get('pagebox_id', 0)>0)
        {
            $pagebox = Model_Pagebox::find(\Session::get('pagebox_id'));
            $bloc->position = $pagebox->get_next_bloc_position();
            $bloc->pagebox_id = $pagebox->id;            
        }
    }
    
    public static function handle_duplicate_bloc($params)
    {
        
        foreach(Model_Pagebox::get_list($params['old_bloc_id']) as $pagebox)
        {
            $pagebox->duplicate($params['new_bloc_id']);
        }
        
    }
    
    public static function build_pageboxes_from_text($bloc_id, $content)
    {
        $dom = new \DOMDocument();
        $dom->loadHtml($content);
        foreach($dom->getElementsByTagName('a') as $anchor)
        {
            if($anchor->getAttribute('href') == '{pagebox_create}')
            {
                $pagebox = new Model_Pagebox();
                $pagebox->titre = $anchor->nodeValue;
                $pagebox->bloc_parent_id = $bloc_id;
                $pagebox->save();
                $anchor->setAttribute('href', '/pagebox/pagebox/view/'.$pagebox->id);
            }
        }
        return $dom->saveHTML();
    }
    
    public static function duplicate_pageboxes_from_text($bloc_id, $content)
    {
        if(!empty($content))
        {
            $dom = new \DOMDocument();
            $dom->loadHtml($content);
            foreach($dom->getElementsByTagName('a') as $anchor)
            {
                if(strpos($anchor->getAttribute('href'), '/pagebox') !== false)
                {
                    $href = $anchor->getAttribute('href');
                    $href_elements = explode('/',$href);
                    $pagebox_id = $href_elements[count($href_elements)-1];
                    $pagebox = Model_Pagebox::find($pagebox_id);
                    $new_pagebox = $pagebox->duplicate($bloc_id);
                    $anchor->setAttribute('href', '/pagebox/pagebox/view/'.$new_pagebox->id);
                }
            }
            return $dom->saveHTML();
        }
    }
     
    

}