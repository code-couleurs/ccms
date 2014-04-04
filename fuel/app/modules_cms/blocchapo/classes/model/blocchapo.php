<?php

namespace Blocchapo;

class Model_BlocChapo extends \Orm\Model
{
        protected static $_table_name = 'blocs_chapo';
    
	protected static $_properties = array(
		'id',
		'contenu',
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
                $blocmodule = \Bloc::forge('bloc_chapo');
                $this->bloc = new \Model_Bloc();
                $this->bloc->revision_id = $revision_id;
                $this->bloc->code = 'bloc_chapo';
            }
            parent::save($cascade, $use_transaction);
        }
        
        public static function find_by_bloc_id($bloc_id)
        {
            return static::find()->where('bloc_id', $bloc_id)->get_one();
        }
        
        public function duplicate($new_bloc_id)
        {

            $new = Model_BlocChapo::forge();
            $new->contenu = $this->contenu;
            $new->bloc_id = $new_bloc_id;
            $new->save();
            
            $new->contenu = \Pagebox\Controller_Pagebox::duplicate_pageboxes_from_text($new->bloc_id, $new->contenu);
            $new->save();
        }
        
}
