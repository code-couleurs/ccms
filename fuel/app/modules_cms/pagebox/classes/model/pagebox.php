<?php

namespace Pagebox;

class Model_Pagebox extends \Orm\Model
{
        protected static $_table_name = 'pages_box';
    
	protected static $_properties = array(
		'id',
                'bloc_parent_id',
		'titre',
	);
        
        
        protected static $_belongs_to = array(
            'bloc' => array(
                'key_from' => 'bloc_parent_id',
                'model_to' => 'Model_Bloc',
                'key_to' => 'id',
                'cascade_save' => true,
                'cascade_delete' => false,
            )
        );
        
        protected static $_has_many = array(
            'blocs' => array(
                'key_from' => 'id',
                'model_to' => 'Model_Bloc',
                'key_to' => 'pagebox_id',
                'cascade_save' => false,
                'cascade_delete' => true,
                'conditions' => array('order_by'=>array('position'=>'asc'))
            ),
        );
        
        public static function get_list($bloc_id) {
            return static::find()->where('bloc_parent_id', $bloc_id)->get();
        }
        
        public function get_next_bloc_position()
        {
            $query = \DB::select(\DB::expr('MAX(position) as max_position'))
                                ->from('blocs')
                                ->where('pagebox_id', $this->id);
            $max_position = $query->execute()->current();
            return intval($max_position['max_position'])+1;
        }
        
        public function get_parent_page()
        {
            
            return $this->bloc->revision->page;
            
        }
        
        public function duplicate($bloc_id)
        {
            $pagebox = new Model_Pagebox();
            $pagebox->titre = $this->titre;
            $pagebox->bloc_parent_id = $bloc_id;
            $pagebox->save();
            foreach($this->blocs as $bloc)
            {
                $bloc->duplicate(0);
                $bloc->pagebox_id = $pagebox->id;
                $bloc->save();
            }
            return $pagebox;
        }
}
