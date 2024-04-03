用 PHP 实现《大话设计模式》中的设计模式

### [简单工厂模式（Simple Factory）]（https://github.com/0328kevin/design-patterns/blob/master/codes/SimpleFactory.php）

聚合关系：聚合表示一种弱的拥有关系，体现的是 A 对象可以包含 B 对象，但 B 对象不是 A 对象的一部分。（雁群和大雁）

聚合关系用**空心菱形 + 实心箭头**表示

合成关系：合成（组合）是一种强的拥有关系，体现了严格的部分和整体的关系，部分和整体的生命周期一样。（鸟和其翅膀）

合成关系用**实心菱形 + 实心箭头**表示



### 策略模式（Strategy）

它定义了算法家族，分别封装起来，让它们之间可以互相替换，此模式可以让算法的变化，不会影响到使用算法的客户。

策略模式是一种定义了一系列算法的方法，从概念上看，所有的这些算法都是完成的相同的工作，只是实现不同，

**它可以以相同的方式调用所有的方法，减少了各种算法类与使用算法类之间的耦合。**



### 单一职责原则

就一个类而言，应该仅有一个引起它变化的原因。

软件设计真正要做的许多内容，就是发现职责并把这些职责相互分离。

如果你能够想到多于一个的动机去改变一个类，那么这个类就具有多于一个的职责。



### 开放-封闭原则

是说软件实体（类、模块、函数等）应该可以扩展，但是不可修改。

绝对的对修改关闭是不可能的。无论模块是多么的”封闭“，都会存在一些无法对之封闭的变化。

既然不可能完全封闭，设计人员必须对于他设计的模块应该对哪些变化封闭做出选择。

他必须先猜测出最有可能发生的变化种类，然后构造抽象来隔离这些变化。

面对需求，对程序的改动是通过增加新代码进行的，而不是更改现有的代码。



### 依赖倒置原则

针对接口编程，不要对实现编程。

A：高层模块不应该依赖底层模块，两个都应该依赖抽象。

​	访问数据库的代码做成函数，每次新项目都会调用这些函数，这叫高层模块依赖底层模块。

B：抽象不应该依赖细节，细节应该依赖抽象。



### 里氏替换原则

子类型必须能够替换掉它们的父类。

由于子类的可替换性才使得使用父类类型的模块在无需修改的情况下就可以扩展。



### 装饰模式（Decorator）

**动态地**给一个对象添加一些额外的职责，就增加功能来说，装饰模式比生成子类更加灵活。

装饰模式的优点：把类中的装饰功能从类中搬移去除，这样可以简化原有的类。

有效地把类中的核心职责和装饰功能区分开了，而且可以去除相关类中重复的装饰逻辑。



### 代理模式（Proxy）

为其它对象提供一种代理以控制对这个对象的访问。



### 工厂方法模式（Factory Method）

定义一个用于创建对象的接口，让子类决定实例化哪个类。工厂方法使一个类的**实例化延迟**到其子类。

工厂方法克服了简单工厂违背开放-封闭原则的缺点，又保持了封装对象创建过程的优点。

他们都是集中封装了对象的创建，使得要更换对象时，不需要做大的改动就可实现，降低了客户程序和产品对象的耦合。



### 原型模式（prototype）

用原型实例指定创建对象的种类，并且通过拷贝这些原型创建新的对象。

一般在初始化的信息不发生变化的情况下，克隆是最好的办法。这既隐藏了对象创建的细节，又对性能是大大的提高。



### 模版方法模式（templateMethod）

定义一个操作中的算法的骨架，而将一些步骤延迟到子类中。模版方法使得子类可以不改变一个算法的结构即可重定义该算法的某些特定

步骤。

AbstractClass 是抽象类，其实也就是一个抽象模板，定义并实现了一个模板方法。这个模板方法一般是一个具体方法，它给出了一个顶

级逻辑的骨架，而逻辑的组成步骤在响应的抽象操作中，推迟到子类实现。

ConcreteClass ，实现父类所定义的一个或多个抽象方法。每个 AbstractClass 都可以有多个 ConcreteClass 与之对应，而每个 

ConcreteClass 都可以给出这些抽象方法（也就是顶级逻辑的组成步骤）的不同实现，从而使得顶级逻辑的实现各不相同。

当不变的和可变的行为在方法的子类实现中混合在一起的时候，不变的行为就会在子类中重复出现。我们通过模板方法模式把这些行为搬

移到单一的地方，这样就帮助子类摆脱重复的不变行为的纠缠。



### 迪米特法则，最少知识原则（LoD）

如果两个类不必彼此直接通信，那么这两个类就不应当发生直接的相互作用。如果其中一个类要调用另一个类的某一个方法的话，可以通过第三者转发这个调用。

