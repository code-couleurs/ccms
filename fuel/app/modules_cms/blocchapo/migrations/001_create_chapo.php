<?php

namespace Fuel\Migrations;

class Create_chapo
{
	public function up()
	{
		\DBUtil::create_table('blocs_chapo', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned'=>true),
			'contenu' => array('type' => 'text'),
			'bloc_id' => array('constraint' => 11, 'type' => 'int', 'unsigned'=>true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('blocs_texte');
	}
}