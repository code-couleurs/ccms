<?php

class Controller_Test extends Controller_Base {
    
    
    public function action_index()
    {
        return View::forge('test');
    }
    
}