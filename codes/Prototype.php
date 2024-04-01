<?php
//原型模式

class workExperience  {
//工作经历类：包含了在职公司和在职时间
    public $company;
    public $timeArea;

    public function setWorkExperience($company, $timeArea){
        $this->company = $company;
        $this->timeArea = $timeArea;
    }

    public function getWorkDate(){
        return $this->timeArea;
    }

    public function getCompany(){
        return $this->company;
    }

    public function Clone() {
        return clone $this;
    }
}

class Resume {
//简历类：包含了简历的相关字段
    private $name;
    private $sex;
    private $age;
    private $workExperience;

    public function __construct($name) {
        $this->name = $name;
        $this->workExperience = new WorkExperience();
    }

    public function setPersonInfo($sex, $age) {
        $this->sex = $sex;
        $this->age = $age;
    }

    public function setWorkExperience($timeArea, $company){
        $this->workExperience->setWorkExperience($company, $timeArea);
     
    }

    //展示简历上所有字段
    public function display() {
        printf("%s, %s, %s", $this->name,$this->sex,$this->age);
        echo "\n";
        printf("工作经历：%s %s",$this->workExperience->getWorkDate(),$this->workExperience->getCompany());
        echo "\n";
    }

    public function clone()
    {
        $cloneResume = new Resume($this->name);
        $cloneResume->name = $this->name;
        $cloneResume->sex = $this->sex;
        $cloneResume->age = $this->age;
        $cloneResume->workExperience = $this->workExperience->Clone();  //深拷贝，值拷贝和引用拷贝
        return $cloneResume;
    }
}

$resumeA = new Resume("大鸟");
$resumeA->setPersonInfo("男","29");
$resumeA->setWorkExperience("1998-2000","XX公司");

$resumeB = $resumeA->clone();
$resumeB->setWorkExperience("2000-2005", "YY公司");

$resumeC = $resumeA->clone();
$resumeC->setPersonInfo("男","30");
$resumeC->setWorkExperience("2000-2005", "ZZ公司");

$resumeA->display();
$resumeB->display();
$resumeC->display();