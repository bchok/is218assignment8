<?php
function pass_by_value($param){
  $array2 = array(4,5,6);
  array_merge($param, $array2);
}

$ar1 = array(1,2,3,4);
pass_by_value($$ar1);
echo 'pass by value <br>';
foreach ($ar1 as $elem){
  print "<br>$elem";
}

function pass_by_reference($param){
  $array3 = array(4,5,6);
  array_merge($param, $array3);
}
$ar2 = array(1,2,3,4);
pass_by_reference($ar2);
echo '<br>pass by reference<br>';
foreach ($ar2 as $elem){
  print "<br>$elem";
}



//shows object inheritance
    class Foo {

        public function printItem($string){
            echo 'Foo: ' . $string . PHP_EOL;
        }

        public function printPHP(){
            echo 'PHP is great.' . PHP_EOL;
        }
    }

    class Bar extends Foo{
        public function printItem($string){
            echo 'Bar: ' . $string . PHP_EOL;
        }
    }

    $foo = new Foo();
    $bar = new Bar();
    $foo->printItem('baz');
    echo '<br>';
    $foo->printPHP();
    echo '<br>';
    $bar->printItem('baz');
    echo '<br>';
    $bar->printPHP();

/////////////////////////////////////////////////////////////////////////////

  //shows object interfaces
    interface iTemplate{
        public function setVariable($name, $var);
        public function getHtml($template);
    }


    class Template implements iTemplate{
        private $vars = array();

        public function setVariable($name, $var){
            $this->vars[$name] = $var;
        }

        public function getHtml($template){
            foreach($this->vars as $name => $value) {
                $template = str_replace('{' . $name . '}', $value, $template);
            }

            return $template;
        }
    }

    $obj = new Template;
    echo $obj->setVariable('Brian', 'Test');

    $obj2 = new Template;
    echo '<br>';
    echo $obj2->getHtml('google');
    echo '<br><br>';

////////////////////////////////////////////////////////////////////

//shows object comparison
function bool2str($bool){
  if ($bool === false){
    return 'False';
  }else{
    return 'TRUE';
  }
}

function compareObjects(&$o1, &$o2){
  echo 'o1 == o2 : ' .bool2str($o1 == $o2) . "\n";
  echo 'o1 != o2 : ' .bool2str($o1 != $o2) . "\n";
  echo 'o1 === o2 : ' .bool2str($o1 === $o2) . "\n";
  echo 'o1 !== o2 : ' .bool2str($o1 !== $o2) . "\n";
}

class Flag{
  public $flag;

  function Flag($flag = true){
    $this->flag = $flag;
  }
}

class OtherFlag{
  public $flag;

  function OtherFlag($flag = true){
    $this->flag = $flag;
  }
}

$o = new Flag();
$p = new Flag();
$q = $o;
$r = new OtherFlag();

echo "Two instances of the same class\n";
compareObjects($o, $p);
echo "\nTwo references to the same instance\n";
compareObjects($o, $q);
echo "\nInstances of two different classes\n";
compareObjects($o, $r);
//////////////////////////////////////////////////
//shows object cloning
class SubObject{
  static $instances = 0;
  public $instance;

  public function __construct(){
    $this->instance = ++self::$instances;
  }
  public function __clone(){
    $this->instance = ++self::$instances;
  }
}

class MyCloneable{
  public $object1;
  public $object2;

  function __clone(){
    $this->object1 = clone $this->object1;
  }
}

$obj3 = new MyCloneable();

$obj3->object1 = new SubObject();
$obj3->object2 = new SubObject();

$obj4 = clone $obj3;

echo'<br><br>';
print("original object:\n");
print_r($obj3);

echo '<br>';
print("Cloned Object:\n");
print_r($obj4);
/////////////////////////////////////////////////////////////
//shows object iteration
class MyClass{
  public $var1 = 'value 1';
  public $var2 = 'value 2';
  public $var3 = 'value 3';

  protected $protected = 'protected variable';
  private $private = 'private variable';

  function iterateVisible(){
    echo "MyClass::iterateVisible:\n";
    foreach ($this as $key => $value){
      print "$key => $value\n";
    }
  }
}

$class - new MyClass();

foreach($class as $key => $value){
  print "$key => $value\n";
}
echo "\n";

$class->iterateVisible();

?>
