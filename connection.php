<?php

require_once __DIR__."/vendor/autoload.php";

//require_once (__DIR__."/functions.php");
require_once(__DIR__."/bootstrap.php");
require_once(__DIR__ . "/Database.php");

spl_autoload_register(function ($name) {
    if (strstr($name,"Impl")) include_once(__DIR__."/src/Implementations/".$name.".php");
});


include_once('src/Entity/Users.php');
include_once('src/Entity/Polls.php');
include_once('src/Entity/Answears.php');
include_once('src/Entity/Votes.php');
if (!isset($entityManager)) {
    $entityManager = Database::getConnection();
}

?>