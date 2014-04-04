<?php

abstract class Image_Driver extends \Fuel\Core\Image_Driver {
    
    public function resize_max($max_width, $max_height)
    {
        $wanted_ratio = $max_width / $max_height;
        $picture_ratio = $this->sizes()->width / $this->sizes()->height;
        
        if($picture_ratio > $wanted_ratio)
        {
            $new_height = intval($max_width / $this->sizes()->width * $this->sizes()->height);
            return $this->resize($max_width, $new_height);
        }
        else
        {
            $new_width = intval($max_height / $this->sizes()->height * $this->sizes()->width);
            return $this->resize($new_width, $max_height);
        }
    }
    
}