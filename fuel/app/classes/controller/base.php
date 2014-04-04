<?php

class Controller_Base extends Controller_Hybrid {
    
    
    public function before()
    {
        Profiler::mark('Controller_Base:before start');
        
        parent::before();
        
        if(Input::post('btn_login', false))
        {
            if(!Auth::instance()->login(Input::post('login'), Input::post('password')))
            {
                \Message\Message::record('echec_login', new Message_Error('Erreur lors de l\'authentification'));
            }
        }
        else if(Input::get('logout', false))
        {
            Auth::logout();
        }
        
        Profiler::mark('Controller_Base:before end');
        
    }
    
}