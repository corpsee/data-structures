<?php

namespace DataStructures\Tests\LinkedList\SingleLinkedList;

use DataStructures\LinkedList\SingleLinkedList\Node as SingleNode;

class NodeTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @covers  DataStructures\LinkedList\SingleLinkedList\Node::__construct
	 */
	function test__construct ()
	{
		$node = new SingleNode(0);
		$this->assertEquals(0, $node->value);
	}

	/**
	 * @depends test__construct
	 * @covers  DataStructures\LinkedList\SingleLinkedList\Node::__clone
	 */
	function test__clone ()
	{
		$node       = new SingleNode(0);
		$node->next = new SingleNode(1);

		$clone = clone $node;

		$this->assertNotSame($node->next, $clone->next);
		$this->assertEquals($node->value, $clone->value);
		$this->assertEquals($node->next, $clone->next);
	}
}
