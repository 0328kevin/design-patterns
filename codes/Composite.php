<?php
//组合模式
//总公司和全国分公司层级关系

abstract class company {
    public $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    abstract function add(company $company);     //增加
    abstract function remove(company $company);   //移除
    abstract function display(int $depth);     //显示
    abstract function lineOfDuty(); //履行职责
}

class ConcreteCompany extends company {
//具体公司类
    public array $children = [];

    public function add(company $department) {
        array_push($this->children, $department);
    }

    public function remove(company $department) {
        foreach ($this->children as $key => $dpt) {
            if ($dpt === $department) {
                unset($this->children[$key]);
            }
        }
    }

    public function display(int $depth) {
        echo str_repeat("-", $depth) . $this->name . "\n";
        foreach ($this->children as $dpt) {
            $dpt->display($depth + 2);
        }
    }

    public function lineOfDuty() {
        foreach ($this->children as $dpt) {
            $dpt->lineOfDuty();
        }
    }
}

class HRDepartment extends company {
    public function add(company $department) {}
    public function remove(company $department) {}

    public function display(int $depth) {
        echo str_repeat("-", $depth). $this->name ."\n";
    }

    public function lineOfDuty() {
        echo $this->name ."：员工招聘培训管理\n";
    }
}

class FinanceDepartment extends company {
    public function add(company $department) {}
    public function remove(company $department) {}

    public function display(int $depth) {
        echo str_repeat("-", $depth). $this->name ."\n";
    }

    public function lineOfDuty() {
        echo $this->name ."：员工财务培训管理\n";
    }
}

$c = new ConcreteCompany("北京总公司");
$c->add(new HRDepartment("总公司人力资源部"));
$c->add(new FinanceDepartment("总公司财务部"));

$shanghai = new ConcreteCompany("上海华东分公司");
$shanghai->add(new HRDepartment("上海分公司人力资源部"));
$shanghai->add(new FinanceDepartment("上海分公司财务部"));
$c->add($shanghai);

$nanjing = new ConcreteCompany("南京办事处");
$nanjing->add(new HRDepartment("南京办事处人力资源部"));
$nanjing->add(new FinanceDepartment("南京办事处财务部"));
$shanghai->add($nanjing);

$hangzhou = new ConcreteCompany("杭州办事处");
$hangzhou->add(new HRDepartment("杭州办事处人力资源部"));
$hangzhou->add(new FinanceDepartment("杭州办事处财务部"));
$shanghai->add($hangzhou);

echo "结构图\n";
echo $c->display(1);

echo "职责\n";
echo $c->lineOfDuty();