<?php
//代理模式

interface GiveGift {
//送礼物接口类
    function giveDolls();
    function giveFlowers();
    function giveChocolate();
}

class Pursuit implements GiveGift {

    //追求者类：实现送礼物接口

    public $name;
    public function __construct($name) {
        $this->name = $name;
    }

    public function giveDolls() {
        echo $this->name . "送玩偶\n";
    }

    public function giveFlowers() {
        echo $this->name . "送花\n";
    }

    public function giveChocolate() {
        echo $this->name . "送巧克力\n";
    }

}

class proxy implements GiveGift {
    //代理类，实现送礼物接口，代理追求者类

    public $proxy = null;

    public function __construct($pursuitName) {
        if ($this->proxy == null) {
            $this->proxy = new Pursuit($pursuitName);
        }
    }

    public function giveDolls() {
        $this->proxy->giveDolls();
    }

    public function giveFlowers() {
        $this->proxy->giveFlowers();
    }

    public function giveChocolate() {
        $this->proxy->giveChocolate();
    }
}

$proxy = new proxy("戴笠");
$proxy->giveDolls();
$proxy->giveFlowers();
$proxy->giveChocolate();