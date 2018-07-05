<?php

//chdir(dirname(__FILE__));
//require_once(dirname(__FILE__).'/lib/Doctrine.php');
require_once('./lib/Doctrine.php');
spl_autoload_register(array('Doctrine', 'autoload'));
spl_autoload_register(array('Doctrine', 'modelsAutoload'));
$manager = Doctrine_Manager::getInstance();

// Database Connection
require_once('./sys_database.php');
echo "0";
// Doctrine Setup
$manager->setAttribute(Doctrine_Core::ATTR_AUTO_ACCESSOR_OVERRIDE, true);
$manager->setAttribute(Doctrine_Core::ATTR_AUTOLOAD_TABLE_CLASSES, true);
$manager->setAttribute(Doctrine_Core::ATTR_VALIDATE, Doctrine::VALIDATE_ALL);
//$manager->setAttribute(Doctrine_Core::ATTR_MODEL_LOADING, Doctrine_Core::MODEL_LOADING_AGGRESSIVE);
//set_include_path(get_include_path() . PATH_SEPARATOR . GLOBAL_DIR . '/models/generated');


// Generate
echo "1";
Doctrine_Core::dropDatabases();
Doctrine_Core::createDatabases();
echo "2";
Doctrine_Core::generateModelsFromYaml('schema.yml', 'models');
echo "3";
Doctrine_Core::createTablesFromModels('models');
echo "4";
//從資料庫產生yaml models
//Doctrine_Core::generateModelsFromDb('models',array('doctrine'),array('generateTableClassas'=>true));
//Doctrine_Core::generateYamlFromModels('schema.yml', 'models');
//echo "5";

// Data
//Doctrine_Core::loadData('./data/fixtures');

echo "<br />done.";
?>
