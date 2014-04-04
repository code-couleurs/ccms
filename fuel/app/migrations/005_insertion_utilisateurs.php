<?php

namespace Fuel\Migrations;

class Insertion_utilisateurs
{
	public function up()
	{
            \Fuel\Core\DB::insert('utilisateurs')
                    ->columns(array('id', 'nom','prenom','login','password','is_admin'))
                    ->values(
                        array(1, 'Marguin', 'Eric', 'admin', \Auth::instance()->hash_password('admin'), true)
                    )
                    ->execute();
	}

	public function down()
	{
            \Fuel\Core\DB::delete('utilisateurs')->where('id', 1)->execute();
	}
}