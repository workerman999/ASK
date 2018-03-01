<?php

include '../classes/Tree.php';

//получение данных для графика скорости
if (isset($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $objects = new Tree();
    $speed = $objects->getSpeed($id);
    $rez = (int)$speed;
    sleep(1);
    echo json_encode($rez);
}

