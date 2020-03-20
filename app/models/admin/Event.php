<?php


namespace app\models\admin;


use app\models\AppModel;

class Event extends AppModel
{
    public $attributes = [
        'title' => '',
        'category_id' => '',
        'keywords' => '',
        'description' => '',
        'price' => '',
        'content' => '',
        'date' => '',
        'status' => '',
        'hit' => '',
        'alias' => '',
    ];
    public $rules = [
        'required' => [
            ['title'],
            ['category_id'],
            ['price'],
            ['date'],
        ],
        'integer' => [
            ['category_id'],
        ]
    ];

    public function editRelatedEvent($id, $data){
        $related_event = \R::getCol('SELECT related_id FROM related WHERE  event_id = ?', [$id]);

        if (empty($data['related']) && !empty($related_event)){
            \R::exec("DELETE FROM related WHERE event_id = ?", [$id]);
            return;
        }

        if (empty($related_event) && !empty($data['related'])){
            $sql_part = '';
            foreach ($data['related'] as $v){
                $sql_part .= "($id, $v),";
            }
            $sql_part = rtrim($sql_part, ',');
            \R::exec("INSERT INTO related (event_id, related_id) VALUES $sql_part");
            return;
        }

        if (!empty($data['attrs'])){
            $result = array_diff($related_event, $data['related']);
            if (!empty($result) || count($related_event) != count($data['related'])){
                \R::exec("DELETE FROM related WHERE event_id = ?", [$id]);
                $sql_part = '';
                foreach ($data['related'] as $v){
                    $sql_part .= "($id, $v),";
                }
                $sql_part = rtrim($sql_part, ',');
                \R::exec("INSERT INTO related (event_id, related_id) VALUES $sql_part");
            }
        }
    }


    public function editFilter($id, $data){
        $filter = \R::getCol('SELECT attr_id FROM attribute_category WHERE  event_id = ?', [$id]);

        if (empty($data['attrs']) && !empty($filter)){
            \R::exec("DELETE FROM attribute_category WHERE event_id = ?", [$id]);
            return;
        }

        if (empty($filter) && !empty($data['attrs'])){
            $sql_part = '';
            foreach ($data['attrs'] as $v){
                $sql_part .= "($v, $id),";
            }
            $sql_part = rtrim($sql_part, ',');
            \R::exec("INSERT INTO attribute_category (attr_id, event_id) VALUES $sql_part");
            return;
        }

        if (!empty($data['attrs'])){
            $result = array_diff($filter, $data['attrs']);
            if (!$result){
                \R::exec("DELETE FROM attribute_category WHERE event_id = ?", [$id]);
                $sql_part = '';
                foreach ($data['attrs'] as $v){
                    $sql_part .= "($v, $id),";
            }
                $sql_part = rtrim($sql_part, ',');
                \R::exec("INSERT INTO attribute_category (attr_id, event_id) VALUES $sql_part");
            }
        }
    }
}