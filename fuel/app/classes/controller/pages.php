<?php

class Controller_Pages extends Controller_Base {
    
    
    public function action_view($url)
    {
        \Profiler::mark('Controller_Pages::action_view Start');
        $page = Model_Page::find_by_url($url);
        
        $this->template->content = View::forge('pages/layouts/'.$page->template);
        $this->template->content->set('menu_revisions',Request::forge('pages/menu_revisions/'.$page->id)->execute(), false);
        $this->template->content->set('menu_contributeur',Request::forge('pages/menu_contributeur/'.$page->id)->execute(), false);
        $this->template->content->set('menu_valideur',Request::forge('pages/menu_valideur/'.$page->id)->execute(), false);
        
        
        Asset::css('style.css', array(), 'cms');
        
        Asset::add_path('assets/js/fancybox/', 'css');
        Asset::css('jquery.fancybox-1.3.4.css', array(), 'cms');
        Asset::js('fancybox/jquery.fancybox-1.3.4.pack.js', array(), 'cms');
        Asset::js('pages/partout.js', array(), 'cms');
        Asset::css('jquery.fancybox-1.3.4.css', array(), 'cms');
        Asset::js('flowplayer/flowplayer.js', array(), 'cms');
        Asset::css('flowplayer/minimalist.css', array(), 'cms');
        if(Session::get('mode_contribution', false) || Session::get('mode_validation', false))
        {
            Asset::js('jquery.iframe-transport.js', array(), 'cms');
            Asset::js('jquery.fileupload.js', array(), 'cms');
            Asset::add_path('assets/js/pnotify/', 'css');
            Asset::js('fancy_form.js', array(), 'cms');
            Asset::js('pnotify/jquery.pnotify.min.js', array(), 'cms');
            Asset::css('jquery.pnotify.default.css', array(), 'cms');
            Asset::js('pages/contributeur.js', array(), 'cms');
            Asset::js('pages/valideur.js', array(), 'cms');
            \Asset::js('ckeditor/ckeditor.js', array(), 'cms');
            \Asset::js('ckeditor/adapters/jquery.js', array(), 'cms');
            if(!$revision = Model_Revision::find_brouillon($page->id))
            {
                $revision = Model_Revision::create_brouillon($page->id);
            }
            Session::set('revision_id', $revision->id);
        }
        else
        {
            $revision = $page->get_current_revision();
            Session::set('revision_id', $revision->id);
        }
        
        $this->template->content->page = $page;
        $this->template->page = $page;
        
        $blocs = array();
        foreach($revision->blocs as $bloc)
        {
            $blocs[] = Request::forge(Bloc::forge($bloc->code)->getViewUri($bloc->id))->execute();
        }
        $this->template->content->set('blocs',$blocs,false);
        $this->template->set('content', $this->template->content->render(), false);  
        return $this->template->render();
        \Profiler::mark('Controller_Pages::action_view End');
    }
    
    public function action_menu_revisions($page_id)
    {
        $validation = $contribution = false;
        if(Auth::instance()->is_allowed($page_id, 'contributeur'))
        {
            $contribution = true;
            Session::set('mode_contribution', true);
        }
        if(Auth::instance()->is_allowed($page_id, 'valideur'))
        {
            $validation = true;
            Session::set('mode_validation', true);
        }
        if(!$contribution && !$validation)
        {
            Session::set('mode_contribution', false);
            Session::set('mode_validation', false);
            return ' ';
        }
        
        $view = View::forge('pages/menus/revisions', array('page_id'=>$page_id));

        if(Input::get('brouillon', 'false') == 'true')
        {
            if($contribution)
            {
                Session::set('mode_contribution', true);
            }
            if($validation)
            {
                Session::set('mode_validation', true);
            }
            if(!$brouillon = Model_Revision::find_brouillon($page_id))
            {
                $brouillon = Model_Revision::create_brouillon($page_id);
                Session::set('revision_id', $brouillon->id);
            }
            $view->is_brouillon = true;
        }
        else
        {
            Session::delete('mode_contribution');
            Session::delete('mode_validation');
            Session::delete('revision_id');
            $view->is_brouillon = false;
        }
        return Response::forge($view, 200, array('Cache-Control' => 'no-cache, no-store, max-age=0, must-revalidate',  'Pragma' => 'no-cache'));
    }
    
