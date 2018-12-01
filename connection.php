<?php
require 'vendor/autoload.php';

session_start();

$db = new \atk4\data\Persistence_SQL('mysql:dbname=heroku_33a09646a43f60a;host=eu-cdbr-west-02.cleardb.net','b40ba71796d5af','a0bf7181');

class Clients extends \atk4\data\Model{
  public $table = 'clients_ilja';
  function init(){
        parent::init();
        $this->addField('name');
        $this->addField('surname');
        $this->addField('login');
        $this->addField('password');
        $this->hasMany('Friends',new Friends);
}
}



class Friends extends \atk4\data\Model {
      public $table = 'friends_ilja';
function init(){
      parent::init();
      $this->hasMany('Loan',new Loan())->addField('total_loan', ['aggregate'=>'sum', 'field'=>'amount']);
  		$this->hasMany('Vozvrat',new Vozvrat())->addField('total_vozvrat', ['aggregate'=>'sum', 'field'=>'amount']);
  		$this->addFields(['name','email']);
      $this->hasOne('clients_ilja_id',new Clients)->addTitle();
    }
  }

  class Loan extends \atk4\data\Model{
    public $table = 'loan_ilja';
    function init(){
          parent::init();
          $this->addField('amount');
          $this->addField('date');
          $this->hasOne('friends_ilja_id',new Friends);
        }
      }

  class Vozvrat extends \atk4\data\Model{
            public $table = 'vozvrat_ilja';
            function init(){
                  parent::init();
                  $this->addField('amount');
                  $this->addField('date');
                  $this->hasOne('friends_ilja_id',new Friends);
                }
              }


    class ReminderBox extends \atk4\ui\View {
      public $ui='piled segment';
        public function setModel(\atk4\data\Model $friend) {
            $this->add('Header')->set('Please repay my loan, '.$friend['name']);
            $this->add('Text')->addParagraph('I have loaned you a total of ' . $friend['total_borrowed']
            . '€ from which you still owe me ' . ($friend['total_borrowed']-$friend['total_returned']) . '€. Please pay back!');
            $this->add('Text')->addParagraph('Thanks!');
                  }
              }
