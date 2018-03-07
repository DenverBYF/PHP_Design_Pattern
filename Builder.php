<?php
/**
 * Created by PhpStorm.
 * User: denverb
 * Date: 18/3/7
 * Time: 下午10:15
 */
/*
 * 建造者模式是一种创建型模式，它可以让一个产品的内部表象和和产品的生产过程分离开，从而可以生成具有不同内部表象的产品。
 * 主要角色:
 * 		1.抽象建造者(Builder)角色：定义抽象接口，规范产品各个部分的建造，必须包括建造方法和返回方法。
 * 		2.具体建造者(Concrete)角色：实现抽象建造者接口。应用程序最终根据此角色中实现的业务逻辑创造产品。
 * 		3.导演者(Director)角色：调用具体的建造者角色创造产品。
 * 		4.产品(Product)角色：在导演者的指导下所创建的复杂对象。
 * */
//产品本身
class Product
{
	private $_parts;
	public function  __construct()
	{
		$this->_parts = [];
	}
	public function add($part)
	{
		$this->_parts[] = $part;
	}
}

//建造者抽象类
abstract class Builder
{
	public function buildPart1(){}
	public function buildPart2(){}
	public function getResult(){}
}

//具体建造者
class ConcreteBuilder extends Builder
{
	private $_product;
	public function __construct()
	{
		$this->_product = new Product();
	}
	public function buildPart1()
	{
		$this->_product->add("part1");
	}
	public function buildPart2()
	{
		$this->_product->add("part2");
	}
	public function getResult()
	{
		return $this->_product;
	}
}

//导演者
class Director
{
	public function __construct(Builder $builder)
	{
		$builder->buildPart1();
		$builder->buildPart2();
	}
}

$builder = new ConcreteBuilder();
$director = new Director($builder);
$product = $builder->getResult();
