<?php

class Message_Collection {
    
    protected $messages;
    
    public function record($clef, \Message\Message $message)
    {
        $this->messages[$clef] = $message;
    }
    
    public function display($clef)
    {
        if($message = $this->getMessage($clef))
        {
            echo $message;
        }
        else
        {
            return false;
        }
    }
    
    public function getMessage($clef)
    {
        if(isset($this->messages[$clef]))
        {
            return $this->messages[$clef];
        }
        else
        {
            return false;
        }
    }
    
}