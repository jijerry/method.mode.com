<?php
/*
 * 适配器模式
 * 适配器模式（英语：adapter pattern）有时候也称包装样式或者包装(wrapper)。将一个类的接口转接成用户所期待的。一个适配使得因接口不兼容而不能在一起工作的类工作在一起，做法是将类自己的接口包裹在一个已存在的类中
 * 将目标类和适配者类解耦，通过引入一个适配器类来重用现有的适配者类，而无须修改原有代码。增加了类的透明性和复用性，将具体的实现封装在适配者类中，对于客户端类来说是透明的，而且提高了适配者的复用性
*/

class Adaptee{
	
	public function realRequest(){
		
		echo "这是被适配者真正调用的方法";
	}
}

interface Target{
	
	public function request();
}

class Adapter implements Target{
	
	protected $adaptee;
	function __construct(Adaptee $adaptee){
		
		$this->adaptee = $adaptee;
	}
	
	public function request(){
		echo "适配者转换";
		$this->adaptee->realRequest();
	}
}

$adaptee = new Adaptee();
$target = new Adapter($adaptee);
$target ->request();