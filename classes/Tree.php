<?php


class Tree
{
    public $groupstree;
    public $objectstree;
    public $properties;

    public function getTree()
    {
        $this->groupstree = file_get_contents("http://195.93.229.66:4242/main?func=readdicts&dicts=objgroupstree&uid=1cdea3c3-957d-4789-afd9-2cbc18a5a1f7&out=json");
        $this->groupstree = str_replace('childs', 'children', gzdecode($this->groupstree));
        $this->groupstree = str_replace('name', 'text', $this->groupstree);
        $this->groupstree = json_decode($this->groupstree);
        $this->groupstree = $this->groupstree->objgroupstree;

        $this->objectstree = file_get_contents("http://195.93.229.66:4242/main?func=readdicts&dicts=objects&uid=1cdea3c3-957d-4789-afd9-2cbc18a5a1f7&out=json");
        $this->objectstree = str_replace('childs', 'children', gzdecode($this->objectstree));
        $this->objectstree = str_replace('name', 'text', $this->objectstree);
        $this->objectstree = json_decode($this->objectstree);
        $this->objectstree = $this->objectstree->objects;

        foreach($this->groupstree as $group)
        {
            for ($i = 0; $i < count($group->children); $i++){
                foreach ($this->objectstree as $object){
                    if (in_array($group->children[$i]->id, $object->groups)){
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

    public function getProperties($id)
    {
        $this->properties = file_get_contents('http://195.93.229.66:4242/main?func=objectproperties&objects=' . $id . '&uid=1cdea3c3-957d-4789-afd9-2cbc18a5a1f7&out=json');
        $this->properties = gzdecode($this->properties);

            return json_encode($this->properties, JSON_UNESCAPED_UNICODE);
    }
}
