<?php

namespace DataStructures\LinkedList\DoubleLinkedList;

use DataStructures\LinkedList\SingleLinkedList as SingleNode;

/**
 * Class DoubleLinkedNode
 *
 * @package DataStructures\LinkedList
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