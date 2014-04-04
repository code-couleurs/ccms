Error - 2012-11-01 14:53:22 --> 4096 - Argument 1 passed to Orm\Model::__construct() must be an array, string given, called in /home/praentitong/www/cms_rte/fuel/packages/orm/classes/model.php on line 111 and defined in /home/praentitong/www/cms_rte/fuel/packages/orm/classes/model.php on line 669
Error - 2012-11-01 14:53:54 --> 8 - Undefined variable: utilisateur in /home/praentitong/www/cms_rte/fuel/app/classes/model/utilisateur.php on line 48
Error - 2012-11-01 14:54:07 --> Error - Related model not found by Has_Many relation "droits": Model_DroitsUtilisateur in /home/praentitong/www/cms_rte/fuel/packages/orm/classes/hasmany.php on line 37
Error - 2012-11-01 14:54:32 --> 1054 - Unknown column 't0.droit' in 'field list' [ SELECT `t0`.`id` AS `t0_c0`, `t0`.`utilisateur_id` AS `t0_c1`, `t0`.`droit` AS `t0_c2`, `t0`.`rubrique_id` AS `t0_c3`, `t0`.`page_id` AS `t0_c4`, `t0`.`date_creation` AS `t0_c5`, `t0`.`date_modification` AS `t0_c6` FROM `droits_utilisateurs` AS `t0` WHERE `t0`.`utilisateur_id` = '2' ] in /home/praentitong/www/cms_rte/fuel/core/classes/database/mysql/connection.php on line 235
Error - 2012-11-01 14:55:18 --> 1146 - Table 'cmsrte.pages' doesn't exist [ SELECT `t0`.`id` AS `t0_c0`, `t0`.`titre` AS `t0_c1`, `t0`.`url` AS `t0_c2`, `t0`.`position` AS `t0_c3`, `t0`.`rubrique_id` AS `t0_c4`, `t0`.`date_creation` AS `t0_c5`, `t0`.`date_modification` AS `t0_c6` FROM `pages` AS `t0` ] in /home/praentitong/www/cms_rte/fuel/core/classes/database/mysql/connection.php on line 235
Error - 2012-11-01 14:57:20 --> Error - Arr::merge() - all arguments must be arrays. in /home/praentitong/www/cms_rte/fuel/core/classes/arr.php on line 755
Error - 2012-11-01 14:57:36 --> 1072 - Key column 'contributeur_id' doesn't exist in table [ CREATE INDEX `contributeur_id` ON `pages` (`contributeur_id`) ] in /home/praentitong/www/cms_rte/fuel/core/classes/database/mysql/connection.php on line 235
Error - 2012-11-01 14:58:01 --> 1061 - Duplicate key name 'rubrique_id' [ CREATE INDEX `rubrique_id` ON `pages` (`rubrique_id`) ] in /home/praentitong/www/cms_rte/fuel/core/classes/database/mysql/connection.php on line 235
Error - 2012-11-01 14:58:38 --> 1061 - Duplicate key name 'rubrique_id' [ CREATE INDEX `rubrique_id` ON `pages` (`rubrique_id`) ] in /home/praentitong/www/cms_rte/fuel/core/classes/database/mysql/connection.php on line 235
Error - 2012-11-01 15:00:26 --> 8 - Undefined variable: type_droit in /home/praentitong/www/cms_rte/fuel/app/views/admin/utilisateurs/droit_rubrique.php on line 5
Error - 2012-11-01 15:03:43 --> Error - Class 'Model_DroitsUtilisateur' not found in /home/praentitong/www/cms_rte/fuel/app/classes/controller/admin/utilisateurs.php on line 74
Error - 2012-11-01 15:04:28 --> 4096 - Object of class Model_Page could not be converted to string in /home/praentitong/www/cms_rte/fuel/app/classes/model/utilisateur.php on line 50
Error - 2012-11-01 15:06:36 --> 4096 - Object of class Model_Page could not be converted to string in /home/praentitong/www/cms_rte/fuel/app/classes/model/utilisateur.php on line 50
Error - 2012-11-01 15:07:21 --> 4096 - Object of class Model_Page could not be converted to string in /home/praentitong/www/cms_rte/fuel/app/classes/model/utilisateur.php on line 50
Error - 2012-11-01 15:16:29 --> Error - Call to a member function where() on a non-object in /home/praentitong/www/cms_rte/fuel/app/classes/model/utilisateur.php on line 59
Error - 2012-11-01 15:31:41 --> Error - Class 'Droit' not found in /home/praentitong/www/cms_rte/fuel/app/classes/model/utilisateur.php on line 60
Error - 2012-11-01 15:41:17 --> 2048 - Non-static method Model_Page::liste_routes() should not be called statically in /home/praentitong/www/cms_rte/fuel/app/config/routes.php on line 9
Error - 2012-11-01 15:41:26 --> Error - Class 'Db' not found in /home/praentitong/www/cms_rte/fuel/app/classes/model/page.php on line 71
Error - 2012-11-01 15:41:33 --> Error - Class 'Db' not found in /home/praentitong/www/cms_rte/fuel/app/classes/model/page.php on line 71
Error - 2012-11-01 15:41:50 --> 4096 - Object of class Fuel\Core\Database_MySQL_Result could not be converted to string in /home/praentitong/www/cms_rte/fuel/app/classes/model/page.php on line 74
Error - 2012-11-01 15:42:48 --> Error - Maximum execution time of 30 seconds exceeded in /home/praentitong/www/cms_rte/fuel/core/classes/database/mysql/result.php on line 0
Error - 2012-11-01 15:48:17 --> 2 - Illegal offset type in /home/praentitong/www/cms_rte/fuel/app/classes/model/page.php on line 73
Error - 2012-11-01 16:13:32 --> Compile Error - Cannot make static method Orm\Model::find() non static in class Model_Utilisateur in /home/praentitong/www/cms_rte/fuel/app/classes/model/utilisateur.php on line 86
Error - 2012-11-01 16:13:47 --> 8 - Trying to get property of non-object in /home/praentitong/www/cms_rte/fuel/app/classes/auth/login/cms.php on line 82
Error - 2012-11-01 16:14:15 --> 8 - Trying to get property of non-object in /home/praentitong/www/cms_rte/fuel/app/classes/auth/login/cms.php on line 82
Error - 2012-11-01 16:14:27 --> 8 - Trying to get property of non-object in /home/praentitong/www/cms_rte/fuel/app/classes/auth/login/cms.php on line 82
Error - 2012-11-01 16:14:34 --> 8 - Trying to get property of non-object in /home/praentitong/www/cms_rte/fuel/app/classes/auth/login/cms.php on line 82
Error - 2012-11-01 16:14:55 --> 8 - Trying to get property of non-object in /home/praentitong/www/cms_rte/fuel/app/classes/auth/login/cms.php on line 82
Error - 2012-11-01 16:16:58 --> Error - Cache identifier can only contain alphanumeric characters, underscores, dashes & dots. in /home/praentitong/www/cms_rte/fuel/core/classes/cache/storage/driver.php on line 193
