<?php
//策略模式

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


class CashContext {
//商品价格 策略模式 context类
    public $cashSuper = null;

    public function __construct($cashSuperType){
        switch ($cashSuperType){
            case "原价":
                $this->cashSuper =  new CashNormal();
                break;
            case "打8折":
                $this->cashSuper = new CashRebate(0.8);
                break;
            case "打7折":
                $this->cashSuper = new CashRebate(0.7);
                break;
            case "满300减100":
                $this->cashSuper = new CashReturn(300,100);
                break;
            default:
                throw new Exception("error cash type");
        }
    }

    public function getResult($money){
        return $this->cashSuper->acceptCash($money);
    }
}

$price = 100;

$quality = 10;

$arr = array("原价", "打8折", "满300减100", "打7折");

foreach ($arr as $key => $value) {
    $cashCont = new CashContext($value);
    echo $cashCont->getResult($price*$quality);
    echo "\n";
}