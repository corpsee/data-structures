<?php

namespace DataStructure\LinkedList\SingleLinkedList;

/**
 * Class SingleLinkedNode
 *
 * @package DataStructure\LinkedList
 */
class Node
{
	/**
	 * @var mixed
	 */
	public $value;

	/**
	 * @var Node
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