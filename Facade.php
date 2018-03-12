<?php


/**
 * Created by PhpStorm.
 * User: denverb
 * Date: 18/3/12
 * Time: 下午8:28
 */
/*
 * 门面模式为子系统中的一组接口提供一个一致的界面,Facade模式定义了一个高层次的接口,使得子系统更加容易使用。
 * 主要角色:
 * 		门面:此角色将被客户端调用,直到哪些子系统负责处理请求,将用户的请求指派给适当的子系统。
 * 		子系统:实现子系统的功能,处理由Facade对象指派的任务,没有Facade的相关信息,可以被客户端直接调用。可以同时有一个或者多个子系统,
 * 	  每个子系统都不是单独的类,而是一个类的集合。
 * */


class Camera
{
	public function turnOn() {}
	public function turnOff() {}
	public function rotate() {}
}

class Light
{
	public function turnOn() {}
	public function turnOff() {}
	public function change() {}
}

class Sensor
{
	public function activate() {}
	public function deactivate() {}
	public function trigger() {}
}

class Alarm
{
	public function activate() {}
	public function deactivate() {}
	public function ring() {}
	public function stopRing() {}
}

//门面类
class SecurityFacade
{
	private $_camera1, $_camera2;
	private $_light1, $_light2;
	private $_sensor;
	private $_alarm;

	public function __construct()
	{
		$this->_camera1 = new Camera();
		$this->_camera2 = new Camera();

		$this->_light1 = new Light();
		$this->_light2 = new Light();

		$this->_sensor = new Sensor();
		$this->_alarm = new Alarm();
	}

	public function activate()
	{
		$this->_camera1->turnOn();
		$this->_camera2->turnOn();

		$this->_light1->turnOn();
		$this->_light2->turnOn();

		$this->_sensor->activate();
		$this->_alarm->activate();
	}

	public function deactivate()
	{
		$this->_camera1->turnOff();
		$this->_camera2->turnOff();

		$this->_light1->turnOff();
		$this->_light2->turnOff();

		$this->_sensor->deactivate();
		$this->_alarm->deactivate();
	}

}