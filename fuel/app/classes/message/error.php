<?php

class Message_Error extends \Message\Message {
    
    public function render()
    {
        
        return '<div class="error">'.$this->text.'</div>';
        
    }
    
}