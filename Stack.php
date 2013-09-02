<?php

/**
 * Class Stack
 */
class Stack
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
	public function __construct ($limit = 10)
	{
		$this->stack = array();
		$this->limit = $limit;
	}

	/**
	 * @param mixed $item
	 *
	 * @return $this
	 *
	 * @throws RuntimeException
	 */
	public function push ($item)
	{
		if (sizeof($this->stack) < $this->limit)
		{
			array_push($this->stack, $item);
			return $this;
		}
		throw new OverflowException('Stack overflow!');
	}

	/**
	 * @return mixed
	 *
	 * @throws RuntimeException
	 */
	public function pop ()
	{
		if (!$this->isEmpty())
		{
			return array_pop($this->stack);
		}
		throw new UnderflowException('Stack is empty!');
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