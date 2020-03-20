<?php


namespace app\controllers;


use app\models\Breadcrumbs;
use app\models\Event;

class EventsController extends AppController
{
    public function viewAction(){
        $alias = $this->route['alias'];
        $event = \R::findOne('events', 'alias = ?', [$alias]);
        if (!$event){
            throw new \Exception('Страница не найдена', '404');
        }

        // хлебные крошки
        $breadcrumbs = Breadcrumbs::getBreadcrambs($event->category_id, $event->title);

        // связанные мероприятия
        $related = \R::getAll("SELECT * FROM related JOIN events ON events.id = related.related_id WHERE related.event_id = ?", [$event->id]);

        // запись в куки запрошенного мероприятия
        $e_model = new Event();
        $e_model->setRecentlyViewed($event->id);

        // просмотренные мероприятия
        $r_viewed = $e_model->getRecentlyViewed();
        $resentlyViewed = null;
        if($r_viewed){
            $resentlyViewed = \R::find('events', 'id IN ('. \R::genSlots($r_viewed) . ') LIMIT 3', $r_viewed);
        }


        // галерея
        $gallery = \R::findAll('gallery', 'event_id = ?', [$event->id]);


        // модификации
        $mods = \R::findAll('modification', 'event_id = ?', [$event->id]);


        $this->setMeta($event->title, $event->description, $event->keywords);
        $this->set(compact('event', 'related', 'gallery', 'resentlyViewed', 'breadcrumbs', 'mods'));
    }
}