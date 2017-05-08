<?php
/*
 * 建造者模式
 * Builder：抽象构造者类，为创建一个Product对象的各个部件指定抽象接口ConcreteBuilder：
 * 具体构造者类，实现Builder的接口以构造和装配该产品的各个部件。定义并明确它所创建的表示。提供一个检索产品的接口
 * Director：指挥者，构造一个使用Builder接口的对象。
 * Product：表示被构造的复杂对象。ConcreateBuilder创建该产品的内部表示并定义它的装配过程，包含定义组成部件的类，包括将这些部件装配成最终产品的接口。
*/

abstract class Builder{
	protected $car;
	abstract public function buildPartA();
	abstract public function buildPartB();
	abstract public function buildPartC();
	abstract public function getResult();
}

class CarBuilder extends Builder{
	
	function __construct(){
		$this->car = new Car();
	}
	
	public function buildPartA(){
		$this->car->setPartA("发动机");
	}
	
	public function buildPartB(){
		$this->car->setPartB("轮子");
	}
	
	public function buildPartC(){
		$this->car->setPartC("其他部件");
	}
	public function getResult(){
		
		return $this->car();
	}
	
}


class Car{
	protected $partA;
	protected $partB;
	protected $partC;
	
	public function setPartA($str){
		$this->partA = $str;
		
	}
	
	public function setPartB($str){
		$this->partB = $str;
	}
	
	public function setPartC($str){
		$this->partC = $str;
	}
	
	public function show(){
		
		echo "这辆车由：".$this->partA.','.$this->partB.',和'.$this->partC.'组成';
		
	}
}

class Director{
	public $mybuilder;
	
	public function startbuilder(){
		
		$this->mybuilder->buildPartA();
		$this->mybuilder->buildPartB();
		$this->mybuilder->buildPartC();
		return $this->mybuilder->getResult();
	}
	public function setBuilder(Builder $builder)
	{
		$this->myBuilder = $builder;
	}
}

$carBulider = new CarBuilder();
$director = new Director();
$director->setBuilder($carBulider);
$newCar = $director->startBuild();
$newCar->show();



