<?php

namespace Fuel\Migrations;

class Alter_bloc
{
	public function up()
	{
		\DBUtil::add_fields('blocs', array(
                    'pagebox_id' => array('type' => 'int', 'unsigned'=>true, 'null'=>true),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('blocs', array('pagebox_id'));
	}
}