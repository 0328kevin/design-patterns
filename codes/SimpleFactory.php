<?php
//简单工厂模式

abstract class CashSuper{
//计算价格抽象类
    public function acceptCash($money){}
}

class CashNormal extends CashSuper{
//原价类，继承抽象方法
    public function acceptCash($money){
        return $money;
    }
}

class CashRebate extends CashSuper{
//折扣类，继承价格抽象类
    private $discount = 1;

    public function __construct($discount){
        $this->discount = $discount;
    }

    public function acceptCash($money){
        return $this->discount * $money;
    }
}

class CashReturn extends CashSuper{
//返现类，继承价格抽象类
    //满足返现金额
    private $amount = 0;

    //返还金额
    private $return = 0;

    public function __construct($amount = 0, $return = 0){
        $this->amount = $amount;
        $this->return = $return;
    }

    public function acceptCash($money){
        $result = $money;
        if ($result >= $this->amount) {
            $result = $money - floor($money/$this->amount)*$this->return;
        }
        return $result;
    }
}

class CashFactory extends CashSuper{
//价格工厂类，返回不同价格计算方式的实例对象

    public static function cashResult($type){
        switch ($type){
            case "原价":
                return new CashNormal();
            case "打8折":
                return new CashRebate(0.8);
            case "打7折":
                return new CashRebate(0.7);
            case "满300减100":
                return new CashReturn(300,100);
            default:
                return new Exception("error cash type");
        }
    }
}
$price = 100;

$quality = 10;

$arr = array("原价", "打8折", "满300减100", "打7折");


foreach ($arr as $key => $value) {
    $cashSuper = CashFactory::cashResult($value);
    echo $cashSuper->acceptCash($price*$quality);
    echo "\n";
}