    public function action_menu_contributeur($page_id)
    {
        Profiler::mark('Pages::action_menu_contributeur Start');
        if(!Session::get('mode_contribution', false) || !Auth::instance()->is_allowed($page_id, 'contributeur'))
        {
            Profiler::mark('Pages::action_menu_contributeur End');
            return ' ';
        }
        
        Profiler::mark('Pages::action_menu_contributeur End');
        
        return View::forge('pages/menus/contributeur', array('page_id'=>$page_id, 'valideur'=>Auth::instance()->is_allowed($page_id, 'valideur')));
        
    }
    
    public function action_menu_valideur($page_id)
    {
        if(!Session::get('mode_validation', false) || !Auth::instance()->is_allowed($page_id, 'valideur'))
        {
            return ' ';
        }
        return View::forge('pages/menus/valideur', array('page_id'=>$page_id, 'validation'=>Session::get('mode_validation', false)));
    }
    
    public function action_valide($page_id)
    {
        
        if(!Auth::instance()->is_allowed($page_id, 'valideur'))
            die();
        
        $current = Model_Revision::find_current($page_id);
        $current->type = 'archive';
        
        $new = Model_Revision::find_brouillon($page_id);
        $new->type = 'current';
        
        $current->save();
        $new->save();
        
        if(!empty($new->contributeur_id) && $new->contributeur_id != Auth::instance()->utilisateur->id)
        {
            $valideur = Auth::instance()->utilisateur;
            $contributeur = Model_Utilisateur::find($new->contributeur_id);
            $page = Model_Page::find($page_id);
            
            $view = View::forge('mails/confirm_validation');
            $view->valideur = $valideur;
            $view->url = Uri::base(false).$page->url;
            $view->page = $page;
            
            \Package::load('email');
            $email = \Email::forge();
            $email->from($valideur->email, $valideur->prenom.' '.$valideur->nom);
            $email->to($contributeur->email, $contributeur->prenom.' '.$contributeur->nom);
            $email->subject('Portail de la professionnalisation : validation de la contribution');
            $email->html_body($view->render());
            $email->alt_body(str_replace('<br />', "\r\n", $view->render()));
            try
            {
                $email->send();
            }
            catch(\EmailValidationFailedException $e)
            {
                return 'ko';
            }
            catch(\EmailSendingFailedException $e)
            {
                return 'ko';
            }
        }
        
        
        Session::delete('revision_id');
        Session::delete('mode_contribution');
        Session::delete('mode_validation');
        
        $page = Model_Page::find($page_id);
        Response::redirect('/'.$page->url);
    }
    
    public function get_arbo_as_options()
    {
        function arbo_fillOptions($options, $branche, $append)
        {
            $options[] = array(
                'url' => $branche->getUrl(),
                'titre' => $append.$branche->getTitle(),
            );
            foreach($branche->getChildren() as $sousbranche)
            {
                $options = arbo_fillOptions($options, $sousbranche, $append.' > ');
            }
            return $options;
        }
        $options = arbo_fillOptions(array(), Arborescence_Arbre::forge(), '');
        return $options;
    }
    
    public function action_add_document()
    {
        return Format::forge($this->post_add_document())->to_json();
    }
    
    public function post_add_document()
    {
        if(!empty($_FILES['doc_to_upload']['size']))
        {
            $filename = pathinfo($_FILES['doc_to_upload']['name'], PATHINFO_FILENAME);
            $extension = pathinfo($_FILES['doc_to_upload']['name'], PATHINFO_EXTENSION);
            $append = '';
            $i = 2;
            while(file_exists(DOCROOT.'files'.DS.$filename.$append.'.'.$extension))
            {
                $append = '_'.$i++;
            }
            $filename = $filename.$append.'.'.$extension;
            $filepath = DOCROOT.'files'.DS.$filename;
            if(move_uploaded_file($_FILES['doc_to_upload']['tmp_name'], $filepath))
            {
                return array('/files/'.$filename);
            }
        }
        return array('');
    }
    
    public function action_get_form_validation($page_id)
    {
        if(!Auth::instance()->is_allowed($page_id, 'contributeur'))
            die();
        $view = View::forge('pages/forms/validation');
        $view->valideurs = Model_Utilisateur::get_valideurs($page_id);
        $view->page_id = $page_id;
        return Response::forge($view);
    }
    
