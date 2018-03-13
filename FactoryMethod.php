<?php
/**
 * Created by PhpStorm.
 * User: denverb
 * Date: 18/3/13
 * Time: 下午8:41
 */

/*
 * 工厂方法模式使用"工厂"的概念来完成对象的创建而不是具体说明这个对象。
 * 主要角色:
 * 		抽象产品:具体对象产品共有的父类或者接口
 * 		具体产品:实现抽象产品定义的接口
 * 		抽象工厂:声明工厂方法,返回工厂对象
 * 		具体工厂:实现抽象工厂接口
 * */

class Phone
{
	public function name()
	{
		echo "phone";
	}
}

class ApplePhone extends Phone
{
	public function name()
	{
		echo "apple";
	}
}

class VivoPhone extends Phone
{
	public function name()
	{
		echo "vivo";
	}
}

interface PhoneFactory
{
	public function createPhone($name);
}

class MyPhoneFactory implements PhoneFactory
{
	public function createPhone($name)
	{
		switch ($name)
		{
			case 'Vivo' :
				return new VivoPhone();
			case 'Apple' :
				return new ApplePhone();
		}
	}
}