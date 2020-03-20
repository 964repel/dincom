<?php


namespace app\controllers\admin;


class MainController extends AppController
{
    public function indexAction(){
        $countNewOrders = \R::count('order', "status= '0'");
        $countUsers = \R::count('user');
        $countEvents = \R::count('events', "status='1'");
        $countCategories = \R::count('category', "parent_id > 0");
        $this->setMeta('Панель управления');
        $this->set(compact('countNewOrders', 'countCategories', 'countEvents', 'countUsers'));
    }
}