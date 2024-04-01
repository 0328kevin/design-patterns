<?php
//模板方法模式

class TestPaper {

    public function TestQuestion1() {
        echo "第一道测试题：~~~";
    }

    public function TestQuestion2() {
        echo "第二道测试题：XX~~";
    }

    protected function answer1() {
        return "";
    }

    protected function answer2() {
        return "";
    }
}

class TestPaperA extends TestPaper {
//学生甲抄的试卷
    public function answer1() {
        return "A";
    }

    public function answer2() {
        return "B";
    }

}

class TestPaperB extends TestPaper {
//学生乙抄的试卷
    public function answer1() {
        return "C";
    }

    public function answer2() {
        return "D";
    }

}

$testPaperA = new TestPaperA();
echo "学生甲抄的试卷：\n";
echo $testPaperA->answer1() . "\n";
echo $testPaperA->answer2() . "\n";

$testPaperB = new TestPaperB();
echo "学生乙抄的试卷：\n";
echo $testPaperB->answer1() . "\n";
echo $testPaperB->answer2() . "\n";