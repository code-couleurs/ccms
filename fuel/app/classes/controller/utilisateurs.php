<?php

class Controller_Utilisateurs extends Controller_Base {
    
    public function before(){
        parent::before();
    }
    
    public function action_login_form()
    {
        $view = View::forge('utilisateurs/login');
        return $view;
    }
    
    public function action_quick_login()
    {
        $view = View::forge('utilisateurs/quick_login');
        $headers = array (
            'Cache-Control'     => 'no-cache, no-store, max-age=0, must-revalidate',
            'Pragma'            => 'no-cache',
        );
        echo \Response::forge($view->render(), 200, $headers);
    }
    
}