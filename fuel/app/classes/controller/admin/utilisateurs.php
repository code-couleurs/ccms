<?php

class Controller_Admin_Utilisateurs extends \Controller_Admin {
        
    public function action_liste()
    {
        $this->template->content = View::forge('admin/utilisateurs/liste');
        $this->template->content->utilisateurs = Model_Utilisateur::find('all', array('order_by' => array('nom'=>'desc','prenom'=>'desc')));
    }
    
    public function action_ajouter()
    {
        $validation = Validation::forge();
        $validation->add('login')->add_rule('required');
        $validation->add('nom')->add_rule('required');
        $validation->add('prenom')->add_rule('required');
        
        if($validation->run())
        {
            $utilisateur = Model_Utilisateur::forge();
            $utilisateur->login = Input::post('login');
            $utilisateur->nom = Input::post('nom');
            $utilisateur->prenom = Input::post('prenom');
            $utilisateur->email = Input::post('email');
            $utilisateur->is_admin = Input::post('is_admin', false);
            $utilisateur->hash_password(Input::post('password'));
            if($utilisateur->save())
            {
                \Message\Message::record('form_utilisateur', new Message_Success('Utilisateur ajouté'));
                Response::redirect('admin_utilisateurs/liste');
            }
            else
            {
                \Message\Message::record('form_utilisateur', new Message_Error('Erreur lors de la modification'));
            }            
        }
        else if (Input::post('modifier'))
        {
            \Message\Message::record('form_utilisateur', new Message_Error('Le formulaire contient des erreurs'));
        }
        
        $this->template->content = View::forge('admin/utilisateurs/ajouter');
        $this->template->content->validation = $validation;
         $this->template->content->arbo = Arborescence_Arbre::forge();
    }
    
    public function action_modifier($id)
    {
        if(!$utilisateur = Model_Utilisateur::find($id))
        {
            die('Erreur, utilisateur inconnu');
        }
        
        $validation = Validation::forge();
        $validation->add('login')->add_rule('required');
        $validation->add('nom')->add_rule('required');
        $validation->add('prenom')->add_rule('required');
        \Fuel\Core\Profiler::mark('avant validation');
        if($validation->run())
        {
            $utilisateur->login = Input::post('login');
            $utilisateur->nom = Input::post('nom');
            $utilisateur->prenom = Input::post('prenom');
            $utilisateur->email = Input::post('email');
            $utilisateur->is_admin = (boolean)Input::post('is_admin');
            
            if(Input::post('password'))
                $utilisateur->hash_password(Input::post('password'));
            
            
            $utilisateur->supprime_droits();
            
            // droits contributeurs page
            foreach(Input::post('contributeur.page', array()) as $page_id)
            {
                $utilisateur->droits[] = Model_Droit::forge(
                                            array(                                        
                                                'page_id' => $page_id,
                                                'droit' => 'contributeur'
                                            ));
            }
            
            //droits valideur page
            foreach(Input::post('valideur.page', array()) as $page_id)
            {
                $utilisateur->droits[] = Model_Droit::forge(
                                            array(                                        
                                                'page_id' => $page_id,
                                                'droit' => 'valideur'
                                            ));
            }
            
            // droits contributeurs rubrique
            foreach(Input::post('contributeur.rubrique', array()) as $rubrique_id)
            {
                $utilisateur->droits[] = Model_Droit::forge(
                                            array(                                        
                                                'rubrique_id' => $rubrique_id,
                                                'droit' => 'contributeur'
                                            ));
            }
            
            //droits valideur rubrique
            foreach(Input::post('valideur.rubrique', array()) as $rubrique_id)
            {
                $utilisateur->droits[] = Model_Droit::forge(
                                            array(                                        
                                                'rubrique_id' => $rubrique_id,
                                                'droit' => 'valideur'
                                            ));
            }
            
            \Fuel\Core\Profiler::mark('avant save');
            if($utilisateur->save())
            {\Fuel\Core\Profiler::mark('apres save');
                \Message\Message::record('form_utilisateur', new Message_Success('Utilisateur modifié'));
            }
            else
            {
                \Message\Message::record('form_utilisateur', new Message_Error('Erreur lors de la modification'));
            }            
        }
        else if (Input::post('modifier'))
        {
            \Message\Message::record('form_utilisateur', new Message_Error('Le formulaire contient des erreurs'));
        }
        
        Asset::js('admin/utilisateurs/modifier.js', array(), 'cms');
        $this->template->content = View::forge('admin/utilisateurs/modifier');
        $this->template->content->utilisateur = $utilisateur;
        $this->template->content->validation = $validation;
        \Fuel\Core\Profiler::mark('avant render');
    }
    
    public function action_menu(){
        
        return View::forge('admin/utilisateurs/menu', array('menu'=>new Menu_Admin_Utilisateurs()));
        
    }
    
    public function action_droit_rubrique($type_droit, $id, $utilisateur_id){
        
        if(!Request::is_hmvc())
            die('Accès interdit');

        $arbo = Arborescence_Arbre::forge();
        if($rubrique = $arbo->findChild('Arborescence_Rubrique', $id))
        {
            $view = View::forge('admin/utilisateurs/droit_rubrique');
            $view->rubrique = $rubrique;
            $view->type_droit = $type_droit;
            $view->has_right = Model_Utilisateur::forge()->find($utilisateur_id)->has_right($type_droit, 'rubrique', $id);
            $view->utilisateur_id = $utilisateur_id;
            return Response::forge($view);
            
        }
        else
        {
            return ' ';
        }
        
    }
    
    public function action_droit_page($type_droit, $id, $utilisateur_id)
    {
        if(!Request::is_hmvc())
            die('Accès interdit');
        
        $arbo = Arborescence_Arbre::forge();
        if($page = $arbo->findChild('Arborescence_Page', $id))
        {
        
            $view = View::forge('admin/utilisateurs/droit_page');
            $view->page = $page;
            $view->type_droit = $type_droit;
            $view->has_right = Model_Utilisateur::forge()->find($utilisateur_id)->has_right($type_droit, 'page', $id);
            $view->utilisateur_id = $utilisateur_id;
            return Response::forge($view);
            
        }
        else
        {
            return ' ';
        }
    }
    
}