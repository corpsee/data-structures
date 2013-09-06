<?php

error_reporting(-1);
ini_set('display_errors', 1);

require_once __DIR__ . DIRECTORY_SEPARATOR . 'Vendors/autoload.php';

use DataStructure\Tree\BinaryTree;

$tree = new BinaryTree();
$tree->insert(10);
$tree->insert(9);
$tree->insert(11);
$tree->insert(13);
$tree->insert(12);
$tree->insert(7);

$tree->dump();

$tree->delete(11);

$tree->dump();