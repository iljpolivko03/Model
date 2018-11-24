<?php
require 'connection.php';
$app=new \atk4\ui\App('Main');
$app->initLayout('Centered');


$clients=new Clients($db);
$clients->load($_SESSION['clients_id']);
$friends=$clients->ref('Friends');
$crud=$app->add('CRUD');
$crud->addDecorator('name', new \atk4\ui\TableColumn\Link('loan.php?friends_id={$id}'));
$crud->setModel($friends);
