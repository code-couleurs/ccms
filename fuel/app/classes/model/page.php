<?php

class Model_Page extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'titre',
		'url',
                'template'=>array('default'=>'standard'),
                'position',
		'rubrique_id',
		'date_creation',
		'date_modification'
	);
        
        protected static $_belongs_to = array(
            'rubrique' => array(
                'key_from' => 'rubrique_id',
                'model_to' => 'Model_Rubrique',
                'key_to' => 'id',
                'cascade_save' => false,
                'cascade_delete' => false,
            )
        );
        
        protected static $_has_many = array(
            'droits' => array(
                'key_from' => 'id',
                'model_to' => 'Model_Droit',
                'key_to' => 'page_id',
                'cascade_save' => false,
                'cascade_delete' => true,
            ),
            'revisions' => array(
                'key_from' => 'id',
                'model_to' => 'Model_Revision',
                'key_to' => 'page_id',
                'cascade_save' => false,
                'cascade_delete' => true,
            )
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
        
        public function build_url_from_title()
        {
            
            $this->url = Inflector::friendly_title($this->titre);
            
        }
        
        public function auto_position()
        {
            $query_rubriques = \DB::select(DB::expr('MAX(position) as max_position'))
                                ->from('rubriques')
                                ->where('parent_id', $this->rubrique_id);
            $max_position_rubrique = $query_rubriques->execute()->current();
            $query_pages = \DB::select(DB::expr('MAX(position) as max_position'))
                                ->from('pages')
                                ->where('rubrique_id', $this->rubrique_id);
            $max_position_page = $query_pages->execute()->current();
            $max_position = max($max_position_rubrique, $max_position_page);
            $this->position = intval($max_position['max_position'])+1;
        }
        
        public static function liste_routes(){
            
            \Profiler::mark('Model_Page::liste_routes Start');
            
            try {
                $routes = Cache::get('pages_routes');
            }
            catch(CacheNotFoundException $e)
            {
                $routes = array();
                $routes = DB::select('url')->from(static::table())->execute()->as_array('url', 'url');
                foreach($routes as &$route){
                    $route = 'pages/view/'.$route;
                }
                Cache::set('pages_routes',$routes,false, array('arborescence'));
            }
            \Profiler::mark('Model_Page::liste_routes End');
            return $routes;
            
        }
        
        public function get_current_revision()
        {
            return Model_Revision::find_current($this->id);
        }
        
        public function save($cascade = null, $use_transaction = false)
        {
            if(empty($this->id))
            {
                $revision = new Model_Revision();
                $revision->type = 'current';
                $revision->intitule = 'Etat initial';
                $this->revisions = array($revision);
            }
            parent::save($cascade, $use_transaction);
        }
        
        public static function find_by_url($url)
        {
            try {
                return Cache::get('page_url_'.md5($url));
            }
            catch(CacheNotFoundException $e)
            {
                $page = Model_Page::find()->where('url', $url)->get_one();
                Cache::set('page_url_'.md5($url), $page, false, array('arborescence'));
                return $page;
            }
        }
}
