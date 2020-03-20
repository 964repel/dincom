<?php


namespace app\controllers;


use app\models\Breadcrumbs;

class CursesController extends AppController
{
    public function viewAction(){
        $alias = $this->route['alias'];
        $curse = \R::findOne('curses', 'alias = ?', [$alias]);
        $category = \R::findAll('category');
        if (!$category){
            throw new \Exception('Страница не найдена', '404');
        }

        // хлебные крошки
        /*$breadcrumbs = Breadcrumbs::getBreadcrambs($curse->category_id, $curse->title);*/

        // связанные мероприятия

        // запись в куки запрошенного мероприятия

        // просмотренные мероприятия

        // галерея

        // модификации

        $this->set(compact('category'));
    }
}