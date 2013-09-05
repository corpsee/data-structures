<?php

namespace DataStructure\Lists;

/**
 * Class SingleNode
 *
 * @package DataStructure\List
 */
class SingleNode
{
	/**
	 * @var mixed
	 */
	public $value;

	/**
	 * @var SingleNode
	 */
	public $next = NULL;

	/**
	 * @param mixed $value
	 */
	public function __construct($value)
	{
		$this->value = $value;
	}
}