<?php


namespace app\controllers;


use dinkom\App;
use dinkom\Cache;

class MainController extends AppController
{
    public function indexAction()
    {
        $category = \R::findAll('category');
        $hitEvents = \R::find('events', "hit = '1' AND status = '1' AND date > CURRENT_TIMESTAMP  LIMIT 4");
        $news = \R::find('news', "LIMIT 4");
        $this->setMeta(App::$app->getProperty('center_name'), 'Description', 'key words');
        $this->set(compact('category', 'hitEvents', 'news'));

    }
}