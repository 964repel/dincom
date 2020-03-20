<?php


namespace app\controllers\admin;


use app\models\AppModel;
use app\models\Category;
use dinkom\App;

class CategoryController extends AppController
{
    public function indexAction(){
        $this->setMeta('Список категорий');
    }

    public function deleteAction(){
        $id = $this->gerRequestID();
        $children = \R::count('category', 'parent_id =?', [$id]);
        $errors = '';
        if ($children){
                $errors .= '<li>Удаление невозможно - данная категория родительская</li>';
        }
        $events = \R::count('events', 'category_id =?', [$id]);
        if ($events){
            $errors .= '<li>Удаление невозможно - в данной категории есть вложенные элементы</li>';
        }
        if ($errors){
            $_SESSION['error'] = "<ul>$errors</ul>";
            redirect();
        }
        $category = \R::load('category', $id);
        \R::trash($category);
        $_SESSION['success'] = 'Категория удалена';
        redirect();
    }

    public function addAction(){
        if (!empty($_POST)){
            $category = new Category();
            $data = $_POST;
            $category->load($data);
            if (!$category->validate($data)){
                $category->getErrors();
                redirect();
            }
            if ($id = $category->save('category')){
                $alias = AppModel::createAlias('category', 'alias', $data['title'], $id);
                $cat = \R::load('category', $id);
                $cat->alias = $alias;
                \R::store($cat);
                $_SESSION['success'] = 'Категория добавлена';

            }
            redirect();
        }
        $this->setMeta('Новая категория');
    }

    public function editAction(){
        if (!empty($_POST)){
            $id = $this->gerRequestID(false);
            $category = new Category();
            $data = $_POST;
            $category->load($data);
            if (!$category->validate($data)){
                $category->getErrors();
                redirect();
            }
            if ($category->update('category', $id)){
                $alias = AppModel::createAlias('category', 'alias', $data['title'], $id);
                $category = \R::load('category', $id);
                $category->alias = $alias;
                \R::store($category);
                $_SESSION['success'] = 'Изменения сохранены';
            }
            redirect();
        }
        $id = $this->gerRequestID();
        $id = $this->gerRequestID();
        $category = \R::load('category', $id);
        App::$app->setProperties('parent_id', $category->parent_id);
        $this->setMeta("Редактирование категории {$category->title}");
        $this->set(compact('category'));
    }
}