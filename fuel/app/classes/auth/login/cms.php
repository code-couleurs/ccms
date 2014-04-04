<?php

abstract class Auth_Login_CMS extends \Auth\Auth_Login_Driver {
    
    /**
    * @var  Model_Utilisateur
    */
    public $utilisateur;
    

    protected function perform_check() {
        
        if(Session::get('utilisateur_id'))
        {
            if(empty($this->utilisateur))
            {
                $this->utilisateur = Model_Utilisateur::find(Session::get('utilisateur_id'));
            }
            return true;
        }
        else
        {
            return false;
        }        
        
    }

    public function get_email() {
        
        if(empty($user))
        {
            return false;
        }
        else
        {
            return $this->utilisateur->email;
        }
        
    }

    public function get_groups() {
        
        return array();
        
    }

    public function get_screen_name() {
        
        return $this->utilisateur->prenom.' '.$this->utilisateur->nom;
        
    }

    public function get_user_id() {
        
        return Session::get('utilisateur_id') ? false : Session::get('utilisateur_id');
        
    }

    public function login($login = '', $password = '') {
        
        if($this->utilisateur = $this->validate_user($login, $password))
        {
            Session::set('utilisateur_id', $this->utilisateur->id);
            return true;
        }
        else
        {
            return false;
        }
        
    }

    public function logout() {
        
        Session::delete('utilisateur_id');
        Session::delete('mode_contribution');
        Session::delete('mode_validation');
        Session::delete('revision_id');
        $this->utilisateur = null;
        
    }
    
    public function check_admin($redirect = true)
    {
        if(!$this->perform_check() || !$this->utilisateur->is_admin)
        {
            if(Request::is_hmvc() || !$redirect)
                return false;
            else
                Response::redirect(Uri::base(false).'admin/index');
        }
        return true;
        
    }
    
    public function is_allowed($page_id, $type_droit)
    {
        
        if(!$this->perform_check())
        {
            return false;
        }
        if($this->utilisateur->is_admin)
        {
            return true;
        }
        
        foreach($this->utilisateur->droits as $droit)
        {
            if($droit->droit != $type_droit)
            {
                continue;
            }
            if($droit->page_id == $page_id)
            {
                return true;
            }
            if(!empty($droit->rubrique_id) && Arborescence_Arbre::forge()->findChild('Arborescence_Rubrique', $droit->rubrique_id)->findChild('Arborescence_Page', $page_id))
            {
                return true;
            }
        }
        
        
        return false;
        
    }
    
    

}