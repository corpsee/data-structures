<?php

namespace DataStructure\LinkedList\SingleLinkedList;

use DataStructure\LinkedList\SingleLinkedList;

class Iterator implements \Countable, \Iterator
{
	private $list;

	public function __construct (SingleLinkedList $list)
	{
		$this->list = $list;
		$this->list->start();
	}


	public function count ()
	{
		return $this->list->getSize();
	}


	public function current ()
	{
		$this->list->getCurrent();
	}

	public function next ()
	{
		$this->list->next();
	}

	public function key ()
	{
		$this->list->getCurrentIndex();
	}

	public function valid ()
	{
		return !is_null($this->list->getCurrent());
	}

	public function rewind ()
	{
		$this->list->start();
	}
}