<?php

namespace Fuel\Migrations;

class Create_blocs
{
	public function up()
	{
		\DBUtil::create_table('blocs', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned'=>true),
			'code' => array('constraint' => 50, 'type' => 'varchar'),
			'position' => array('constraint' => 11, 'type' => 'int', 'unsigned'=>true),
			'revision_id' => array('constraint' => 11, 'type' => 'int', 'unsigned'=>true),
			'date_creation' => array('constraint' => 11, 'type' => 'int'),
			'date_modification' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('blocs');
	}
}