<?php
require 'connection.php';
$app=new \atk4\ui\App('Admin');
$app->initLayout('Centered');

$crud=$app->add('CRUD');
$crud->setModel(new Clients($db));

$crud1=$app->add('CRUD');
$crud1->setModel(new Friends($db));

$crud2=$app->add('CRUD');
$crud2->setModel(new Loan($db));

$crud3=$app->add('CRUD');
$crud3->setModel(new Vozvrat($db));
