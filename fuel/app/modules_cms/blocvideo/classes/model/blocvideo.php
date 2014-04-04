<?php

namespace Blocvideo;

class Model_BlocVideo extends \Orm\Model
{
        protected static $_table_name = 'blocs_video';
    
	protected static $_properties = array(
		'id',
		'caption',
                'path',
		'bloc_id',
	);
        
        
        protected static $_belongs_to = array(
            'bloc' => array(
                'key_from' => 'bloc_id',
                'model_to' => 'Model_Bloc',
                'key_to' => 'id',
                'cascade_save' => true,
                'cascade_delete' => true,
            )
        );
        
        public function save($cascade = null, $use_transaction = false, $revision_id = null)
        {
            if(empty($this->id) && !is_null($revision_id))
            {
                $this->bloc = new \Model_Bloc();
                $this->bloc->revision_id = $revision_id;
                $this->bloc->code = 'bloc_video';
            }
            parent::save($cascade, $use_transaction);
        }
        
        public static function find_by_bloc_id($bloc_id)
        {
            return static::find()->where('bloc_id', $bloc_id)->get_one();
        }
        
        public function duplicate($new_bloc_id)
        {
            $new = Model_BlocVideo::forge();
            $new->caption = $this->caption;
            $new->path = $this->path;
            $new->bloc_id = $new_bloc_id;
            $new->save();
        }
}
