<?php
//抽象工厂模式实现 数据库访问

class User {
    public $id;
    public $name;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}

class Department{
    public $id;
    public $name;
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}

interface IUser{
    public function Insert(User $user);

    public function getUser(int $id);
}

class SqlserverUser implements IUser {
    public function Insert(User $user){
        echo "在 SQL Server 中给User表增加一条记录\n";
    }

    public function getUser(int $id){
        echo "在 SQL Server 中根据 $id 得到 User 表中的一条记录\n";
    }
}

class AccessUser implements IUser {
    public function Insert(User $user){
        echo "在 Access 中给User表增加一条记录\n";
    }

    public function getUser(int $id){
        echo "在 Access 中根据 $id 得到 User 表中的一条记录\n";
    }
}

interface IDepartment {
    public function Insert(Department $department);
    public function getDepartment(int $id);
}


class SqlserverDepartment implements IDepartment {

    public function Insert(Department $department){
        echo "在 SQL Server 中给 department 表增加一条记录\n";
    }

    public function getDepartment(int $id){
        echo "在 SQL Server 中根据 $id 得到 department 表中的一条记录\n";
    }
}

class AccessDepartment implements IDepartment {

    public function Insert(Department $department){
        echo "在 Access 中给 department 表增加一条记录\n";
    }

    public function getDepartment(int $id){
        echo "在 Access 中根据 $id 得到 department 表中的一条记录\n";
    }
}

interface IFactoryA {
//定义一个创建访问User表对象，department表对象 的抽象的工厂接口
    public function CreateUser();

    public function CreateDepartment();
}

class SqlserverFactory implements IFactoryA {

    public function CreateUser(){
        return new SqlserverUser();
    }

    public function CreateDepartment(){
        return new SqlserverDepartment();
    }
}

class AccessFactory implements IFactoryA {

    public function CreateUser(){
        return new AccessUser();
    }

    public function CreateDepartment(){
        return new AccessDepartment();
    }
}

//实例化两个数据表的类
$user = new User();
$department = new Department();

//实例化Access数据库的抽象工厂类
$factory = new AccessFactory();

//返回两个可以操作Access数据库的操作数据的方法的类，实现解耦
$accessUser = $factory->CreateUser();
$accessDepartment = $factory->CreateDepartment();


$accessUser->Insert($user);
$accessUser->getUser(2);

$accessDepartment->Insert($department);
$accessDepartment->getDepartment(1);



