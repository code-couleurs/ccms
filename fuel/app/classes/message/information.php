<?php

class Message_Information extends \Message\Message {
    
    public function render()
    {
        
        return '<div class="info">'.$this->text.'</div>';
        
    }
    
}