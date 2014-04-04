<?php

namespace Fuel\Migrations;

class Create_revisions
{
	public function up()
	{
		\DBUtil::create_table('revisions', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned'=>true),
			'type' => array('constraint' => 50, 'type' => 'varchar'),
			'intitule' => array('constraint' => 100, 'type' => 'varchar'),
			'page_id' => array('type' => 'smallint', 'unsigned'=>true),
                        'contributeur_id' => array('type' => 'int', 'unsigned'=>true, 'null'=>true),
			'date_creation' => array('constraint' => 11, 'type' => 'int'),
			'date_modification' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('revisions');
	}
}