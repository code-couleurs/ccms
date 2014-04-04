<?php

namespace bloctextemedia;

class Controller_BlocTexteMedia extends \Controller_Blocs {
    
    
    
    
    public function action_get_form($bloc_id = null)
    {
        $view = \View::forge('form');
        if(is_null($bloc_id))
        {
            $bloc_texte = Model_BlocTexteMedia::forge();
            $view->bloc_id = '';
            $view->titre = '';
            $view->contenu = '';
            $view->media_path = '';
        }
        else
        {
            $bloc_texte = Model_BlocTexteMedia::find_by_bloc_id($bloc_id);
            $view->bloc_id = $bloc_id;
            $view->titre = $bloc_texte->titre;
            $view->contenu = $bloc_texte->contenu;
            $view->media_path = $bloc_texte->media;
        }
        
        $view->titre_pagebox = '';
            
        return \Response::forge($view);
    }
    
    public function action_view($bloc_id)
    {
        try {   
            if(\Session::get('mode_contribution', false))
            {
                throw new \CacheNotFoundException;
            }
            $contenu = \Cache::get('bloc_view_'.$bloc_id);
        }
        catch(\CacheNotFoundException $e)
        {
            $bloc = Model_BlocTexteMedia::find_by_bloc_id($bloc_id);
            $view = \View::forge('view');
            $view->bloc_id = $bloc->bloc->id;
            $view->titre = $bloc->titre;
            $view->set('contenu', $bloc->contenu, false);
            $view->contribution = \Session::get('mode_contribution', false);
            $view->media = \Media::forge(\Config::get('bloctextemedia.relpath').$bloc->media, \Config::get('bloctextemedia.relpath').'thumbs/'.$bloc->media)->render();
            
            $contenu = $view->render();
            if(!\Session::get('mode_contribution', false))
            {
                \Cache::set('bloc_view_'.$bloc_id, $contenu);
            }
        }
        return \Response::forge($contenu);
    }
    
    public function post_ajouter()
    {
        $bloc = new Model_BlocTexteMedia();
        $bloc->titre = \Input::post('titre', '');
        $bloc->media = \Input::post('media_path', '');
        $bloc->contenu = \Input::post('contenu', '');
        $bloc->save(null, null, \Session::get('revision_id'));
        $bloc->contenu = \Pagebox\Controller_Pagebox::build_pageboxes_from_text($bloc->bloc->id, $bloc->contenu);
        $bloc->save();
        
        return array($bloc->bloc->id);
    }
    
    public function post_modifier()
    {
        $bloc = Model_BlocTexteMedia::find_by_bloc_id(\Input::post('bloc_id'));
        $bloc->titre = \Input::post('titre', '');
        $bloc->media = \Input::post('media_path', '');
        $bloc->contenu = \Input::post('contenu', '');
        $bloc->save();
        $bloc->contenu = \Pagebox\Controller_Pagebox::build_pageboxes_from_text($bloc->bloc->id, $bloc->contenu);
        $bloc->save();
        
        return array($bloc->bloc->id);
    }
    
    public function post_supprimer()
    {
        $bloc_texte = Model_BlocTexteMedia::find_by_bloc_id(\Input::post('bloc_id'));
        $bloc_texte->delete();
        return array(true);
    }
    
    public function action_upload()
    {
        
        if(!is_dir(\Config::get('bloctextemedia.syspath')))
        {
            mkdir(\Config::get('bloctextemedia.syspath'));
            chmod(\Config::get('bloctextemedia.syspath'), 0777);
        } 
        if(!is_dir(\Config::get('bloctextemedia.syspath').DS.'thumbs'))
        {
            mkdir(\Config::get('bloctextemedia.syspath').DS.'thumbs');
            chmod(\Config::get('bloctextemedia.syspath').DS.'thumbs', 0777);
        }
        
        $filename = pathinfo($_FILES['media']['name'], PATHINFO_FILENAME);
        $extension = pathinfo($_FILES['media']['name'], PATHINFO_EXTENSION);
        $append = '';
        $i = 2;
        while(file_exists(\Config::get('bloctextemedia.syspath').$filename.$append.'.'.$extension))
        {
            $append = '_'.$i++;
        }
        $filename = $filename.$append.'.'.$extension;
        $filepath = \Config::get('bloctextemedia.syspath').$filename;
        
        if(move_uploaded_file($_FILES['media']['tmp_name'], $filepath))
        {
            $image = \Image::load($filepath);
            $thumbpath = \Config::get('bloctextemedia.syspath').'thumbs'.DS.$filename;
            $image->resize_max(\Config::get('bloctextemedia.thumb_width'), \Config::get('bloctextemedia.thumb_height'))->save($thumbpath);
            return \Response::forge(\Format::forge(array($filename))->to_json());
        }
        return false;
        
    }
    
    public function action_duplicate($old_bloc_id, $new_bloc_id)
    {
        if(!\Request::is_hmvc())
            die();
        
        Model_BlocTexteMedia::find_by_bloc_id($old_bloc_id)->duplicate($new_bloc_id);
        
    }
}
