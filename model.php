<?php
require 'connection.php';
$app=new \atk4\ui\App('Clients');
$app->initLayout('Centered');


$form1 = $app->layout->add('Form');
$form1->setModel(new Clients($db));
$form1->onSubmit(function($form1){

  $form1->model->save();
  return $form1->success('Record updated');

});



$form2 = $app->layout->add('Form');
$form2->setModel(new Friends($db));
$form2->onSubmit(function($form2){
  $form2->model->save();
  return $form2->success('Record updated');

});
  
