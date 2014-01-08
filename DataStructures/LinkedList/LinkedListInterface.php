<?php

namespace DataStructures\LinkedList;

interface LinkedListInterface extends \IteratorAggregate
{
	public function getIterator();


	public function isEmpty ();

	public function getSize();


	public function insertFirst ($value);

	public function insertLast ($value);

	public function insertAfter ($index);

	public function insertBefore ($index);


	public function extractFirst ();

	public function extractLast ();


	public function getFirst ();

	public function getLast ();

	public function getCurrent ();

	public function getCurrentIndex ();


	public function hasItem ($index);

	public function getItem ($index);

	public function setItem ($value, $index);

	public function removeItem ($index);


	public function preview ();

	public function next ();

	public function start ();

	public function end ();
}