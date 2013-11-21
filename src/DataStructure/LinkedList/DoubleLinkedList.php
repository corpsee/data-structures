<?php

namespace DataStructure\LinkedList;

use DataStructure\LinkedList\DoubleLinkedList\Node;

/**
 * Class SingleList
 *
 * @package DataStructure\LinkedList
 */
class DoubleLinkedList extends SingleLinkedList
{
	/**
	 * @var DoubleLinkedNode
	 */
	protected $root = NULL;

	/**
	 * @var DoubleLinkedNode
	 */
	protected $last = NULL;

	/**
	 * @return boolean
	 */
	public function isEmpty ()
	{
		return is_null($this->root);
	}

	/**
	 * @param mixed $value
	 *
*@return $this
	 */
	public function insertFirst ($value)
	{
		$node = new Node($value);

		$node->next = $this->root;
		$this->root = $node;

		if (is_null($this->root->next))
		{
			$this->last = $node;
		}

		return $this;
	}

	/**
	 * @param mixed $value
	 *
*@return $this
	 */
	public function insertLast ($value)
	{
		$node = new Node($value);

		if (!$this->isEmpty())
		{
			$this->last->next = $node;
			$this->last = $this->last->next;
		}
		else
		{
			$this->root = $node;
			$this->last = $node;
		}
		return $this;
	}

	/**
	 * @return mixed
	 *
	 * @throws \UnderflowException
	 */
	public function extractFirst ()
	{
		if ($this->isEmpty())
		{
			throw new \UnderflowException('LinkedList is empty!');
		}
		$first       = $this->root->value;
		$this->root  = $this->root->next;

		return $first;
	}

	/**
	 * @return mixed
	 *
	 * @throws \UnderflowException
	 */
	public function extractLast ()
	{
		if ($this->isEmpty())
		{
			throw new \UnderflowException('LinkedList is empty!');
		}

		$last        = $this->last->value;
		$this->last  = $this->last->preview;

		return $last;
	}

	/**
	 * @return mixed
	 *
	 * @throws \UnderflowException
	 */
	public function showFirst ()
	{
		if ($this->isEmpty())
		{
			throw new \UnderflowException('LinkedList is empty!');
		}
		return $this->root->value;
	}

	/**
	 * @return mixed
	 *
	 * @throws \UnderflowException
	 */
	public function showLast ()
	{
		if ($this->isEmpty())
		{
			throw new \UnderflowException('LinkedList is empty!');
		}
		return $this->last->value;
	}

	public function dump ()
	{
		$list    = array();
		$current = $this->root;
		while (!is_null($current))
		{
			$list[]  = $current->value;
			$current = $current->next;
		}
		echo '<pre>'; print_r($list); echo '</pre>';
	}
}
