<?php

class Model_Droit extends \Orm\Model
{
    
        protected static $_table_name = 'droits';
        
	protected static $_properties = array(
		'id',
		'utilisateur_id',
		'droit',
		'rubrique_id',
		'page_id',
		'date_creation',
		'date_modification'
	);
        
        protected static $_belongs_to = array(
            'utilisateur' => array(
                'key_from' => 'utilisateur_id',
                'model_to' => 'Model_Utilisateur',
                'key_to' => 'id',
                'cascade_save' => false,
                'cascade_delete' => false,
            ),
            'rubrique' => array(
                'key_from' => 'rubrique_id',
                'model_to' => 'Model_Rubrique',
                'key_to' => 'id',
                'cascade_save' => false,
                'cascade_delete' => false,
            ),
            'page' => array(
                'key_from' => 'page_id',
                'model_to' => 'Model_Page',
                'key_to' => 'id',
                'cascade_save' => false,
                'cascade_delete' => false,
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
        
        public static function supprime_pour_utilisateur($utilisateur_id)
        {
            
            Db::delete(static::$_table_name)->where('utilisateur_id', intval($utilisateur_id))->execute();
            
        }
}
