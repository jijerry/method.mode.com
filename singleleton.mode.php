<?php
/*
 * 单例模式
 * 
 * 一个类能返回对象一个引用(永远是同一个)和一个获得该实例的方法（必须是静态方法，通常使用getInstance这个名称）；当我们调用这个方法时，如果类持有的引用不为空就返回这个引用，
 * 如果类保持的引用为空就创建该类的实例并将实例的引用赋予该类保持的引用；同时我们还将该类的构造函数定义为私有方法，这样其他处的代码就无法通过调用该类的构造函数来实例化该类的对象，只有通过该类提供的静态方法来得到该类的唯一实例
 * 单例模式的要点有：某个类只能有一个实例；它必须自行创建本身的实例；它必须自行向整个系统提供这个实例。单例模式是一种对象创建型模式。
*/

class Singleton{
	
	private static $instance;
	
	//私有构造方法，禁止使用new创建对象
	private function __construct(){
		
	}
	
	public static function getInstance(){
		if (!isset(self::$instance)){
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	//克隆方式设置私有，禁止克隆对象
	private function __clone(){
		
	}
	
	public function say(){
		echo "这是用单例模式创建对象";
	}
	
	public function operation(){
		echo "这里添加其他操作";
	}
	
}

$single = Singleton::getInstance();
$single->say();
$single->operation();

