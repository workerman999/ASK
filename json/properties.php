<?php

include '../classes/Tree.php';

if (isset($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $tree = new Tree();
    echo $tree->getProperties($id);
}