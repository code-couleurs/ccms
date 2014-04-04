<?php

class Model_Bloc extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'code',
		'position',
		'revision_id',
		'date_creation',
		'date_modification',
                'pagebox_id'
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
            'revision' => array(
                'key_from' => 'revision_id',
                'model_to' => 'Model_Revision',
                'key_to' => 'id',
                'cascade_save' => false,
                'cascade_delete' => false,
            )
        );
        
        public function save($cascade = null, $use_transaction = false)
        {
            if(empty($this->id))
            {
                $this->auto_position();
            }
            Event::trigger('blocs/before_save', $this);
            parent::save($cascade, $use_transaction);
        }
        
        public function auto_position()
        {
            $query = \DB::select(DB::expr('MAX(position) as max_position'))
                                ->from('blocs')
                                ->where('revision_id', $this->revision_id);
            $max_position = $query->execute()->current();
            $this->position = intval($max_position['max_position'])+1;
        }
        
        public function save_position($position)
        {

            if($this->position == $position)
                return true;

            Db::update('blocs')
                    ->value('position', DB::expr('position-1'))
                    ->where('position', '>', $this->position)
                    ->where('position', '<=', $position)
                    ->where('id', '<>', $this->id)
                    ->execute();
            Db::update('blocs')
                    ->value('position', DB::expr('position+1'))
                    ->where('position', '<', $this->position)
                    ->where('position', '>=', $position)
                    ->where('id', '<>', $this->id)
                    ->execute();
            $this->position = $position;
            $this->save();
            
        }
        
        public function duplicate($revision_id)
        {
            $new = Model_Bloc::forge();
            $new->code = $this->code;
            $new->position = $this->position;
            $new->revision_id = $revision_id;
            $new->save();

            Bloc::forge($this->code)->duplicate($this->id, $new->id);
            Event::trigger('blocs/after_duplicate', array('old_bloc_id'=>$this->id, 'new_bloc_id'=>$new->id));
        }
}
