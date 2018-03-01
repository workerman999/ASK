<?php

include '../classes/Tree.php';

//получение точки для графика уровня топлива
if (isset($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $objects = new Tree();
    $x = time() * 1000;
    $y = $objects->getFuel($id);
    $rez = [$x, (int)$y];
    sleep(1);
    echo json_encode($rez);
}
