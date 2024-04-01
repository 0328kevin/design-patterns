<?php
//工厂方法模式

interface IFactory {
//学雷锋工厂接口类
    function createLeiFeng();

}

class underGraduateFactory implements IFactory {
//学雷锋的大学生工厂类，实现学雷锋工厂接口类
    function createLeiFeng() {
        return new underGraduate();
    }
}

class VolunteerFactory implements IFactory {
//学雷锋的社区志愿者类，实现学雷锋工作接口类
    function createLeiFeng() {
        return new Volunteer();
    }
}

class underGraduate {
//大学生类，帮助老人方法
    public function BuyRice() {
        echo "买米\n";
    }

    public function Sweep() {
        echo "扫地\n";
    }

    public function Wash() {
        echo "洗衣服\n";
    }
}

class Volunteer{
//社区志愿者类，帮助老人方法
    public function BuyRice() {
        echo "买米\n";
    }

    public function Sweep() {
        echo "扫地\n";
    }

    public function Wash() {
        echo "洗衣服\n";
    }
}


$underGraduateFactory = new underGraduateFactory();
$student = $underGraduateFactory->createLeiFeng();

echo "大学生学雷锋帮助老人\n";
$student->BuyRice();
$student->Sweep();

$volunteeFactory = new VolunteerFactory();
$voluntee = $volunteeFactory->createLeiFeng();

echo "社区志愿者学雷锋帮助老人\n";
$voluntee->Sweep();
$voluntee->Wash();
$voluntee->BuyRice();