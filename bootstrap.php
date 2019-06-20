<?php
if (!defined('HEADER_204')) define('HEADER_204', "204 No Content. There were no records to return based on your query.");
if (!defined('HEADER_400')) define('HEADER_400', "400 Validation Error.");
if (!defined('CODE_400')) define('CODE_400', "MODEL_VALIDATION_FAILED");
if (!defined('HEADER_401')) define('HEADER_401', "401 Authorization Error.");
if (!defined('CODE_401')) define('CODE_401', "UNAUTHORIZED");
if (!defined('HEADER_404')) define('HEADER_404', '404 Resource Not Found Error.');
if (!defined('CODE_404')) define('CODE_404', "RESOURCE_NOT_FOUND");
if (!defined('DEFAULT_ERROR')) define('DEFAULT_ERROR', "500 default unexpected server error.");
if (!defined('BASE_HREF')) define('BASE_HREF', "/votingtest/");
require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("src/Entity/");
$isDevMode = true;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '123456',
    'dbname'   => 'votingApp',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode,null, null, false);
$entityManager = EntityManager::create($dbParams, $config);
spl_autoload_register(function ($name) {
    if (strstr($name,"Impl")) include_once(__DIR__."/src/Implementations/".$name.".php");
});