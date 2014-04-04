<?php

namespace Bloccaroussel;

class Model_BlocCarousselImage extends \Orm\Model
{
        protected static $_table_name = 'blocs_caroussel_image';
    
	protected static $_properties = array(
		'id',
		'path',
                'position',
		'bloccaroussel_id',
	);
        
        
        protected static $_belongs_to = array(
            'bloccaroussel' => array(
                'key_from' => 'bloccaroussel_id',
                'model_to' => '\Bloccaroussel\Model_BlocCaroussel',
                'key_to' => 'id',
                'cascade_save' => true,
                'cascade_delete' => false,
            )
        );
        
        
        public function duplicate($bloc_caroussel_id)
        {
            $new = Model_BlocCarousselImage::forge();
            $new->path = $this->path;
            $new->position = $this->position;
            $new->bloccaroussel_id = $bloc_caroussel_id;
            $new->save();
        }
}
