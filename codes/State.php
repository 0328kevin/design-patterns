<?php
//状态模式

class Work {
    public $hour;

    public State $currentState;

    public $finish = false;
    public function __construct() {
        $this->currentState = new ForenoonState();
    }

    public function setHour(int $hour) {
        $this->hour = $hour;
    }

    public function setState(State $state) {
        $this->currentState = $state;
    }

    public function getFinish() {   
        return $this->finish;
    }

    public function setFinish(bool $finish) {
        $this->finish = $finish;
    }

    public function writeProgram() {
        $this->currentState->writeProgram($this);
    }
}

abstract class State {
//抽象状态类
    public function writeProgram(Work $work){}
}

class ForenoonState extends State{
//上午状态具体类
    public function writeProgram(Work $work){
        if ($work->hour < 12) {
            echo "当前时间：" . $work->hour . " 上午工作，精神百倍\n";
        } else {
            $work->setState(new NoonState());
            $work->writeProgram();
        }
    }
}

class NoonState extends State {
//中午状态具体类
    public function writeProgram(Work $work){
        if ($work->hour < 13) {
            echo "当前时间：". $work->hour . " 饿了，午饭；困了，午休\n";
        } else {
            $work->setState(new AfternoonState());
            $work->writeProgram();
        }
    }
}

class AfternoonState extends State {
//下午状态具体类
    public function writeProgram(Work $work){
        if ($work->hour < 17) {
            echo "当前时间：". $work->hour . " 下午状态还不错，继续努力\n";
        } else {
            $work->setState(new EveningState());
            $work->writeProgram();
        }
    }
}

class EveningState extends State {
//晚上状态具体类
    public function writeProgram(Work $work){
        if ($work->hour < 21 && !$work->finish) {   //小于21点且 未完成工作的话，就要加班
            echo "当前时间：". $work->hour . " 晚上还得加班，呜呜呜~\n";
        } else {
            $work->setState(new NightState());
            $work->writeProgram();
        }
    }
}

class NightState extends State {
//半夜状态具体类
    public function writeProgram(Work $work){
        echo "当前时间：". $work->hour . " 终于下班了，回家睡觉~\n";
    }
}

$w = new Work();
// $w->setFinish(true);
for ($i = 9; $i < 24; $i++) {
    $w->setHour($i);
    $w->writeProgram();
}
