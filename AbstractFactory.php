<?php
/**
 * Created by PhpStorm.
 * User: denverb
 * Date: 18/3/13
 * Time: 下午9:24
 */

/*
 * 抽象工厂模式提供了一种方式,可以将一组具有同一主题的单独工厂封装起来。它提供接口,建立一系列相关或者独立的对象,而不是指定这些对象的具体类。
 * 主要角色:
 * 		抽象工厂:声明创建抽象产品对象的接口
 * 		具体工厂:实现创建产品对象的操作
 * 		抽象产品:声明一类产品的接口
 * 		具体产品:实现抽象产品定义的接口
 * */

interface Screen
{
	public function build();
}

class Screen8 implements Screen
{
	public function build()
	{
		echo "iphone 8 screen";
	}
}

class ScreenX implements Screen
{
	public function build()
	{
		echo "iphone X screen";
	}
}

interface Shell
{
	public function build();
}

class Shell8 implements Shell
{
	public function build()
	{
		echo "iphone 8 shell";
	}
}

class ShellX implements Shell
{
	public function build()
	{
		echo "iphone X shell";
	}
}

interface Phone
{
	public function getScreen();
	public function getShell();
}

class Phone8Factory implements Phone
{
	public function getScreen()
	{
		return new Screen8();
	}

	public function getShell()
	{
		return new Shell8();
	}
}

class PhoneXFactory implements Phone
{
	public function  getScreen()
	{
		return new ScreenX();
	}

	public function getShell()
	{
		return new ShellX();
	}
}


//client

$factory = new PhoneXFactory();
$screen = $factory->getScreen();
$shell = $factory->getShell();
$screen->build();
$shell->build();