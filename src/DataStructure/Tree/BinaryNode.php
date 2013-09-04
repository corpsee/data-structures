<?php

namespace DataStructure\Tree;

/**
 * Class BinaryNode
 *
 * @package DataStructure\Tree
 */
class BinaryNode
{
	/**
	 * @var mixed
	 */
	public $value;

	/**
	 * @var BinaryNode
	 */
	public $left = NULL;

	/**
	 * @var BinaryNode
	 */
	public $right = NULL;

	/**
	 * @param mixed $value
	 */
	public function __construct ($value)
	{
		$this->value = $value;
	}
}