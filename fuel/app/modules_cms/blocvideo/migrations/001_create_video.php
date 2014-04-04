<?php

namespace Fuel\Migrations;

class Create_video
{
	public function up()
	{
		\DBUtil::create_table('blocs_video', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned'=>true),
			'caption' => array('type' => 'text', 'null'=>true, 'default'=>''),
                        'path' => array('type' => 'text'),
			'bloc_id' => array('constraint' => 11, 'type' => 'int', 'unsigned'=>true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('blocs_video');
	}
}