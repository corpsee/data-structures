<?php

namespace DataStructures\QueueStack;

/**
 * Class ArrayStack
 *
 * @package DataStructures\LinkedList
 */
class ArrayStack
{
	/**
	 * @var array
	 */
	protected $stack;

	/**
	 * @var integer
	 */
	protected $limit;

	/**
	 * @param integer $limit
	 */
	public function __construct ($limit = NULL)
	{
		$this->stack = array();
		$this->limit = $limit;
	}

	/**
	 * @param mixed $value
	 *
	 * @return $this
	 * @throws \OverflowException
	 */
	public function push ($value)
	{
		if (!is_null($this->limit) && sizeof($this->stack) >= $this->limit)
		{
			throw new \OverflowException('Stack overflow!');
		}
		array_push($this->stack, $value);
		return $this;
	}

	/**
	 * @return mixed
	 *
	 * @throws \UnderflowException
	 */
	public function pop ()
	{
		if (!$this->isEmpty())
		{
			return array_pop($this->stack);
		}
		throw new \UnderflowException('Stack is empty!');
	}

	/**
	 * @return mixed
	 */
	public function top ()
	{
		return end($this->stack);
	}

	/**
	 * @return boolean
	 */
	public function isEmpty ()
	{
		return empty($this->stack);
	}
}