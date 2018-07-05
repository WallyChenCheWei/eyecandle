<?php

//chdir(dirname(__FILE__));
//require_once(dirname(__FILE__).'/lib/Doctrine.php');
require_once('./lib/Doctrine.php');
spl_autoload_register(array('Doctrine', 'autoload'));
spl_autoload_register(array('Doctrine', 'modelsAutoload'));
$manager = Doctrine_Manager::getInstance();

// Database Connection
echo "0: Connection: ";
require_once('./sys_database.php');
echo "ok<br/>";

echo "1: DRM Setup: ";
// Doctrine Setup
$manager->setAttribute(Doctrine_Core::ATTR_AUTO_ACCESSOR_OVERRIDE, true);
$manager->setAttribute(Doctrine_Core::ATTR_AUTOLOAD_TABLE_CLASSES, true);
$manager->setAttribute(Doctrine_Core::ATTR_VALIDATE, Doctrine::VALIDATE_ALL);
echo "ok<br/>";

echo "2: Migrate: ";
$migration = new Doctrine_Migration('./internal_migrate',$conn);
$migration->migrate();
echo "ok<br/>";

echo "<br />done.";
?>
