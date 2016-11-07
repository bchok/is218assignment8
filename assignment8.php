<?php

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

?>      