迪米特法则首先强调的前提是在类的结构设计上，每一个类都应当降低成员的访问权限。

迪米特法则的根本思想，是强调了类之间的松耦合。

类之间的耦合越弱，越有利于复用，一个处于弱耦合的类被修改，不会对有关系的类造成波及。



### 外观模式（Facade）

为子系统中的一组接口提供一个一致的界面，此模式定义了一个高层接口，这个接口使得这一子系统更加容易使用。

首先，在设计初期阶段，应该要有意识的将不同的两个层分离，层与层之间建立外观 Facade 。

其次，在开发阶段，子系统往往因为不断地重构演化而变得越来越复杂，增加外观 Facade 可以提供一个简单的接口，减少它们之间的依赖。

第三，在维护一个遗留的大型系统时，可能这个系统已经非常难以维护和扩展了，可以为新系统开发一个外观 Facade ，来提供设计粗糙

或高度复杂的遗留代码的比较清晰简单的接口，让新系统与 Facade 对象交互，Facade 与遗留代码交互所有复杂的工作。



### 建造者模式（Builder）

将一个复杂对象的构建与它的表示分离，使得同样的构建过程可以创建不同的表示。

Builder 是为创建一个 Product 对象的各个部件指定的抽象接口

ConcreteBuilder 具体建造者，实现 Builder 接口，构造和装配各个部件

Product 具体产品

Director 指挥者，是构建一个使用 Builder 接口的对象

建造者模式是在当创建复杂对象的算法应该独立于该对象的组成部分以及它们的装配方法时适用的模式。



### 观察者模式（observer）

观察者模式又叫**发布-订阅**模式

Observer 类，抽象观察者，为所有的具体观察者定义一个接口，在得到主题的通知时更新自己。抽象观察者一般用一个抽象类或一个接口实现。更新接口通常包含一个 update() 方法，这个方法一般叫更新方法。

ConcreteObserver 类，具体观察者，实现抽象观察者角色所要求的更新接口，以便使本身的状态与主题的状态相协调。

Subject 类，抽象通知者，一般用一个抽象类或一个接口实现。它把所有对观察者对象的引用都保存在一个聚集（数组）里，每个主题都可以有任意数量的观察者。抽象主题提供了一个接口，可以增加和删除观察者对象。

ConcreteSubject，具体通知者，将有关状态存入具体观察者对象。在具体主题的内部状态改变时，给所有登记过的观察者**发出通知**。



### 抽象工厂模式（Abstract Factory）

提供一个创建一系列相关或相互依赖对象的接口，而无需指定它们具体的类。

AbstractFactory：抽象工厂接口，它里面应该包含所有的产品创建的抽象方法。

ConcreteFactory 1，ConcreteFactory 2：具体的工厂，创建具有特定实现的产品对象。

AbstractProductA，AbstractProductB：抽象产品，它们都有可能有两种不同的实现

ProductA 1，ProductA 2，ProductB 1，ProductB 2：对两个抽象产品的具体分类的实现



### 状态模式（State）

当一个对象的内在状态改变时允许改变其行为，这个对象看起来像是改变了其类。

state 类：抽象状态类，定义一个接口以封装与 context 的一个特定状态相关的行为。

ConcreteState 类：具体状态类，每一个子类实现一个与 context 的一个状态相关的行为。

Context 类：维护一个 ConcreteState 子类的实例，这个实例定义当前状态。



### 适配器模式（Adapter）

将一个类的接口转换成客户希望的另外一个接口。

Adapter 模式使得原本由于接口不兼容而不能一起工作的那些类可以一起工作。

系统的数据和行为都正确，但接口不符时，我们应该考虑用适配器，目的是使控制范围之外的一个原有对象与某个接口匹配。

适配器模式主要应用于希望复用一些现存的类，但是接口又与复用环境要求不一致的情况。



### 备忘录模式（Momento）

在不破坏封装性的前提下，捕获一个对象的内部状态，并在该对象之外保存这个状态。这样以后就可将该对象恢复到原先保存的状态。

Originator（发起人）：负责创建一个备忘录 Momento ，用以记录当前时刻它的内部状态，并可使用备忘录**恢复内部状态**。

Originator 可根据需要决定 Momento 存储 Originator 的哪些内部状态。

Momento（备忘录）：负责存储 Originator 对象的内部状态，并可防止 Originator 以外的其他对象访问备忘录 Momento 。

备忘录有两个接口， Caretaker 只能看到备忘录的窄接口，它只能将备忘录传递给其他对象。

Originator 能看到一个宽接口，允许它访问返回到先前状态的所有数据。

Caretaker（管理者）：负责保存好备忘录 Momento ，不能对备忘录的内容进行操作和检查。
