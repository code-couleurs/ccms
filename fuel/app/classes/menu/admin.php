<?php

class Menu_Admin extends Menu\Menu {
    
    public function buildItems() {
        
        $this->addItem('/admin_utilisateurs/liste', 'Utilisateurs');
        $this->addItem('/admin_arborescence/arbo', 'Arborescence');
        parent::buildItems();
    }
    
}