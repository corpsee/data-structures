<?php

namespace DataStructure\LinkedList;

/**
 * Class DoubleLinkedNode
 *
 * @package DataStructure\LinkedList
 */
class DoubleLinkedNode extends SingleLinkedNode
{
	/**
	 * @var DoubleLinkedNode
	 */
	public $preview = NULL;

	public function __clone ()
	{
		parent::__clone();

		$this->preview = !is_null($this->preview) ? clone $this->preview : NULL;
	}
}