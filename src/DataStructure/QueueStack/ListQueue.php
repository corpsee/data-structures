<?php

namespace DataStructure\QueueStack;

use DataStructure\LinkedList\DoubleLinkedList;

/**
 * Class ListQueue
 *
 * @package DataStructure\LinkedList
 */
class ListQueue
{
	/**
	 * @var array
	 */
	protected $queue;

	/**
	 * @var integer
	 */
	protected $limit;

	/**
	 * @param integer $limit
	 */
	public function __construct ($limit = NULL)
	{
		$this->queue = new DoubleLinkedList();
		$this->limit = $limit;
	}

	/**
	 * @param mixed $value
	 *
	 * @return $this
	 * @throws \OverflowException
	 */
	public function enqueue ($value)
	{
		if (!is_null($this->limit) && sizeof($this->queue) >= $this->limit)
		{
			throw new \OverflowException('Queue overflow!');
		}
		$this->queue->insertLast($value);
		return $this;
	}

	/**
	 * @return mixed
	 *
	 * @throws \UnderflowException
	 */
	public function dequeue ()
	{
		try
		{
			return $this->queue->extractFirst();
		}
		catch (\UnderflowException $e)
		{
			throw new \UnderflowException('Queue is empty!');
		}
	}

	/**
	 * @return mixed
	 *
	 * @throws \UnderflowException
	 */
	public function bottom ()
	{
		try
		{
			return $this->queue->showFirst();
		}
		catch (\UnderflowException $e)
		{
			throw new \UnderflowException('Queue is empty!');
		}
	}

	/**
	 * @return boolean
	 */
	public function isEmpty ()
	{
		return $this->queue->isEmpty();
	}
}