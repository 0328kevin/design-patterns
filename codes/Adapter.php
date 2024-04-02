<?php
//适配器模式
//姚明刚到NBA需要翻译教练的布置
class Player{
    public string $name;
    public function __construct(string $name){
        $this->name = $name;
    }
    public function Attack() {}

    public function Defense() {}
}

class Forward extends Player{
    public string $name;
    public function Attack() {
        echo "前锋 " . $this->name ." 进攻\n";
    }

    public function Defense() {
        echo "前锋 ". $this->name ." 防守\n";
    }
}

class Center extends Player{
    public string $name;
    public function Attack() {
        echo "中锋 " . $this->name ." 进攻\n";
    }

    public function Defense() {
        echo "中锋 ". $this->name ." 防守\n";
    }
}

class Guard extends Player{
    public string $name;
    public function Attack() {
        echo "后卫 " . $this->name ." 进攻\n";
    }

    public function Defense() {
        echo "后卫 ". $this->name ." 防守\n";
    }
}

class ForeignerCenter {
//外籍中锋具体类
    public string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function ChineseAttack() {
        echo "外籍中锋 " . $this->name ." 进攻\n";
    }

    public function ChineseDefense() {
        echo "外籍中锋 " . $this->name ." 防守\n";
    }
    
}

class TranslatorAdapter extends Player {
//适配器翻译者类
    private ForeignerCenter $center;

    public function __construct(string $name) {
        $this->center = new ForeignerCenter($name);
    }
    public function Attack() {
        return $this->center->ChineseAttack();
    }

    public function Defense() {
        return $this->center->ChineseDefense();
    }
}

$f = new Forward("麦迪");
$f->Attack();
$f->Defense();

$g = new Guard("巴蒂尔");
$g->Attack();
$g->Defense();

$y = new TranslatorAdapter("姚明");
$y->Attack();
$y->Defense();
