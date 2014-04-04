<?php
$routes = array(
	'_root_'  => 'pages/view/accueil',  // The default route
	'_404_'  => 'pages/index',
);

if(!defined('IS_OIL'))
{
    $routes = array_merge($routes, Model_Page::liste_routes());
}

return $routes;