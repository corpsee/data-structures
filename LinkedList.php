<?php

class LinkedNode
{
	public $value;
	public $next;

	public function __construct($item)
	{
		$this->value = $item;
		$this->next  = NULL;
	}
}

class LinkedList
{
	/**
	 * @var LinkedNode
	 */
	protected $root = NULL;

	public function isEmpty ()
	{
		return is_null($this->root);
	}

	public function insertFirst ($item)
	{
		$node = new LinkedNode($item);

		$node->next = $this->root;
		$this->root = $node;

		return $this;
	}

	public function insertLast ($item)
	{
		$node = new LinkedNode($item);

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

	public function extractFirst ()
	{
		if ($this->isEmpty())
		{
			throw new UnderflowException('List is empty!');
		}
		$first       = $this->root->value;
		$this->root  = $this->root->next;

		return $first;
	}

	public function extractLast ()
	{
		if ($this->isEmpty())
		{
			throw new UnderflowException('List is empty!');
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

	public function dump ()
	{
		echo 'dump ';
		$current = $this->root;
		while (!is_null($current))
		{
			echo $current->value . ' ';
			$current = $current->next;
		}
		echo ' /dump<br />';
	}
}

/*$list = new LinkedList();
$list->insertLast(10);
$list->insertLast(12);
$list->insertLast(14);
$list->insertLast(16);

$list->insertFirst(12);
$list->insertFirst(14);
$list->insertFirst(16);
$list->insertFirst(18);

$list->dump();

echo 'first: ' . var_dump($list->extractFirst()) . '<br />';
echo 'last: ' . var_dump($list->extractLast()) . '<br />';

$list->dump();*/
