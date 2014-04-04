<?php

class Model_Utilisateur extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'nom',
		'prenom',
		'login',
		'password',
                'email',
                'is_admin',
		'date_creation',
		'date_modification'
	);
        
        protected static $_has_many = array(
            'droits' => array(
                'key_from' => 'id',
                'model_to' => 'Model_Droit',
                'key_to' => 'utilisateur_id',
                'cascade_save' => false,
                'cascade_delete' => true,
            ),
        );

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
			'property' => 'date_creation',
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
			'property' => 'date_modification',
		),
	);
        
        
        public function hash_password($password){
            
            $this->password = \Auth::instance()->hash_password($password);
        }
        
        public function has_right($type_droit, $type_branche, $id_branche)
        {
            $key = $type_branche.'_id';
            foreach($this->droits as $droit)
            {
                if($droit->droit == $type_droit && $droit->$key == $id_branche)
                        return true;
            }
            return false;
            
        }
        
        public function supprime_droits()
        {
            $this->droits = array();
            Model_Droit::supprime_pour_utilisateur($this->id);
            foreach($this->droits as $droit)
            {
                $droit->delete();
            }
        }
        
        public static function get_valideurs($page_id = null, $rubrique_id = null)
        {            
            // get parents first
            $type_branche = $page_id == 0 ?  : 'Arborescence_Rubrique';
            if($page_id != null)
                $branche = Arborescence_Arbre::forge()->findChild('Arborescence_Page', $page_id);
            else
                $branche = Arborescence_Arbre::forge()->findChild('Arborescence_Rubrique', $rubrique_id);

            $parents = $branche->getParents(Arborescence_Arbre::forge());
            $parents_ids = array();
            foreach($parents as $parent)
            {
                if(get_class($parent) != 'Arborescence_Page' && $parent->id != $rubrique_id)
                    $parents_ids[] = $parent->id;
            }
            $parents_ids[] = 0;
            
            $query = self::query()
                    ->related('droits')
                    ->where('droits.droit', 'valideur')
                    ->where('droits.rubrique_id', 'IN', $parents_ids);
            if($page_id != null)
                $query->or_where('droits.page_id', $page_id);
            else
                $query->or_where('droits.page_id', $rubrique_id);
            
            $valideurs = $query->get();
            
            return $valideurs;
             
        }
}
