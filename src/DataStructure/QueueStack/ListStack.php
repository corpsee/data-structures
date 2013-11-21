<?php

namespace DataStructure\QueueStack;

use DataStructure\LinkedList\DoubleLinkedList;

/**
 * Class ArrayStack
 *
 * @package DataStructure\LinkedList
 */
class ListStack
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
		$this->stack = new DoubleLinkedList();
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
		$this->stack->insertLast($value);
		return $this;
	}

	/**
	 * @return mixed
	 *
	 * @throws \UnderflowException
	 */
	public function pop ()
	{
		try
		{
			return $this->stack->extractLast();
		}
		catch (\UnderflowException $e)
		{
			throw new \UnderflowException('Stack is empty!');
		}
	}

	/**
	 * @return mixed
	 *
	 * @throws \UnderflowException
	 */
	public function top ()
	{
		try
		{
			return $this->stack->showLast();
		}
		catch (\UnderflowException $e)
		{
			throw new \UnderflowException('Stack is empty!');
		}
	}

	/**
	 * @return boolean
	 */
	public function isEmpty ()
	{
		return $this->stack->isEmpty();
	}
}