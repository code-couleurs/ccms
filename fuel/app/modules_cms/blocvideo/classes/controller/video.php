<?php

namespace blocvideo;

class Controller_Video extends \Controller_Blocs {
    
    public function before()
    {
        if(!is_dir(\Config::get('blocvideo.syspath')))
        {
            mkdir(\Config::get('blocvideo.syspath'));
        }
        parent::before();
    }
    
    public function action_get_form($bloc_id = null)
    {
        $view = \View::forge('form');
        if(is_null($bloc_id))
        {
            $bloc_video = Model_BlocVideo::forge();
            $view->bloc_id = '';
            $view->caption = '';
            $view->path = '';
        }
        else
        {
            $bloc_video = Model_BlocVideo::find_by_bloc_id($bloc_id);
            $view->bloc_id = $bloc_id;
            $view->caption = $bloc_video->caption;
            $view->path = $bloc_video->path;
        }
        
        return \Response::forge($view);
    }
    
    public function action_view($bloc_id)
    {
        $bloc = Model_BlocVideo::find_by_bloc_id($bloc_id);
        $view = \View::forge('view');
        $view->bloc_id = $bloc->bloc_id;
        $view->caption = $bloc->caption;
        $view->path = \Config::get('blocvideo.path').$bloc->path;
        $view->contribution = \Session::get('mode_contribution', false);
        return \Response::forge($view);
    }
    
    public function post_modifier()
    {
    }

    public function post_supprimer()
    {
        $bloc = Model_BlocVideo::find_by_bloc_id(\Input::post('bloc_id'));
        $bloc->delete();
        unlink(\Config::get('blocvideo.syspath').$bloc->path);
        return array(true);
    }
    
    /**
     * fix for ie
     * @return type
     */
    public function action_ajouter()
    {
        return \Response::forge(\Format::forge($this->post_ajouter())->to_json());
    }
    
    public function post_ajouter()
    {
        if(!empty($_FILES['video']['size']))
        {
            $filename = pathinfo($_FILES['video']['name'], PATHINFO_FILENAME);
            $extension = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
            $append = '';
            $i = 2;
            while(file_exists(\Config::get('blocvideo.syspath').$filename.$append.'.'.$extension))
            {
                $append = '_'.$i++;
            }
            $filename = $filename.$append.'.'.$extension;
            $filepath = \Config::get('blocvideo.syspath').$filename;
            if(move_uploaded_file($_FILES['video']['tmp_name'], $filepath))
            {
                $bloc = Model_BlocVideo::forge();
                $bloc->caption = \Input::post('caption');
                $bloc->path = $filename;
                $bloc->save(null, null, \Session::get('revision_id'));
                return array($bloc->bloc->id);
            }
            else
            {
                return false;
            }
        }
        else
        {;
            return false;
        }
    }
    
    public function action_duplicate($old_bloc_id, $new_bloc_id)
    {
        if(!\Request::is_hmvc())
            die();
        
        Model_BlocVideo::find_by_bloc_id($old_bloc_id)->duplicate($new_bloc_id);
        
    }
}