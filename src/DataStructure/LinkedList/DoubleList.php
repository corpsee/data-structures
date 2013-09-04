<?php

namespace DataStructure\LinkedList;

/**
 * Class SingleList
 *
 * @package DataStructure\LinkedList
 */
class DoubleList extends SingleList
{
	/**
	 * @var DoubleNode
	 */
	protected $root = NULL;

	/**
	 * @var DoubleNode
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
	 * @param mixed $item
	 *
	 * @return $this
	 */
	public function insertFirst ($item)
	{
		$node = new DoubleNode($item);

		$node->setNext($this->root);
		$this->root = $node;

		if (is_null($this->root->getNext()))
		{
			$this->last = $node;
		}

		return $this;
	}

	/**
	 * @param mixed $item
	 *
	 * @return $this
	 */
	public function insertLast ($item)
	{
		$node = new DoubleNode($item);

		if (!$this->isEmpty())
		{
			$this->last->setNext($node);
			$this->last = $this->last->getNext();
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
			throw new \UnderflowException('List is empty!');
		}
		$first       = $this->root->getValue();
		$this->root  = $this->root->getNext();

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
			throw new \UnderflowException('List is empty!');
		}

		$last        = $this->last->getValue();
		$this->last  = $this->last->getPreview();

		return $last;
	}

	public function dump ()
	{
		$list    = array();
		$current = $this->root;
		while (!is_null($current))
		{
			$list[]  = $current->getValue();
			$current = $current->getNext();
		}
		echo '<pre>'; print_r($list); echo '</pre>';
	}
}
