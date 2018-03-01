<?php


class Tree
{
    public $groupstree;
    public $objectstree;
    public $properties;
    public $object;
    public $fuel;
    public $speed;
    public $name;

    //построение дерева и группировка мобильных объектов согласно групп в JSON
    public function getTree()
    {
        $this->getGroupsTree();
        $this->getObjectsTree();

        foreach ($this->groupstree as $group)
        {
            for ($i = 0; $i < count($group->children); $i++) {
                foreach ($this->objectstree as $object) {
                    if (in_array($group->children[$i]->id, $object->groups)) {
                        $ob = new stdClass();
                        $ob->id = $object->id;
                        $ob->text = $object->text;
                        $group->children[$i]->children[] = $ob;
                    }
                }
            }
        }
        return json_encode($this->groupstree, JSON_UNESCAPED_UNICODE);
    }

    //получение директорий групп объектов для построения дерева
    public function getGroupsTree()
    {
        $this->groupstree = file_get_contents("http://195.93.229.66:4242/main?func=readdicts&dicts=objgroupstree&uid=1cdea3c3-957d-4789-afd9-2cbc18a5a1f7&out=json");
        if ($this->groupstree){
            $this->groupstree = str_replace('childs', 'children', gzdecode($this->groupstree));
            $this->groupstree = str_replace('name', 'text', $this->groupstree);
            $this->groupstree = json_decode($this->groupstree);
            $this->groupstree = $this->groupstree->objgroupstree;
        }
        else {
            die('Ошибка - сервер с данными мобильных объектов НЕДОСТУПЕН');
        }
        return $this->groupstree;
    }

    public function getObjectsTree()
    {
        $this->objectstree = file_get_contents("http://195.93.229.66:4242/main?func=readdicts&dicts=objects&uid=1cdea3c3-957d-4789-afd9-2cbc18a5a1f7&out=json");
        if ($this->objectstree){
            $this->objectstree = str_replace('childs', 'children', gzdecode($this->objectstree));
            $this->objectstree = str_replace('name', 'text', $this->objectstree);
            $this->objectstree = json_decode($this->objectstree);
            $this->objectstree = $this->objectstree->objects;
        }  else {
            die('Ошибка - сервер с данными мобильных объектов НЕДОСТУПЕН');
        }
        return $this->objectstree;
    }

    //получение всех свойств мобильного объекта в JSON
    public function getProperties($id)
    {
        $this->properties = file_get_contents('http://195.93.229.66:4242/main?func=objectproperties&objects=' . $id . '&uid=1cdea3c3-957d-4789-afd9-2cbc18a5a1f7&out=json');
        if ($this->properties){
            $this->properties = gzdecode($this->properties);
        }  else {
            die('Ошибка - сервер с данными мобильных объектов НЕДОСТУПЕН');
        }
        return json_encode($this->properties, JSON_UNESCAPED_UNICODE);
    }

    //получение навигационных и топливных данных мобильного объекта
    public function getObject($id)
    {
        $this->object = file_get_contents('http://195.93.229.66:4242/main?func=state&objects=' . $id . '&fuel&uid=1cdea3c3-957d-4789-afd9-2cbc18a5a1f7&out=json');
        if ($this->object){
            $this->object = gzdecode($this->object);
        }  else {
            die('Ошибка - сервер с данными мобильных объектов НЕДОСТУПЕН');
        }
        return $this->object;
    }

    //получение данных об уровне топлива мобильного объекта
    public function getFuel($id)
    {
        $this->object = $this->getObject($id);
        $this->object = json_decode($this->object);
        $this->fuel = $this->object->objects[0]->fuel;
        return $this->fuel;
    }

    //получение данных о скорости движения мобильного объекта
    public function getSpeed($id)
    {
        $this->object = $this->getObject($id);
        $this->object = json_decode($this->object);
        $this->speed = $this->object->objects[0]->speed;
        return $this->speed;
    }

    //получение данных о наименовании мобильного объекта
    public function getName($id)
    {
        $this->object = $this->getObject($id);
        $this->object = json_decode($this->object);
        $this->name = $this->object->objects[0]->name;
        return $this->name;
    }
}
