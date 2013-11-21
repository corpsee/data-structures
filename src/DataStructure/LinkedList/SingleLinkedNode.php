<?php

namespace DataStructure\LinkedList;

/**
 * Class SingleLinkedNode
 *
 * @package DataStructure\LinkedList
 */
class SingleLinkedNode
{
	/**
	 * @var mixed
	 */
	public $value;

	/**
	 * @var SingleLinkedNode
	 */
	public $next = NULL;

	/**
	 * @param mixed $value
	 */
	public function __construct ($value)
	{
		$this->value = $value;
	}

	public function __clone ()
	{
		$this->next = !is_null($this->next) ? clone $this->next : NULL;
	}
}