    public function action_post_form_validation()
    {
        $page_id = Input::post('page_id');
        
        
        if(!Auth::instance()->is_allowed($page_id, 'contributeur'))
            die();
        
        $contributeur = Auth::instance()->utilisateur;
        $valideur = Model_Utilisateur::find(Input::post('valideur_id'));
        
        $brouillon = Model_Revision::find_brouillon($page_id);
        $brouillon->contributeur_id = $contributeur->id;
        $brouillon->save();
        
        $view = View::forge('mails/validation');
        $view->contributeur = $contributeur;
        $view->message = Input::post('message');
        $view->url_validation = Uri::base(false).'pages/voir_page_valideur/'.Input::post('page_id');
        
        \Package::load('email');
        $email = \Email::forge();
        $email->from($contributeur->email, $contributeur->prenom.' '.$contributeur->nom);
        $email->to($valideur->email, $valideur->prenom.' '.$valideur->nom);
        $email->subject('Portail de la professionnalisation : demande de validation');
        $email->html_body($view->render());
        $email->alt_body(str_replace('<br />', "\r\n", $view->render()));
        try
        {
            $email->send();
        }
        catch(\EmailValidationFailedException $e)
        {Log::error('mauvais mail');
            return 'ko';
        }
        catch(\EmailSendingFailedException $e)
        {Log::error('erreur d\'envoi');
            return 'ko';
        }

        return 'ok';
    }
    
    public function action_voir_page_valideur($page_id)
    {
        
        $page = Model_Page::find($page_id);
        if(!Auth::instance()->is_allowed($page_id, 'valideur'))
        {
            Asset::css('style.css', array(), 'cms');
            Asset::add_path('assets/js/fancybox/', 'css');
            Asset::css('jquery.fancybox-1.3.4.css', array(), 'cms');
            Asset::js('fancybox/jquery.fancybox-1.3.4.pack.js', array(), 'cms');
            Asset::js('pages/partout.js', array(), 'cms');
            Asset::css('jquery.fancybox-1.3.4.css', array(), 'cms');
            Asset::js('flowplayer/flowplayer.js', array(), 'cms');
            Asset::css('flowplayer/minimalist.css', array(), 'cms');
            $this->template->content = View::forge('pages/login');
            $this->template->page = $page;
            $this->template->nomenu = true;
        }
        else
        {
            Session::set('mode_validation', true);
            Response::redirect(Uri::base(false).$page->url.'?brouillon=true');
        }
    }
    
    public function action_get_form_refuse($page_id)
    {
        if(!Auth::instance()->is_allowed($page_id, 'valideur'))
            die();

        $view = View::forge('pages/forms/refuse');
        $view->page_id = $page_id;
        return Response::forge($view);
    }
    
    public function action_post_form_refuse()
    {
        $page_id = Input::post('page_id');
        
        if(!Auth::instance()->is_allowed($page_id, 'valideur'))
            die();
        
        
        $brouillon = Model_Revision::find_brouillon($page_id);
        
        if(!$brouillon || is_null($brouillon->contributeur_id))
            return 'ok';
        
        $page = Model_Page::find($page_id);
        
        $valideur = Auth::instance()->utilisateur;
        $contributeur = Model_Utilisateur::find($brouillon->contributeur_id);
        
        $view = View::forge('mails/refus_validation');
        $view->contributeur = $contributeur;
        $view->valideur = $valideur;
        $view->message = Input::post('message');
        $view->url = Uri::base(false).$page->url;
        $view->page = $page;
        
        \Package::load('email');
        $email = \Email::forge();
        $email->from($valideur->email, $valideur->prenom.' '.$valideur->nom);
        $email->to($contributeur->email, $contributeur->prenom.' '.$contributeur->nom);
        $email->subject('Portail de la professionnalisation : refus de la contribution');
        $email->html_body($view->render());
        $email->alt_body(str_replace('<br />', "\r\n", $view->render()));
        try
        {
            $email->send();
        }
        catch(\EmailValidationFailedException $e)
        {
            return 'ko';
        }
        catch(\EmailSendingFailedException $e)
        {
            return 'ko';
        }

        return 'ok';
    }
    
}