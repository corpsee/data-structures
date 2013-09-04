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
	 *
	 * @return $this
	 */
	protected function insertNode (BinaryNode $node, &$subtree)
	{
		if (is_null($subtree))
		{
			$subtree = $node;
		}
		else
		{
			$node_value    = $node->getValue();
			$subtree_value = $subtree->getValue();
			if ($node_value < $subtree_value)
			{
				$left = &$subtree->getLeft();
				$this->insertNode($node, $left);
			}
			elseif ($node_value > $subtree_value)
			{
				$right = &$subtree->getRight();
				$this->insertNode($node, $right);
			}
		}
		return $this;
	}

	public function delete ($value)
	{
		if ($this->isEmpty())
		{
			throw new \UnderflowException('Tree is empty!');
		}

		$node = $this->findNode($value, $this->root);
		$this->deleteNode($node);
		return $this;
	}

	/**
	 * @param mixed $value
	 * @param BinaryNode $subtree
	 *
	 * @return BinaryNode
	 */
	protected function findNode ($value, &$subtree)
	{
		$subtree_value = $subtree->getValue();
		if ($subtree_value > $value)
		{
			$left = &$subtree->getLeft();
			return $this->findNode($value, $left);
		}
		elseif ($subtree_value < $value)
		{
			$right = &$subtree->getRight();
			return $this->findNode($value, $right);
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

	public function dump ()
	{
		echo '<pre>'; print_r($this->root); echo '</pre>';
	}
}

$tree = new BinaryTree();
$tree->insert(10);
$tree->insert(9);
$tree->insert(11);
$tree->insert(13);
$tree->insert(12);
$tree->insert(7);

$tree->dump();

$tree->delete(14);

$tree->dump();