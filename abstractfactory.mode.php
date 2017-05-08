<?php
/*
 *提供一个创建一系列相关或相互依赖对象的接口，而无须指定它们具体的类。抽象工厂模式又称为Kit模式，属于对象创建型模式 
 */

interface TV{
	public function open();
	public function watch();
}

class HaierTv implements TV{
	
	public function open(){
		echo "open haier TV";
	}
	
	public function watch(){
		
		echo "i am watching haier TV";
		
	}
}

interface PC{
	
	public function work();
	public function play();
}

class LenovoPc implements PC{
	
	public function work(){
		echo " i am working on a lenovo computer";
	}
	
	public function play(){
		echo "lenovo computer can be use playing games";
	}
}

abstract class Factory{
	abstract public static function createTV();
	abstract public static function createPC();
}

class productFactory extends Factory{
	
	public static function createTV(){
		return new HaierTv();
	}
	
	public static function createPC(){
		return new LenovoPc();
	}
}

$newPC = productFactory::createPC();
$newPC-> play();
$newPC-> work();

$newTV= productFactory::createTV();
$newTV -> open();
$newTV ->watch();