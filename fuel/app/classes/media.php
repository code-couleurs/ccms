<?php

class Media 
{
    
    public $gen_id;
    public $filepath;
    public $mediatype;
    public $thumbpath;
    
    public function __construct($filepath, $thumb_path = '')
    {
        $this->filepath = $filepath;
        $this->detect_mediatype();
        $this->gen_id = substr(md5($filepath), 0,10);
        $this->thumbpath = $thumb_path;
    }
    
    public static function forge($filepath, $thumbpath = '')
    {
        
        return new Media($filepath, $thumbpath);
        
    }
    
    public function detect_mediatype()
    {
        
        switch(strtolower(pathinfo($this->filepath, PATHINFO_EXTENSION)))
        {
            case 'jpg' :
            case 'png' :
            case 'gif' :
            case 'bmp' :
            case 'jpeg' :
                $this->mediatype = 'image';
                break;
            case 'mov' :
            case 'mp4' :
            case 'mpg' :
            case 'avi' :
            case 'flv' :
                $this->mediatype = 'video';
                break;
            default :
                $this->mediatype = 'none';
                break;
        }
        
    }
    
    public function render()
    {
        $view = View::forge('medias/'.$this->mediatype);
        $view->media = $this->filepath;
        $view->gen_id = $this->gen_id;
        $view->thumb = $this->thumbpath;
        return $view;
    }
    
}