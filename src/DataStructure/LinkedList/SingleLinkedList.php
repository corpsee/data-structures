<?php

namespace DataStructure\LinkedList;

/**
 * Class SingleList
 *
 * @package DataStructure\LinkedList
 */
class SingleLinkedList
{
	/**
	 * First element
	 *
	 * @var SingleNode
	 */
	protected $root = NULL;

	/**
	 * Current element
	 *
	 * @var SingleNode
	 */
	protected $current = NULL;

	/**
	 * Current element index
	 *
	 * @var integer
	 */
	protected $current_index = NULL;

	/**
	 * Size of linked list
	 *
	 * @var integer
	 */
	protected $size = 0;

	/**
	 * @return boolean
	 */
	public function isEmpty ()
	{
		return is_null($this->root);
	}

	/**
	 * Insert first element
	 *
	 * @param mixed $value
	 *
	 * @return $this
	 */
	public function insertFirst ($value)
	{
		$node = new SingleLinkedNode($value);

		$node->next = $this->root;
		$this->root = $node;

		$this->size++;

		$this->current       = $node;
		$this->current_index = 0;

		return $this;
	}

	/**
	 * Insert last element
	 *
	 * @param mixed $item
	 *
	 * @return $this
	 */
	public function insertLast ($item)
	{
		$node = new SingleLinkedNode($item);

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

		$this->size++;
		$this->current       = $node;
		$this->current_index = $this->size - 1;

		return $this;
	}

	/**
	 * Extract first element
	 *
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
		$value       = $this->root->value;
		$this->root  = $this->root->next;

		$this->size--;
		$this->current       = $this->root;
		$this->current_index = 0;

		return $value;
	}

	/**
	 * Extract last element
	 *
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

		$current    = $this->root;
		$preview = NULL;
		while (!is_null($current->next))
		{
			$preview = $current;
			$current = $current->next;
		}
		$value = $current->value;
		$preview->next = NULL;

		$this->size--;
		$this->current       = $preview;
		$this->current_index = $this->size - 1;

		return $value;
	}

	/**
	 * @return mixed
	 *
	 * @throws \UnderflowException
	 */
	public function getFirst ()
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
	public function getLast ()
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

	/**
	 * @return integer
	 */
	public function getSize ()
	{
		return $this->size;
	}

	/**
	 * @return SingleNode
	 */
	public function getCurrent ()
	{
		return $this->current;
	}

	/**
	 * @return integer
	 */
	public function getCurrentIndex ()
	{
		return $this->current_index;
	}

	/**
	 * @return $this
	 */
	public function next ()
	{
		if (!is_null($this->current) && !is_null($this->current->next))
		{
			$this->current = $this->current->next;
			$this->current_index++;
		}
		return $this;
	}

	/**
	 * @return $this
	 */
	public function preview ()
	{
		if (!is_null($this->current))
		{
			$preview = $this->root;
			if (!is_null($preview->next))
			{
				while ($preview->next !== $this->current)
				{
					$preview = $preview->next;
				}
				$this->current = $preview;
				$this->current_index--;
			}
		}
		return $this;
	}

	/**
	 * @return $this
	 */
	public function end ()
	{
		$current = $this->current;
		while (!is_null($current->next))
		{
			$current = $current->next;
		}
		$this->current       = $current;
		$this->current_index = $this->size - 1;

		return $this;
	}

	/**
	 * @return $this
	 */
	public function start ()
	{
		$this->current       = $this->root;
		$this->current_index = 0;

		return $this;
	}
}
