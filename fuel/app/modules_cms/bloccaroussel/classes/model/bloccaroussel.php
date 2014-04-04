<?php

namespace Bloccaroussel;

class Model_BlocCaroussel extends \Orm\Model
{
        protected static $_table_name = 'blocs_caroussel';
    
	protected static $_properties = array(
		'id',
		'caption',
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
        
        protected static $_has_many = array(
            'images' => array(
                'key_from' => 'id',
                'model_to' => '\Bloccaroussel\Model_BlocCarousselImage',
                'key_to' => 'bloccaroussel_id',
                'cascade_save' => false,
                'cascade_delete' => true
            ),
        );
        
        public function save($cascade = null, $use_transaction = false, $revision_id = null)
        {
            if(empty($this->id) && !is_null($revision_id))
            {
                $this->bloc = new \Model_Bloc();
                $this->bloc->revision_id = $revision_id;
                $this->bloc->code = 'bloc_caroussel';
            }
            parent::save($cascade, $use_transaction);
        }
        
        public static function find_by_bloc_id($bloc_id)
        {
            return static::find()->where('bloc_id', $bloc_id)->get_one();
        }
        
        public function clear_images()
        {
            foreach($this->images as $image)
            {
                $image->delete();
            }
            $this->images = array();
        }
        
        public function duplicate($new_bloc_id)
        {
            $new = Model_BlocCaroussel::forge();
            $new->caption = $this->caption;
            $new->bloc_id = $new_bloc_id;
            $new->save();
            
            foreach($this->images as $image)
            {
                $image->duplicate($new->id);
            }
        }
}
