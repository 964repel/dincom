<?php

namespace app\controllers;

use app\models\Breadcrumbs;
use app\models\Category;
use app\widgets\filter\Filter;
use dinkom\App;
use dinkom\libs\Pagination;
use mysql_xdevapi\Exception;

class CategoryController extends AppController
{

        public function viewAction(){
            $alias = $this->route['alias'];
            $category = \R::findOne('category', 'alias = ?', [$alias]);
            if (!$category){
                throw new Exception('Страница не найдена', 404);
            }

            //х.крошки
            $breadcrumbs = Breadcrumbs::getBreadcrambs($category->id);

            $cat_model = new Category();
            $ids = $cat_model->getIds($category->id);
            $ids = !$ids ? $category->id : $ids . $category->id;

            //пагинация
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $perpage = App::$app->getProperty('pagination');

            $sql_part = '';
            if (!empty($_GET['filter'])){
                $filter = Filter::getFilter();
                if ($filter) {

                    $cnt = Filter::getCountGroups($filter);
                    $sql_part = "AND id IN (SELECT event_id FROM attribute_category WHERE attr_id IN ($filter) GROUP BY event_id HAVING COUNT(event_id) = $cnt)";
                }
            }


            $total = \R::count('events', "category_id IN ($ids) $sql_part");
            $pagination = new Pagination($page, $perpage, $total);
            $start = $pagination->getStart();

            $events = \R::find('events', "status = '1' AND category_id IN ($ids) $sql_part LIMIT $start, $perpage");

            if($this->isAjax()){
                $this->loadView('filter', compact('events',  'total', 'pagination'));
            }

            $this->setMeta($category->title, $category->description, $category->keywords);
            $this->set(compact('events', 'breadcrumbs', 'pagination', 'total'));

        }
}