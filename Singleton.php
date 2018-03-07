<?php
/**
 * Created by PhpStorm.
 * User: denverb
 * Date: 18/3/7
 * Time: 下午10:43
 */
/*
 * 单例模式
 * 实现单例模式的思路是：一个类能返回对象一个引用(永远是同一个)和一个获得该实例的方法（必须是静态方法，通常使用getInstance这个名称）；
 * 当我们调用这个方法时，如果类持有的引用不为空就返回这个引用，如果类保持的引用为空就创建该类的实例并将实例的引用赋予该类保持的引用；
 * 同时我们还将该类的构造函数定义为私有方法，这样其他处的代码就无法通过调用该类的构造函数来实例化该类的对象，
 * 只有通过该类提供的静态方法来得到该类的唯一实例。
 * */
class Singleton
{
	private static $_instance = null;
	//私有化构造方法
	private function __construct(){}

	//访问唯一实例
	public static function getInstance()
	{
		if (empty(self::$_instance)) {
			self::$_instance = new Singleton();
		}
		return self::$_instance;
	}

	//禁止克隆
	public function __clone()
	{
		die('no clone');
	}
}