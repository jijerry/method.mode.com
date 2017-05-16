<?php
/*
 * 装饰器模式
 * 关联机制，即将一个类的对象嵌入另一个对象中，由另一个对象来决定是否调用嵌入对象的行为以便扩展自己的行为，我们称这个嵌入的对象为装饰器(Decorator)
 * 原理是：增加一个修饰类包裹原来的类，包裹的方式一般是通过在将原来的对象作为修饰类的构造函数的参数。装饰类实现新的功能，但是，在不需要用到新功能的地方，它可以直接调用原来的类中的方法。修饰类必须和原来的类有相同的接口
 * 修饰模式是类继承的另外一种选择。类继承在编译时候增加行为，而装饰模式是在运行时增加行为
*/

abstract class Conmponent{
	abstract public function operation();
}

class MyComponent extends Conmponent{
	
	public function operation(){
		echo "这是正常的组件方法";
	}
	
}

abstract class Decorator extends Conmponent{
	
	protected $component;
	
	function __construct(Conmponent $component){
		
		$this->component = $component;
	}
	public function operation(){
		$this->component->operation();
	}
}

class MyDecorator extends Decorator{
	
	function __construct(Conmponent $component){
		parent::__construct($component);
	}
	
	public function addMethod(){
		
		echo "这是装饰器方法";
	}
	
	public function operation(){
		
		$this->addMethod();
		parent::operation();
	}
}

$component = new MyComponent();
$da = new MyDecorator($component);
$da->operation();