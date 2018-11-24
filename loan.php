<?php
require 'connection.php';
$app=new \atk4\ui\App('Loan');
$app->initLayout('Centered');


$friends=new Friends($db);
$friends->load($_GET['friends_id']);
$loan=$friends->ref('Loan');
$crud=$app->add('CRUD');
//$crud->addDecorator('name', new \atk4\ui\TableColumn\Link('loan.php?friends_id={$id}'));
$crud->setModel($loan);

$vozvrat=$friends->ref('Vozvrat');
$crud=$app->add('CRUD');
$crud->setModel($vozvrat);

$reminder=$app->add(new ReminderBox());
$reminder->setModel($friends);
  
