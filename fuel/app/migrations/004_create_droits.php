<?php

namespace Fuel\Migrations;

class Create_droits
{
	public function up()
	{
		\DBUtil::create_table('droits', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned'=>true),
			'droit' => array('type' => 'varchar', 'constraint'=>100),
			'utilisateur_id' => array('type' => 'int', 'unsigned'=>true),
			'rubrique_id' => array('type' => 'smallint', 'unsigned'=>true, 'null'=>true),
                        'page_id' => array('type' => 'smallint', 'unsigned'=>true, 'null'=>true),
			'date_creation' => array('constraint' => 11, 'type' => 'int'),
			'date_modification' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('droits_utilisateurs');
	}
}