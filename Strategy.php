<?php
/**
 * Created by PhpStorm.
 * User: denverb
 * Date: 18/3/13
 * Time: 下午9:59
 */

/*
 * 策略模式定义了一些列算法,并将他们封装起来,并且使他们可以相互替换。策略模式可以使算法独立于使用它的客户而变化。
 * 主要角色:
 * 		抽象策略:定义所有支持的算法的公共接口。通常以接口或者抽象类实现。环境角色调用此接口来调用具体策略角色定义的算法
 * 		具体策略角色:实现抽象策略接口实现具体算法
 * 		环境角色:持有一个抽象策略的引用,用一个具体环境策略角色来配置
 * */

interface Strategy
{
	public function algorithmInterface();
}

class ConcreteStrategyA implements Strategy
{
	public function algorithmInterface()
	{
		// TODO: Implement algorithmInterface() method.
	}
}

class ConcreteStrategyB implements Strategy
{
	public function algorithmInterface()
	{
		// TODO: Implement algorithmInterface() method.
	}
}

class ConcreteStrategyC implements Strategy
{
	public function algorithmInterface()
	{
		// TODO: Implement algorithmInterface() method.
	}
}

class Context
{
	private $_strategy;

	public function __construct(Strategy $strategy)
	{
		$this->_strategy = $strategy;
	}

	public function contextInterface()
	{
		$this->_strategy->algorithmInterface();
	}
}

//client

$strategyA = new ConcreteStrategyA();
$context = new Context($strategyA);
$context->contextInterface();