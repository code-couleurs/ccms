<?php

class Message_Success extends \Message\Message {
    
    public function render()
    {
        
        return '<div class="success">'.$this->text.'</div>';
        
    }
    
}