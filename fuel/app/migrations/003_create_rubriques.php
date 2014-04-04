<?php

namespace Fuel\Migrations;

class Create_rubriques
{
	public function up()
	{
		\DBUtil::create_table('rubriques', array(
			'id' => array('constraint' => 6, 'type' => 'smallint', 'auto_increment' => true, 'unsigned'=>true),
			'intitule' => array('constraint' => 100, 'type' => 'varchar'),
                        'position' => array('type' => 'smallint', 'unsigned'=>true),
			'parent_id' => array('type' => 'smallint', 'unsigned'=>true),
			'date_creation' => array('constraint' => 11, 'type' => 'int'),
			'date_modification' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
                
                \DBUtil::create_index('rubriques', 'parent_id');
	}

	public function down()
	{
		\DBUtil::drop_table('rubriques');
	}
}