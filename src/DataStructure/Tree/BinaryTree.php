<?php

namespace DataStructure\Tree;

/**
 * Class BinaryTree
 *
 * @package DataStructure\Tree
 */
class BinaryTree
{
	/**
	 * @var BinaryNode
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
	 * @param mixed $value
	 */
	public function insert ($value)
	{
		$node = new BinaryNode($value);
		$this->insertNode($node, $this->root);
	}

	/**
	 * @param BinaryNode $node
	 * @param BinaryNode $subtree
	 */
	protected function insertNode (BinaryNode $node, BinaryNode &$subtree)
	{
		if (!$subtree)
		{
			$subtree = $node;
		}
		else
		{
			$node_value    = $node->getValue();
			$subtree_value = $subtree->getValue();
			if ($node_value > $subtree_value)
			{
				$this->insertNode($node, $subtree->getRight());
			}
			else if ($node_value < $subtree_value)
			{
				$this->insertNode($node, $subtree->getLeft());
			}
		}
	}

	public function delete ($item)
	{
	}
}