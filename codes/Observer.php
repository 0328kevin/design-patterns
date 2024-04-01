<?php
//观察者模式

abstract class Observer{
//观察者抽象类
    public $name;
    public $noticePerson;   //具体的通知人，秘书或老板

    //观察者收到通知，更新状态
    abstract function update();
}

class StockObserver extends Observer{
//看股票的同事，观察者，实现观察者抽象类
    public function __construct($name, $noticePerson){
        $this->name = $name;
        $this->noticePerson = $noticePerson;
    }
    
    public function update() {
        printf("%s %s 关闭股票行情，继续工作\n", $this->noticePerson->subjectState, $this->name);
    }
}

class NBAObserver extends Observer{
//看股票的同事，观察者，实现观察者抽象类
    public function __construct($name, $noticePerson){
        $this->name = $name;
        $this->noticePerson = $noticePerson;
    }
    
    public function update() {
        printf("%s %s 关闭 NBA 直播，继续工作\n", $this->noticePerson->subjectState, $this->name);
    }
}

interface Notice{
//通知者抽象类
    function attach($observer, $name);
    function detach($observer, $name);
    function notify();
}

class Secretary implements Notice{
//秘书类：实现通知者抽象类的方法

    //同事列表
    public $observers;
    public function __construct(){
        $this->observers = new ObjectArray();
    }
    //增加一个同事的通知
    public function attach($observer, $name){
        $this->observers->set($name, $observer);
    }

    //减少一个同事的通知
    public function detach($observer, $name){
        $this->observers->remove($name);
    }

    //通知所有在同事列表的人
    public function notify(){
        $workmates = $this->observers->getAll();
        foreach($workmates as $value){
            $value->update();
        }
    }

}


class Boss implements Notice{
//老板类：实现通知者抽象类的方法
    
    //同事列表
    public $observers; 
    //老板状态
    public $subjectState;

    public function __construct() {
        $this->observers = new ObjectArray();
    }

    //增加某个同事的通知
    public function attach($observer, $name){
        $this->observers->set($name, $observer);
    }
    
    //减少某个同事的通知
    public function detach($observer,$name){
        $this->observers->remove($name);
    }

    //通知所有在同事列表的人
    public function notify(){
        $workmates = $this->observers->getAll();
        foreach($workmates as $value){
            $value->update();
        }
    }
    
}

class ObjectArray{
//一个对key为姓名，value为对象的数组的管理类，通用工具类
    /*
    * [
        "张三" => new observer(),
        "李四" => new observer(),
    ]
    */
    public $array = array();
    public $key;
    public $value;

    public function set($key, $value) {
        $this->array[$key] = $value;
    }

    public function getAll(): array{
        return $this->array;
    }

    public function remove($key) {
        unset($this->array[$key]);
    }
}

$boss = new Boss();

$workmateA = new StockObserver("张三", $boss);
$workmateB = new NBAObserver("李四", $boss);

//增加张三、李四的通知行为
$boss->attach($workmateA,$workmateA->name);
$boss->attach($workmateB,$workmateB->name);

//减去张三的通知行为
$boss->detach($workmateA, $workmateA->name);
// $boss->detach($workmateB,$workmateB->name);
$boss->subjectState = "我胡汉三回来了~~";
//所以李四被通知，而张三没有被通知，张三被老板抓到~~
$boss->notify();