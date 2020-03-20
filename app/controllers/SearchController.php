<?php


namespace app\controllers;


class SearchController extends AppController
{
    public function typeaheadAction(){
        if ($this->isAjax()){
            $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;
            if ($query){
                $events = \R::getAll("SELECT id, title FROM events WHERE title LIKE ? AND status = '1' LIMIT 8", ["%{$query}%"]);
                echo json_encode($events);
            }
        }
        die;
    }

    public function indexAction(){
        $query = !empty(trim($_GET['s'])) ? trim($_GET['s']) : null;
        if ($query){
            $events = \R::find('events', "title LIKE ? AND status = '1'", ["%{$query}%"]);
        }
        $this->setMeta('Поиск по запросу: ' .h($query));
        $this->set(compact('events', 'query'));
    }
}