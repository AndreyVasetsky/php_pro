<?php

use App\models\User;

include ($_SERVER['DOCUMENT_ROOT'] . '/../services/Autoload.php');

spl_autoload_register([new \App\services\Autoload(), 'loadClass']);

$user1 = new User();

$user2 = new User();

var_dump($user1->getOne(2));
var_dump($user2->getAll());


