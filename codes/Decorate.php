<?php
//装饰模式：小菜搭配衣服

class Person {
    public $name;

    public function Person($name) {
        $this->name = $name;
    }

    public function show() {
        echo " 穿搭的" . $this->name;
    }
}

class Finery extends Person {

    public $component = null;

    public function Decorate($component) {
        $this->component = $component;
    }

    public function show() {
        if ($this->component != null) {
            return $this->component->show();
        }
    }
}

class Tshirt extends Finery{

    public function show(){
        echo "Tshirt ";
        $this->component->show();
        
    }

}

class Suit extends Finery{

    public function show(){
        echo "西装 ";
        $this->component->show();
        
    }

}

class Hoodie extends Finery{

    public function show(){
        echo "卫衣 ";
        $this->component->show();
        
    }

}


$person = new Person();
$person->Person("小菜");

echo "第一套穿搭:";

$tshirt = new Tshirt();
$suit = new Suit();
$hoodie = new Hoodie();


$tshirt->Decorate($person);
$suit->Decorate($tshirt);
$hoodie->Decorate($suit);
echo $hoodie->show();