<?php

class BinaryNode
{
	public $value;
	public $left;
	public $right;

	public function __construct ($item)
	{
		$this->value = $item;
		$this->left  = NULL;
		$this->right = NULL;
	}
}

class BinaryTree
{
	protected $root = NULL;

	public function isEmpty ()
	{
		return is_null($this->root);
	}

	public function insert ($item)
	{
		$node = new BinaryNode($item);
		$this->insertNode($node, $this->root);
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