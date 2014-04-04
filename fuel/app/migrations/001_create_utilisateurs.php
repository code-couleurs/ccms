<?php

namespace Fuel\Migrations;

class Create_utilisateurs
{
	public function up()
	{
		\DBUtil::create_table('utilisateurs', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned'=>true),
			'nom' => array('constraint' => 100, 'type' => 'varchar'),
			'prenom' => array('constraint' => 100, 'type' => 'varchar'),
			'login' => array('constraint' => 100, 'type' => 'varchar'),
			'password' => array('constraint' => 255, 'type' => 'varchar'),
                        'email' => array('constraint' => 100, 'type' => 'varchar'),
                        'is_admin' => array('type' => 'boolean'),
			'date_creation' => array('constraint' => 11, 'type' => 'int'),
			'date_modification' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('utilisateurs');
	}
}