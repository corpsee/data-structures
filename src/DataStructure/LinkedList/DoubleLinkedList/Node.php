<?php

namespace DataStructure\LinkedList\DoubleLinkedList;

use DataStructure\LinkedList\SingleLinkedList as SingleNode;

/**
 * Class DoubleLinkedNode
 *
 * @package DataStructure\LinkedList
 */
class Node extends SingleNode
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