<?php
/**
 * Created by PhpStorm.
 * User: denverb
 * Date: 18/3/12
 * Time: 下午9:55
 */

/*
 * 观察者模定义对象间的一种一对多的依赖关系,当一个对象的状态发生改变时,所有依赖于它的对象都会得到通知并自动更新。
 * 主要角色:
 * 		抽象主题角色:主题角色将所有观察者对象的引用保存在一个集合中,每个主题可以有任意多个观察者。提供添加和删除观察者对象的接口。
 * 		抽象观察者角色:为所有的具体观察者定义一个接口,在观察的主题发生改变时更新自己。
 * 		具体主题角色:储存相关状态到具体观察者对象,当具体主题的内部状态发生变化时,给所有登记过的观察者发出通知。
 * 		具体观察者角色:储存一个具体主题对象,储存相关状态,实现抽象观察者角色所需要的更新接口,使得其自身状态和主题状态保持一致。
 * */

//抽象主题
interface Subject
{
	public function attach(Observer $observer);
	public function detach(Observer $observer);
	public function notifyObserver();
}

//抽象观察者
interface Observer
{
	public function update();//更新方法
}

//具体主题
class ConcreteSubject implements Subject
{
	private $_observers;
	public function __construct()
	{
		$this->_observers = [];
	}

	public function attach(Observer $observer)
	{
		return array_push($this->_observers, $observer);
	}

	public function detach(Observer $observer)
	{
		$index = array_search($observer, $this->_observers);
		if ($index === false || !array_key_exists($index, $this->_observers)) {
			return false;
		}
		unset($this->_observers[$index]);
		return true;
	}

	public function notifyObserver()
	{
		if (!is_array($this->_observers)) {
			return false;
		}
		foreach ($this->_observers as $observer) {
			$observer->update();
		}
		return true;
	}
}

//具体观察者
class ConcreteObserver implements Observer
{
	private $_name;
	public function __construct($name)
	{
		$this->_name = $name;
	}

	public function update()
	{
		// TODO: Implement update() method.
	}
}

$subject  = new ConcreteSubject();

//添加第一个观察者
$observer1 = new ConcreteObserver('first');
$subject->attach($observer1);
$subject->notifyObserver();

//添加第二个观察者
$observer2 = new ConcreteObserver('second');
$subject->attach($observer2);
$subject->notifyObserver();

//删除一个观察者
$subject->detach($observer1);
$subject->notifyObserver();