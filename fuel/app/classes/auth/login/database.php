<?php

class Auth_Login_Database extends Auth_Login_CMS {
    
    public function validate_user($login = '', $password = '') {
        
        return $this->utilisateur = Model_Utilisateur::find()->where((array('login'=>$login, 'password'=>$this->hash_password($password))))->get_one();
        
        
    }
    
}