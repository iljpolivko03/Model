<?php
require 'connection.php';
$app=new \atk4\ui\App('Login');
$app->initLayout('Centered');


$user= new Clients($db);
$form=$app->layout->add('Form');
$form->buttonSave->set('Вход');
$form->setModel(new Clients($db),['login','password']);
$form->onSubmit(function($form) use ($user){
  $user->tryLoadBy('nick_name',$form->model['nick_name']);
  if ($user['password'] == $form->model['password']){
    $_SESSION['clients_id'] = $user->id;
    return new \atk4\ui\jsEXpreession('document.location="main.php"');
  } else {
    $user->unload();
    $er=(new \atk4\ui\jsNotify('No such user'));
    $er->setColor('red');
    return $er;
  }
});
