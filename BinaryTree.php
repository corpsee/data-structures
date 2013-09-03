<?php

class BinaryNode
{
	public $value;
	public $left_child;
	public $right_child;

	public function __construct ($item)
	{
		$this->value = $item;
		$this->left  = NULL;
		$this->right = NULL;
	}
}

class BinaryTree
{
	protected $root_node;

	public function __construct ()
	{
		$this->root_node = NULL;
	}

	public function isEmpty ()
	{
		return is_null($this->root_node);
	}

	public function insert ($item)
	{
		$node = new BinaryNode($item);
		$this->insertNode($node, $this->root_node);
	}

	public function delete ($item)
	{

	}

	public function retrieve ($item)
	{

	}

	protected function insertNode ($node, &$subtree)
	{
		if (!$subtree)
		{
			$subtree = $node;
		}
		else
		{
			if ($node->value > $subtree->value)
			{
				$this->insertNode($node, $subtree->right);
			}
			else if ($node->value < $subtree->value)
			{
				$this->insertNode($node, $subtree->left);
			}
		}
	}
}