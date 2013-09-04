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
		if (is_null($subtree))
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

	public function delete ($value)
	{
		$node = $this->findNode($value, $this->root);
		$this->deleteNode($node);
		return $this;
	}

	protected function findNode ($value, BinaryNode $subtree)
	{
		$subtree_value = $subtree->getValue();
		if ($subtree_value > $value)
		{
			return $this->findNode($value, $subtree->getLeft());
		}
		elseif ($subtree_value < $value)
		{
			return $this->findNode($value, $subtree->getRight());
		}
		else
		{
			return $subtree;
		}
	}

	protected function deleteNode (BinaryNode &$node)
	{
		if (is_null($node->getLeft()) && is_null($node->getRight()))
		{
			$node = NULL;
		}
		elseif (is_null($node->getLeft()))
		{
			$node = $node->getLeft();
		}
		elseif (is_null($node->getRight()))
		{
			$node = $node->getRight();
		}
		else
		{
			$right_left_node = $node->getRight()->getLeft();
			if (is_null($right_left_node))
			{
				$node = $node->getRight();
			}
			else
			{
				$node->setValue($right_left_node->getValue());
				$this->deleteNode($right_left_node);
			}
		}
	}
}