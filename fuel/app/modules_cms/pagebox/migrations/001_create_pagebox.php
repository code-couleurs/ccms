<?php

namespace Fuel\Migrations;

class Create_pagebox
{
	public function up()
	{
		\DBUtil::create_table('pages_box', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned'=>true),
			'titre' => array('constraint' => 100, 'type' => 'varchar'),
                        'bloc_parent_id' => array('type' => 'int', 'unsigned'=>true)
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('pages_box');
	}
}