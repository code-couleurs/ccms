<?php

class Model_Revision extends \Orm\Model
{
    
	protected static $_properties = array(
		'id',
		'type',
		'intitule',
		'page_id',
                'contributeur_id',
		'date_creation',
		'date_modification'
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
        
        protected static $_belongs_to = array(
            'page' => array(
                'key_from' => 'page_id',
                'model_to' => 'Model_Page',
                'key_to' => 'id',
                'cascade_save' => false,
                'cascade_delete' => false,
            )
        );
        
        protected static $_has_many = array(
            'blocs' => array(
                'key_from' => 'id',
                'model_to' => 'Model_Bloc',
                'key_to' => 'revision_id',
                'cascade_save' => false,
                'cascade_delete' => true,
                'conditions' => array('order_by'=>array('position'=>'asc'))
            ),
        );
        
        public static function find_current($page_id)
        {
            try {
                return Cache::get('page_revision_current_'.$page_id);                
            }
            catch(CacheNotFoundException $e)
            {
                $revision = static::find()
                            ->where('page_id', $page_id)
                            ->where('type', 'current')
                            ->get_one();
                Cache::set('page_revision_current_'.$page_id, $revision);
                return $revision;
            }
        }
        
        public static function find_brouillon($page_id)
        {
            $brouillon = static::find()
                                ->where('page_id', $page_id)
                                ->where('type', 'draft')
                                ->get_one();
            return $brouillon;            
        }
        
        public static function create_brouillon($page_id)
        {
            
            $brouillon = new Model_Revision();
            $brouillon->type = 'draft';
            $brouillon->intitule = 'Brouillon '.date('d/m/Y');
            $brouillon->page_id = $page_id;
            $brouillon->save();
            
            $current = Model_Revision::find_current($page_id);
            foreach($current->blocs as $bloc)
            {
                $bloc->duplicate($brouillon->id);
            }
            
            return $brouillon;
        }
}
