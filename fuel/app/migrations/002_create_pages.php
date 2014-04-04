<?php

namespace Fuel\Migrations;

class Create_pages
{
	public function up()
	{
		\DBUtil::create_table('pages', array(
			'id' => array('constraint' => 6, 'type' => 'smallint', 'auto_increment' => true, 'unsigned'=>true),
			'titre' => array('constraint' => 255, 'type' => 'varchar'),
			'url' => array('constraint' => 255, 'type' => 'varchar'),
			'template' => array('constraint' => 100, 'type' => 'varchar', 'default'=>'standard'),
			'position' => array('type' => 'smallint', 'unsigned'=>true),
			'rubrique_id' => array('type' => 'smallint', 'unsigned'=>true),
			'date_creation' => array('constraint' => 11, 'type' => 'int'),
			'date_modification' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
                
	}

	public function down()
	{
		\DBUtil::drop_table('pages');
	}
}