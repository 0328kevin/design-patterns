<?php
//建造者模式

abstract class PersonBuilder{
//建造人的抽象类：姓名，头，身体，两只手，两条腿
    protected $name;

    public function PersonBuilder($name){
        $this->name = $name;
    }

    abstract function buildHead();
    abstract function buildBody();
    abstract function buildHand();
    abstract function buildFooter();
}

class personThinBuilder extends PersonBuilder{
//生成瘦人的类，集成建造人的抽象类
    public $name;
    public function __construct($name){
        $this->name = $name;
    }

    public function buildHead(){
        echo "瘦人的头\n";
    }
    public function buildBody(){
        echo "瘦人的身体\n";
    }
    public function buildHand(){
        echo "瘦人的两只手\n";
    }
    public function buildFooter(){
        echo "瘦人的两只脚\n";
    }
}

class personDirector{

    private $personBuilder;
    public function __construct($personBuilder){
        $this->personBuilder = $personBuilder;
    }
    public function createPerson(){
        echo "开始“建造”：" . $this->personBuilder->name . "\n";
        $this->personBuilder->buildHead();
        $this->personBuilder->buildBody();
        $this->personBuilder->buildHand();
        $this->personBuilder->buildFooter();
    }
}

//“建造” 一个瘦人
$personThinBuilder = new personThinBuilder("张三");
$pd = new personDirector($personThinBuilder);
$pd->createPerson();