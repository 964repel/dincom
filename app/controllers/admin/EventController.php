<?php


namespace app\controllers\admin;


use app\models\admin\Event;
use app\models\AppModel;
use dinkom\App;
use dinkom\libs\Pagination;

class EventController extends AppController
{
    public function indexAction(){
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $perpage = 10;
        $count = \R::count('events');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();

            $events = \R::getAll("SELECT events.*, category.title AS cat FROM events JOIN  category ON category.id = events.category_id ORDER BY events.date DESC LIMIT $start, $perpage");
        $this->setMeta('Список мероприятий');
        $this->set(compact('events', 'pagination', 'count'));
    }

    public function editAction(){
        if (!empty($_POST)){

        }
        $id = $this->gerRequestID();
        $event = \R::load('events', $id);
        App::$app->setProperties('parent_id', $event->category_id);
        $filter = \R::getCol('SELECT attr_id FROM attribute_category WHERE event_id = ?', [$id]);
        $related_event = \R::getAll("SELECT related.related_id, events.title FROM related JOIN events ON events.id = related.related_id WHERE related.event_id = ?", [$id]);
        $this->setMeta("Редактирование {$event->title}");
        $this->set(compact('event', 'filter', 'related_event'));
    }

    public function addAction(){
        if (!empty($_POST)){
            $event = new Event();
            $data = $_POST;
            $event->load($data);
            $event->attributes['status'] =  $event->attributes['status'] ? '1' : '0';
            $event->attributes['hit'] =  $event->attributes['hit'] ? '1' : '0';

            if (!$event->validate($data)){
                $event->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }

            if ($id = $event->save('events')){
                $alias = AppModel::createAlias('events', 'alias', $data['title'], $id);
                $p = \R::load('events', $id);
                $p->alias = $alias;
                \R::store($p);
                $event->editFilter($id, $data);
                if(!empty($data['related'])) {
                    $event->editRelatedEvent($id, $data);
                }
                $_SESSION['success'] = 'Мероприятие обавленно';
            }
            redirect();
        }

        $this->setMeta('Новое мероприятие');
    }

    public function relatedEventAction(){
        $q = isset($_GET['q']) ? $_GET['q'] : '';
        $data['items'] = [];
        $events = \R::getAssoc('SELECT id, title FROM events WHERE title LIKE ? LIMIT 10', ["%{$q}%"]);
        if ($events){
            $i =  0;
            foreach ($events as $id => $title){
                $data['items'][$i]['id'] = $id;
                $data['items'][$i]['text'] = $title;
                $i++;
            }
        }
        echo json_encode($data);
        die;
    }
}