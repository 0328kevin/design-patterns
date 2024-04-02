<?php
//备忘录模式
//游戏存档

class Role {
//游戏角色类
    public $vit;  //生命值
    public $atk;  //攻击值
    public $def;  //防御值

    //初始化角色状态
    public function initState() {
        $this->vit = 100;
        $this->atk = 100;
        $this->def = 100;
    }

    public function Fight() {
        $this->vit = 100 - rand(0,100);
        $this->atk = 100 - rand(0,100);
        $this->def = 100 - rand(0,100);
    }

    //查看角色状态
    public function RoleStateDisplay() {
        echo "角色状态：\n";
        printf("生命值：%s 攻击值：%s 防御值：%s \n", $this->vit, $this->atk, $this->def);
    }
    //存储角色状态
    public function storeRoleState() {
        return new RoleStateMomento($this->vit, $this->atk, $this->def);
    }

    //恢复角色状态
    public function restoreRoleState(RoleStateMomento $state) {
        $this->vit = $state->getVit();
        $this->atk = $state->getAtk();
        $this->def = $state->getDef();
    }
}

class RoleStateMomento {
//游戏角色状态 存储箱类
    public $vit;  //生命值
    public $atk;  //攻击值
    public $def;  //防御值

    public function __construct($vit, $atk, $def) {
        $this->vit = $vit;
        $this->atk = $atk;
        $this->def = $def;
    }

    public function getVit() {
        return $this->vit;
    }
    public function getAtk() {
        return $this->atk;
    }
    public function getDef() {
        return $this->def;
    }
}

class RoleStateCaretaker {
//游戏角色状态备忘录管理
    public RoleStateMomento $momento;

    public function getMomento() {
        return $this->momento;
    }

    public function setMomento(RoleStateMomento $momento) {
        $this->momento = $momento;
    }
}

//初始化游戏角色状态
$role = new Role();
$role->initState();
//显示状态值
$role->RoleStateDisplay();

//实例化角色备忘录管理类
$momentsCaretaker = new RoleStateCaretaker();
//存档
$momentsCaretaker->momento = $role->storeRoleState();
//打boss
$role->Fight();
//显示状态值
$role->RoleStateDisplay();
//恢复
$role->restoreRoleState($momentsCaretaker->getMomento());
//显示状态值
$role->RoleStateDisplay();