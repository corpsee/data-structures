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
	protected $value;

	/**
	 * @var BinaryNode
	 */
	protected $left = NULL;

	/**
	 * @var BinaryNode
	 */
	protected $right = NULL;

	/**
	 * @param mixed $value
	 */
	public function __construct ($value)
	{
		$this->setValue($value);
	}

	/**
	 * @param mixed $value
	 */
	public function setValue ($value)
	{
		$this->value = $value;
	}

	/**
	 * @return mixed
	 */
	public function getValue ()
	{
		return $this->value;
	}

	/**
	 * @param BinaryNode $node
	 */
	public function setLeft (BinaryNode &$node)
	{
		$this->left = $node;
	}

	/**
	 * @return BinaryNode
	 */
	public function &getLeft ()
	{
		return $this->left;
	}

	/**
	 * @param BinaryNode $node
	 */
	public function setRight (BinaryNode &$node)
	{
		$this->right = $node;
	}

	/**
	 * @return BinaryNode
	 */
	public function &getRight ()
	{
		return $this->right;
	}
}