<?php

namespace DataStructure\LinkedList;

/**
 * Class SingleNode
 *
 * @package DataStructure\LinkedList
 */
class SingleNode
{
	/**
	 * @var mixed
	 */
	protected $value;

	/**
	 * @var SingleNode
	 */
	protected $next = NULL;

	/**
	 * @param mixed $value
	 */
	public function __construct($value)
	{
		$this->setValue($value);
	}

	/**
	 * @return mixed
	 */
	public function getValue ()
	{
		return $this->value;
	}

	/**
	 * @param $value
	 */
	public function setValue ($value)
	{
		$this->value = $value;
	}

	/**
	 * @return SingleNode
	 */
	public function getNext ()
	{
		return $this->next;
	}

	/**
	 * @param SingleNode $node
	 */
	public function setNext (SingleNode $node)
	{
		$this->next = $node;
	}

	public function removeNext ()
	{
		$this->next = NULL;
	}
}