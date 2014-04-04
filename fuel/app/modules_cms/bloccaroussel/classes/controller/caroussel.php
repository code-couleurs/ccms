<?php

namespace bloccaroussel;

class Controller_Caroussel extends \Controller_Blocs {
    
    
    public function action_get_form($bloc_id = null)
    {
        $view = \View::forge('form');
        if(is_null($bloc_id))
        {
            $bloc = Model_BlocCaroussel::forge();
            $view->bloc_id = '';
            $view->caption = '';
            $view->images = array();
        }
        else
        {
            $bloc = Model_BlocCaroussel::find_by_bloc_id($bloc_id);
            $view->bloc_id = $bloc_id;
            $view->caption = $bloc->caption;
            $images = array();
            foreach($bloc->images as $image)
            {
                $images[] = $image->path;
            }
            $view->images = $images;
        }
        
        return \Response::forge($view);
    }
    
    public function action_view($bloc_id)
    {
        
        $bloc = Model_BlocCaroussel::find_by_bloc_id($bloc_id);
        $view = \View::forge('view');
        $view->bloc_id = $bloc->bloc_id;
        $view->caption = $bloc->caption;
        $view->contribution = \Session::get('mode_contribution', false);
        
        $images = array();
        foreach($bloc->images as $image)
        {
            $images[] = $image->path;
        }
        $view->images = $images;
        
        return \Response::forge($view);
    }
    
    public function post_modifier()
    {
        $bloc = Model_BlocCaroussel::find_by_bloc_id(\Input::post('bloc_id'));
        $bloc->caption = \Input::post('caption', '');
        $bloc->clear_images();
        $position = 0;
        foreach(\Input::post('images', array()) as $image_name)
        {
            $image = Model_BlocCarousselImage::forge();
            $image->path = $image_name;
            $image->position = $position++;
            $bloc->images[] = $image;
        }
        $bloc->save(null, null, \Session::get('revision_id'));
        return array($bloc->bloc->id);
    }

    public function post_supprimer()
    {
        
        $bloc = Model_BlocCaroussel::find_by_bloc_id(\Input::post('bloc_id'));
        $bloc->delete();
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
        $bloc = Model_BlocCaroussel::forge();
        $bloc->caption = \Input::post('caption', '');
        $bloc->images = array();
        $position = 0;
        foreach(\Input::post('images', array()) as $image_name)
        {
            $image = Model_BlocCarousselImage::forge();
            $image->path = $image_name;
            $image->position = $position++;
            $bloc->images[] = $image;
        }
        $bloc->save(null, null, \Session::get('revision_id'));
        return array($bloc->bloc->id);
    }
    
    public function action_upload()
    {
        if(!is_dir(\Config::get('bloccaroussel.syspath')))
        {
            mkdir(\Config::get('bloccaroussel.syspath'));
            chmod(\Config::get('bloccaroussel.syspath'), 0777);
        }
        if(!is_dir(\Config::get('bloccaroussel.syspath').DS.'thumbs'))
        {
            mkdir(\Config::get('bloccaroussel.syspath').DS.'thumbs');
            chmod(\Config::get('bloccaroussel.syspath').DS.'thumbs', 0777);
        }
                
        $filename = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $append = '';
        $i = 2;
        while(file_exists(\Config::get('bloccaroussel.syspath').$filename.$append.'.'.$extension))
        {
            $append = '_'.$i++;
        }
        $filename = $filename.$append.'.'.$extension;
        $filepath = \Config::get('bloccaroussel.syspath').$filename;
        
        if(move_uploaded_file($_FILES['image']['tmp_name'], $filepath))
        {
            $image = \Image::load($filepath);
            $thumbpath = \Config::get('bloccaroussel.syspath').'thumbs'.DS.$filename;
            $image->crop_resize(\Config::get('bloccaroussel.thumb_width'), \Config::get('bloccaroussel.thumb_height'))->save($thumbpath);
            return \Response::forge(\Format::forge(array($filename))->to_json());
        }
        return false;
        
    }
    
    public function action_duplicate($old_bloc_id, $new_bloc_id)
    {
        if(!\Request::is_hmvc())
            die();
        
        $bloc = Model_BlocCaroussel::find_by_bloc_id($old_bloc_id);
        $bloc->duplicate($new_bloc_id);
        
    }
    
    
}