<?php
require 'connection.php';
$app=new \atk4\ui\App('Admin');
$app->initLayout('Centered');

$crud=$app->add('Crud');
$crud->setModel(new Clients($db));

$crud1=$app->add('Crud');
$crud1->setModel(new Friends($db));

$crud2=$app->add('Crud');
$crud2->setModel(new Loan($db));

$crud3=$app->add('Crud');
$crud3->setModel(new Vozvrat($db));
