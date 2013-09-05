<?php

namespace DataStructure\Lists;

/**
 * Class SingleList
 *
 * @package DataStructure\List
 */
class SingleLinkedList
{
	/**
	 * @var SingleNode
	 */
	protected $root = NULL;

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
		$node = new SingleNode($item);

		$node->next = $this->root;
		$this->root = $node;

		return $this;
	}

	/**
	 * @param mixed $item
	 *
	 * @return $this
	 */
	public function insertLast ($item)
	{
		$node = new SingleNode($item);

		if ($this->isEmpty())
		{
			$this->root = $node;
		}
		else
		{
			$current = $this->root;
			while (!is_null($current->next))
			{
				$current = $current->next;
			}
			$current->next = $node;
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
			throw new \UnderflowException('List is empty!');
		}

		$current = $this->root;
		$preview = NULL;
		while (!is_null($current->next))
		{
			$preview = $current;
			$current = $current->next;
		}
		$current_value = $current->value;
		$preview->next = NULL;
		return $current_value;
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
			throw new \UnderflowException('List is empty!');
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
			throw new \UnderflowException('List is empty!');
		}

		$current = $this->root;
		while (!is_null($current->next))
		{
			$current = $current->next;
		}
		return $current->value;
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
