<?php

namespace DataStructure\QueueStack;

/**
 * Class ArrayQueue
 *
 * @package DataStructure\LinkedList
 */
class ArrayQueue
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
		$this->queue = array();
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
		array_push($this->queue, $value);
		return $this;
	}

	/**
	 * @return mixed
	 *
	 * @throws \UnderflowException
	 */
	public function dequeue ()
	{
		if (!$this->isEmpty())
		{
			return array_shift($this->queue);
		}
		throw new \UnderflowException('Queue is empty!');
	}

	/**
	 * @return mixed
	 *
	 * @throws \UnderflowException
	 */
	public function bottom ()
	{
		if (!$this->isEmpty())
		{
			return $this->queue[0];
		}
		throw new \UnderflowException('Queue is empty!');
	}

	/**
	 * @return boolean
	 */
	public function isEmpty ()
	{
		return empty($this->queue);
	}
}