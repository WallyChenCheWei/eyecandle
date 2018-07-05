<?php
$folderSchema = "./internal_schema/";
$schemaFileOld = $folderSchema . "schema_2015_0910_1.yml";
$schemaFileNew = $folderSchema . "schema_2015_0915_0.yml";

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

echo "2: Generate Diff File: ";
Doctrine_Core::generateMigrationsFromDiff('./internal_migrate', $schemaFileOld, $schemaFileNew);
echo "ok<br/>";

echo "3: Generate Model Files: ";
Doctrine_Core::generateModelsFromYaml($schemaFileNew, './models');
echo "ok<br/>";

echo "<br />done.";
?>

Run <a href="./sys_migrate.php">Migrate</a>?
