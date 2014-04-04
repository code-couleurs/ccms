<?php

namespace Fuel\Migrations;

class Create_blocs_textes_medias
{
	public function up()
	{
		\DBUtil::create_table('blocs_texte_media', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned'=>true),
			'titre' => array('constraint' => 100, 'type' => 'varchar'),
                        'media' => array('constraint' => 100, 'type' => 'varchar'),
			'contenu' => array('type' => 'text'),
			'bloc_id' => array('constraint' => 11, 'type' => 'int', 'unsigned'=>true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('blocs_texte_media');
	}
}