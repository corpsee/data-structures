<?php

/**
 * Class Queue
 */
class Queue
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
	public function __construct ($limit = 10)
	{
		$this->queue = array();
		$this->limit = $limit;
	}

	/**
	 * @param mixed $item
	 *
	 * @return $this
	 *
	 * @throws RuntimeException
	 */
	public function enqueue ($item)
	{
		if (sizeof($this->queue) < $this->limit)
		{
			array_push($this->queue, $item);
			return $this;
		}
		throw new OverflowException('Queue overflow!');
	}

	/**
	 * @return mixed
	 *
	 * @throws RuntimeException
	 */
	public function dequeue ()
	{
		if (!$this->isEmpty())
		{
			return array_shift($this->queue);
		}
		throw new UnderflowException('Queue is empty!');
	}

	/**
	 * @return mixed
	 */
	public function bottom ()
	{
		return end($this->queue);
	}

	/**
	 * @return boolean
	 */
	public function isEmpty ()
	{
		return empty($this->queue);
	}
}