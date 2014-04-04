<?php

namespace blocimage;

class Controller_Image extends \Controller_Blocs {
    
    public function before()
    {
        if(!is_dir(\Config::get('blocimage.syspath')))
        {
            mkdir(\Config::get('blocimage.syspath'));
        }
        parent::before();
    }
    
    public function action_get_form($bloc_id = null)
    {
        $view = \View::forge('form');
        if(is_null($bloc_id))
        {
            $bloc_image = Model_BlocImage::forge();
            $view->bloc_id = '';
            $view->caption = '';
            $view->path = '';
        }
        else
        {
            $bloc_image = Model_BlocImage::find_by_bloc_id($bloc_id);
            $view->bloc_id = $bloc_id;
            $view->caption = $bloc_image->caption;
            $view->path = $bloc_image->path;
        }
        
        return \Response::forge($view);
    }
    
    public function action_view($bloc_id)
    {
        $bloc = Model_BlocImage::find_by_bloc_id($bloc_id);
        $view = \View::forge('view');
        $view->bloc_id = $bloc->bloc_id;
        $view->caption = $bloc->caption;
        $view->path = \Config::get('blocimage.path').$bloc->path;
        $view->contribution = \Session::get('mode_contribution', false);
        return \Response::forge($view);
    }
    
    public function post_modifier()
    {
    }

    public function post_supprimer()
    {
        $bloc_texte = Model_BlocImage::find_by_bloc_id(\Input::post('bloc_id'));
        $bloc_texte->delete();
        unlink(\Config::get('blocimage.syspath').$bloc_texte->path);
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
        if(!empty($_FILES['image']['size']))
        {
            $filename = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $append = '';
            $i = 2;
            while(file_exists(\Config::get('blocimage.syspath').$filename.$append.'.'.$extension))
            {
                $append = '_'.$i++;
            }
            $filename = $filename.$append.'.'.$extension;
            $filepath = \Config::get('blocimage.syspath').$filename;
            if(move_uploaded_file($_FILES['image']['tmp_name'], $filepath))
            {
                $image = \Image::load($filepath);
                if($image->sizes()->width > \Config::get('blocimage.max_width'))
                {
                    $image->resize(\Config::get('blocimage.max_width'))->save($filepath);
                }
                $bloc = \Blocimage\Model_BlocImage::forge();
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
        
        Model_BlocImage::find_by_bloc_id($old_bloc_id)->duplicate($new_bloc_id);
        
    }
}