<?php

include '../classes/Tree.php';

if (isset($_GET)){
    $tree = new Tree();
    echo $tree->getTree();
}
