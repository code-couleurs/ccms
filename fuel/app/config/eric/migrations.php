<?php
return array(
	'version' => 
	array(
		'app' => 
		array(
			'default' => 
			array(
				0 => '001_create_utilisateurs',
				1 => '002_create_pages',
				2 => '003_create_rubriques',
				3 => '004_create_droits',
				4 => '005_insertion_utilisateurs',
				5 => '006_create_revisions',
				6 => '007_create_blocs',
			),
		),
		'module' => 
		array(
			'blocchapo' => 
			array(
				0 => '001_create_chapo',
			),
			'bloctexte' => 
			array(
				0 => '001_create_blocs_textes',
			),
			'blocvideo' => 
			array(
				0 => '001_create_video',
			),
			'bloctextemedia' => 
			array(
				0 => '001_create_blocs_textes_medias',
			),
			'bloccaroussel' => 
			array(
				0 => '001_create_caroussel',
				1 => '002_create_carousselimage',
			),
			'pagebox' => 
			array(
				0 => '001_create_pagebox',
				1 => '002_alter_bloc',
			),
			'bloctemoignages' => 
			array(
				0 => '001_create_bloctemoignages',
				1 => '002_create_temoignages',
			),
		),
		'package' => 
		array(
		),
	),
	'folder' => 'migrations/',
	'table' => 'migration',
);
