<?php

class Model_Rubrique extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'intitule',
		'position',
		'parent_id',
		'date_creation',
		'date_modification'
	);
        
        protected static $_belongs_to = array(
            'parent' => array(
                'key_from' => 'parent_id',
                'model_to' => 'Model_Rubrique',
                'key_to' => 'id',
                'cascade_save' => false,
                'cascade_delete' => false,
            )
        );
        
        protected static $_has_many = array(
            'enfants' => array(
                'key_from' => 'id',
                'model_to' => 'Model_Rubrique',
                'key_to' => 'parent_id',
                'cascade_save' => false,
                'cascade_delete' => true,
            ),
            'droits' => array(
                'key_from' => 'id',
                'model_to' => 'Model_Droit',
                'key_to' => 'rubrique_id',
                'cascade_save' => false,
                'cascade_delete' => true,
            ),
            'pages' => array(
                'key_from' => 'id',
                'model_to' => 'Model_Page',
                'key_to' => 'rubrique_id',
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
                'Arborescence_Observer' => array(
			'events' => array('after_save', 'after_delete')
		),
	);
        
        public function auto_position()
        {
            $query_rubriques = \DB::select(DB::expr('MAX(position) as max_position'))
                                ->from('rubriques')
                                ->where('parent_id', $this->parent_id);
            $max_position_rubrique = $query_rubriques->execute()->current();
            $query_pages = \DB::select(DB::expr('MAX(position) as max_position'))
                                ->from('pages')
                                ->where('rubrique_id', $this->parent_id);
            $max_position_page = $query_pages->execute()->current();
            $max_position = max($max_position_rubrique, $max_position_page);
            $this->position = intval($max_position['max_position'])+1;
        }
}
