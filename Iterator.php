<?php
/**
 * Created by PhpStorm.
 * User: denverb
 * Date: 18/3/13
 * Time: 下午10:37
 */

class Sample implements Iterator
{
	private $_item;

	public function __construct(&$data)
	{
		$this->_item = $data;
	}

	public function current()
	{
		return current($this->_item);
	}

	public function next()
	{
		next($this->_item);
	}

	public function key()
	{
		return key($this->_item);
	}

	public function rewind()
	{
		reset($this->_item);
	}

	public function valid()
	{
		return ($this->current() !== false);
	}
}

//client

$data = [1, 2, 3, 4, 5];
$sample = new Sample($data);
foreach ($sample as $key => $value) {
	echo $key.' '.$value.'<br/>';
}