<?php

namespace Fuel\Migrations;

class Create_CarousselImage
{
	public function up()
	{
		\DBUtil::create_table('blocs_caroussel_image', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned'=>true),
                        'caption' => array('constraint' => 255, 'type' => 'varchar', 'null'=>true),
			'path' => array('constraint' => 100, 'type' => 'varchar'),
                        'position' => array('type'=>'tinyint', 'unsigned'=>true),
			'bloccaroussel_id' => array('constraint' => 11, 'type' => 'int', 'unsigned'=>true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('blocs_caroussel_image');
	}
}