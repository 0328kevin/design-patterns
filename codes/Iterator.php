<?php
//迭代器模式

abstract class IteratorMode
{
    //迭代器抽象类
    abstract public function first();
    abstract public function next();
    abstract public function isDone(): bool;
    abstract public function currentItem();
}

abstract class Aggregate
{
    //聚集抽象类
    abstract public function createIterator();
}

class ConcreteIterator extends IteratorMode
{
    //具体迭代器类
    //定义一个具体聚集对象
    private array $aggregate;

    private int $current = 0;

    public function __construct(array $aggregate)
    {
        $this->aggregate = $aggregate;
    }
    public function first()
    {
        return $this->aggregate[0];
    }
    public function next()
    {
        $ret = null;
        $this->current++;
        if ($this->current < count($this->aggregate)) {
            $ret = $this->aggregate[$this->current];
        }
        return $ret;
    }
    public function isDone(): bool
    {
        return $this->current >= count($this->aggregate) ? true : false;
    }

    public function currentItem()
    {
        return $this->aggregate[$this->current];
    }
}

class ConcreteIteratorDesc extends IteratorMode
{
    //具体迭代器类（倒序）
    //定义一个具体聚集对象
    private array $aggregate;

    private int $current = 0;

    public function __construct(array $aggregate)
    {
        $this->aggregate = $aggregate;
        $this->current = count($this->aggregate) - 1;
    }
    public function first()
    {
        return $this->aggregate[count($this->aggregate) - 1];
    }
    public function next()
    {
        $ret = null;
        $this->current--;
        if ($this->current >= 0) {
            $ret = $this->aggregate[$this->current];
        }
        return $ret;
    }
    public function isDone(): bool
    {
        return $this->current < 0 ? true : false;
    }

    public function currentItem()
    {
        return $this->aggregate[$this->current];
    }
}

class ConcreteAggregate extends Aggregate
{
    //具体聚集类
    private array $list;
    public function createIterator()
    {
        return new ConcreteIterator($this->list);
    }

    //倒序遍历
    public function createIteratorDesc()
    {
        return new ConcreteIteratorDesc($this->list);
    }
    public function count(): int
    {
        return count($this->list);
    }
    public function setList(string $name)
    {
        $this->list[] = $name;
    }
}

//定义一个具体的聚集对象，公交车
$a = new ConcreteAggregate();
$a->setList("大鸟");
$a->setList("小菜");
$a->setList("行李");
$a->setList("张三");
$a->setList("老外");
$a->setList("内部员工");
$a->setList("小偷");
$a->setList("李四");
// $concreteIterator = $a->createIterator();
$concreteIterator = $a->createIteratorDesc();

while (!$concreteIterator->isDone()) {
    echo $concreteIterator->currentItem() . " 请买车票\n";
    $concreteIterator->next();
}
