<?php
/*
 * 桥接模式
 * 它把事物对象和其具体行为、具体特征分离开来，使它们可以各自独立的变化。事物对象仅是一个抽象的概念。如“圆形”、“三角形”归于抽象的“形状”之下，而“画圆”、“画三角”归于实现行为的“画图”类之下，然后由“形状”调用“画图”
 * 重点需要理解如何将抽象化(Abstraction)与实现化(Implementation)脱耦，使得二者可以独立地变化。桥接模式提高了系统的可扩充性，在两个变化维度中任意扩展一个维度，都不需要修改原有系统
*/

interface DrawingAPI{
	public function drawCircle($x,$y,$redis){
		
	}
}

class DrawingAPI1 implements DrawingAPI{
	
	public function drawCircle($x,$y,$reids){
		
		echo "API1.circle at (".$x.','.$y.') radius '.$radius.'<br>';
	}
}

class DrawingAPI2 implements DrawingAPI{
	
	public function drawCircle($x,$y,$reids){
		
		echo "API2.circle at (".$x.','.$y.') radius '.$radius.'<br>';
	}
}

interface Shape{
	
	public function draw();
	public function resize($redis);
}

class CircleShape implements Shape{
	
	private $x;
	private $y;
	private $redis;
	private $drawingAPI;
	
	function __construct($x,$y,$redis,DrawingAPI $drawingAPI){
		
		$this->x = $x;
		$this->y = $y;
		$this->redis = $redis;
		$this->drawingAPI = $drawingAPI;
	}
	
	public function draw(){
		
		$this->drawingAPI = drawCircle($this->x,$this->y,$this->redis);
	}
	
	public function resize($redis){
		
		$this->redis = $redis;
	}
}

$shape1 = new CircleShape(1,2,4,new DrawingAPI1());
$shape2 = new CircleShape(1,2,4,new DrawingAPI2());
$shape1->draw();
$shape2->draw();
$shape1->resize(10);
$shape1->draw();