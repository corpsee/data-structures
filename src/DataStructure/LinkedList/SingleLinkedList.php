<?php

namespace DataStructure\LinkedList;

use DataStructure\LinkedList\SingleLinkedList\Node;
use DataStructure\LinkedList\SingleLinkedList\Iterator;

/**
 * Class SingleList
 *
 * @package DataStructure\LinkedList
 */
class SingleLinkedList implements LinkedListInterface
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
	 * @return Iterator
	 */
	public function getIterator()
	{
		return new Iterator($this);
	}

	/**
	 * @return boolean
	 */
	public function isEmpty ()
	{
		return is_null($this->root);
	}

	/**
	 * @return integer
	 */
	public function getSize()
	{
		return $this->size;
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
		$node = new Node($value);

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
	 * @param mixed $value
	 *
	 * @return $this
	 */
	public function insertLast ($value)
	{
		$node = new Node($value);

		if ($this->isEmpty())
		{
			$this->root = $node;
		}
		else
		{
			$last       = $this->getLastNode();
			$last->next = $node;
		}

		$this->size++;
		$this->current       = $node;
		$this->current_index = $this->size - 1;

		return $this;
	}

	public function insertAfter ($index) {}

	public function insertBefore ($index) {}

	/**
	 * Extract first element
	 *
	 * @return mixed
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

		$last          = $this->getLastNode();
		$preview       = $this->getNodePreview($last);
		$value         = $last->value;
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

		$last = $this->getLastNode();
		return $last->value;
	}

	/**
	 * @return SingleNode
	 */
	public function getCurrent ()
	{
		return $this->current->value;
	}

	/**
	 * @return integer
	 */
	public function getCurrentIndex ()
	{
		return $this->current_index;
	}


	public function hasItem ($index)
	{
		if ($this->isEmpty())
		{
			return FALSE;
		}
		return $index < $this->getSize() && $index >= 0;
	}

	public function getItem ($index)
	{
		if (!$this->hasItem($index))
		{
			throw new \OutOfBoundsException('List don`t have index: ' . $index);
		}
		$this->search($index);
		return $this->getCurrent();
	}

	public function setItem ($value, $index = NULL)
	{
		if (is_null($index))
		{
			$this->insertLast($value);
		}

		if (!$this->hasItem($index))
		{
			throw new \OutOfBoundsException('List don`t have index: ' . $index);
		}
		$this->search($index);
		$this->current->value = $value;
		return $this;
	}

	public function removeItem ($index)
	{
		if (!$this->hasItem($index))
		{
			return;
		}
		$this->search($index);

		$this->current = $this->current->next;
		$this->size--;
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

	/**
	 * @param integer $index
	 */
	protected function search ($index)
	{
		if ($this->getCurrentIndex() === $index)
		{
			return;
		}

		if (0 === $index)
		{
			$this->start();
			return;
		}

		if (($this->getSize() - 1) === $index)
		{
			$this->end();
			return;
		}

		$current = $this->current;
		if ($index < $this->getCurrentIndex())
		{
			while ($index < $this->getCurrentIndex())
			{
				$current = $current->next;
			}
		}
		else
		{
			while ($index > $this->getCurrentIndex())
			{
				$current = $this->getNodePreview($current);
			}
		}
		$this->current       = $current;
		$this->current_index = $index;
	}

	protected function getNodePreview ($item)
	{
		$current = $this->root;
		$preview = NULL;
		while (!is_null($current->next) && $current !== $item)
		{
			$preview = $current;
			$current = $current->next;
		}
		return $preview;
	}

	protected function getLastNode ()
	{
		$current = $this->current;
		while (!is_null($current->next))
		{
			$current = $current->next;
		}
		return $current;
	}
}
