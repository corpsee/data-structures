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
			if ($node->value < $subtree->value)
			{
				$this->insertNode($node, $subtree->left);
			}
			elseif ($node->value > $subtree->value)
			{
				$this->insertNode($node, $subtree->right);
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

		$node = &$this->findNode($value, $this->root);
		if ($node)
		{
			$this->deleteNode($node);
		}
		return $this;
	}

	/**
	 * @param mixed $value
	 * @param BinaryNode $subtree
	 *
	 * @return BinaryNode
	 */
	protected function &findNode ($value, &$subtree)
	{
		if (is_null($subtree))
		{
			return FALSE;
		}

		if ($subtree->value > $value)
		{
			return $this->findNode($value, $subtree->left);
		}
		elseif ($subtree->value < $value)
		{
			return $this->findNode($value, $subtree->right);
		}
		else
		{
			return $subtree;
		}
	}

	protected function deleteNode (BinaryNode &$node)
	{
		if (is_null($node->left) && is_null($node->right))
		{
			$node = NULL;
		}
		elseif (is_null($node->left))
		{
			$node = $node->right;
		}
		elseif (is_null($node->right))
		{
			$node = $node->left;

		}
		else
		{
			if (is_null($node->right->left))
			{
				$node = $node->right;
			}
			else
			{
				$node->value = $node->right->left->value;
				$this->deleteNode($node->right->left);
			}
		}
	}

	public function dump ()
	{
		var_dump($this->root);
	}
}