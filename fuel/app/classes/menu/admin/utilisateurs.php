<?php

class Menu_Admin_Utilisateurs extends Menu\Menu {
    
    public function buildItems() {
        
        $this->addItem('/admin_utilisateurs/liste', 'Liste des utilisateurs');
        $this->addItem('/admin_utilisateurs/ajouter', 'Ajouter un utilisateur');
        
        
        parent::buildItems();
    }
    
}