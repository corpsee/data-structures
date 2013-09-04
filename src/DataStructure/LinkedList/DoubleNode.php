<?php

namespace DataStructure\LinkedList;

/**
 * Class DoubleNode
 *
 * @package DataStructure\LinkedList
 */
class DoubleNode extends SingleNode
{
	/**
	 * @var DoubleNode
	 */
	protected $preview = NULL;

	/**
	 * @return DoubleNode
	 */
	public function getPreview ()
	{
		return $this->preview;
	}

	/**
	 * @param DoubleNode $node
	 */
	public function setPreview (DoubleNode $node)
	{
		$this->preview = $node;
	}

	public function removePreview ()
	{
		$this->preview = NULL;
	}
}